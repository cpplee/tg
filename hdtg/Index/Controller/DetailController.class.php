<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/12/23
 * Time: 17:54
 */
class DetailController extends CommonController
{


    private $gid;

    public function __auto(){

        $this->gid = Q('gid');

      $this->db = K('Goods');
        $this->assign('userIsLogin',isset($_SESSION[C('RBAC_AUTH_KEY')]));

        $this->setRecentView();
    }


    public function index(){


          //p($_SESSION['cart']);
        $detail = $this->db->getGoodsDetail($this->gid);



        $detail['shopcoord']=htmlspecialchars_decode($detail['shopcoord']);



       $detail = $this->disDetailData($detail);


        $this->getRelatedGoods($detail['cid']);
       // p($detail);
      $this->assign('detail',$detail);



        $this->display();
    }


    public function disDetailData($detail){

        $detail['zhekou'] = round($detail['price']/$detail['old_price'],1);
        $detail['price'] = round($detail['price'],0);
       // p($detail['price']);
        $pathInfo = pathinfo($detail['goods_img']);
        $detail['goods_img']= $pathInfo['dirname'].'/'.$pathInfo['filename'].'thumb460280'.'.'.$pathInfo['extension'];
        if(($detail['end_time']-time())>(pow(60,2)*24*3)){
              $detail['end_time']='剩余<span>3</span>天以上';

        }else{

            $detail['end_time']=date('Y-m-d H:i:s',$detail['end_time']).'下架';
        }

        $goodsServer = array_slice(unserialize($detail['goods_server']),0,2);

         $server = C('GOODS_SERVER');

          $detail['server']=array(
              $server[$goodsServer[0]],
              $server[$goodsServer[1]],
          );


        return $detail;



    }




    private function setRecentView(){


        $key = encrypt('recent-view');

        $value =isset($_COOKIE[$key])?unserialize(decrypt($_COOKIE[$key])):array();



      //  p($value);
        if(!in_array($this->gid,$value)){

            array_unshift($value,$this->gid);

        }




        setcookie($key,encrypt(serialize($value)),time()+86400,'/');



    }

    private function  getRelatedGoods($cid){
        $related = $this->db->getRelatedGoods($cid);
        foreach ($related as $k=> $v){
            $pathInfo = pathinfo($v['goods_img']);


            if(isset($pathInfo)){
                $related[$k]['goods_img']= $pathInfo['dirname'].'/'.$pathInfo['filename'].'thumb200100'.'.'.$pathInfo['extension'];
            }
        }


        p($related);
        $this->assign('related', $related);
    }






}