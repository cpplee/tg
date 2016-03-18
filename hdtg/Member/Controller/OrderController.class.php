<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/1/10
 * Time: 18:49
 */
class OrderController extends CommonController
{
    public function __auto(){


        if(is_null($_SESSION[C("RBAC_AUTH_KEY")])){

            go(U('Member/Login/index'));

        }
        $this->uid =intval($_SESSION[C("RBAC_AUTH_KEY")]);
        // var_dump($this->uid);
    }


    public function index(){

       $db = K('order');
        $status = Q('status',null);
        if(is_null($status)){
            $where = array('user_id'=>$this->uid);
        }else{
            $where = array('user_id'=>$this->uid,'status'=>$status);
        }
        $data =  $db->getOrderData($where);//获取订单的数据
        $order = $this->disData($data);
        $this->assign('order', $order);

        $this->display();

    }


    public function disData($data){

      foreach($data as $k=>$v){

          $pathInfo = pathinfo($v['goods_img']);


          if(isset($pathInfo)){
              $data[$k]['goods_img']= $pathInfo['dirname'].'/'.$pathInfo['filename'].'thumb9050'.'.'.$pathInfo['extension'];
              $data[$k]['zongji'] = $v['goods_num']*$v['price'];
          }


      }
         return $data;


    }


    public function del(){
        $oid = Q('oid',null);
        if(is_null($oid)){
            _404();
        }
        $where = array('user_id'=>$this->uid,'orderid'=>$oid);

        $db = K('order');

        if($db->delOrder($where)){
            $this->success('删除成功!','index');
        }else{
            $this->error('删除失败！','index');
        }
    }



}