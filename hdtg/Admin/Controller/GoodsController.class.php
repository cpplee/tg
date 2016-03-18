<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/12/20
 * Time: 18:49
 */
class GoodsController extends CommonController
{



      public $shopid;
         public $gid;


    public function __auto(){



        $this->shopid = Q('shopid');
        $this->gid = Q('gid');
        $this->db = K('Goods');

    }



    public function index(){


        $total = $this->db->getGoodsTotal();

        $page = new page($total,2,4,2);

        $limit = $page->limit();
             $goods = $this->db->getGoodsAll($limit);

        $this->assign('goods',$goods);
        $this->assign('page',$page->show());

        $this->display();


    }


    public function add(){





        if(IS_POST){


          //  p($_POST);
            $data = $this->getData();
        //p($data);

            $this->db->addGoods($data);
            $this->success('添加商品成功');

        }



        $this->setShop();
        $this->setCategory();
        $this->setLocality();

        $this->assign('GOODS_SERVER',C('GOODS_SERVER'));
        $this->display();
    }


    private function setShop(){


        $db = K('Shop');

        $shop = $db->getShopFind($this->shopid);

        $this->assign('shop',$shop);





    }

    private function setCategory()
    {


        $db = K('Category');
        $data = $db->getCategoryAll();

        $category = Data::channelList($data, 0, '--', 'cid', 'pid', 1);

      $this->assign('category',$category);


    }

    private function setLocality(){

        $db = K('locality');

        $data = $db->getLocalityAll();
        $locality = Data::channelList($data, 0, '--', 'lid', 'pid', 1);

       // p($locality);
        $this->assign('locality',$locality);

    }


    public function upload()
    {

        $upload = new Upload('Upload/Content/' . date('y/m'));

        $file = $upload->upload();

       $img = new image();
        $thumb = array(
            '0'=>substr($file[0]['url'],0,strrpos($file[0]['url'],'.')).'thumb460280'.substr($file[0]['url'],strpos($file[0]['url'],".")),
            '1'=>substr($file[0]['url'],0,strrpos($file[0]['url'],'.')).'thumb200100'.substr($file[0]['url'],strpos($file[0]['url'],".")),
            '2'=>substr($file[0]['url'],0,strrpos($file[0]['url'],'.')).'thumb310185'.substr($file[0]['url'],strpos($file[0]['url'],".")),
            '3'=>substr($file[0]['url'],0,strrpos($file[0]['url'],'.')).'thumb9050'.substr($file[0]['url'],strpos($file[0]['url'],"."))
        );


        $img->thumb($file[0]['dir'].$file[0]['basename'],$file[0]['dir'].$file[0]['filename'].'thumb460280.'.$file[0]['ext'],460,280,2);
        $img->thumb($file[0]['dir'].$file[0]['basename'],$file[0]['dir'].$file[0]['filename'].'thumb200100.'.$file[0]['ext'],200,100,2);
        $img->thumb($file[0]['dir'].$file[0]['basename'],$file[0]['dir'].$file[0]['filename'].'thumb310185.'.$file[0]['ext'],310,185,2);
        $img->thumb($file[0]['dir'].$file[0]['basename'],$file[0]['dir'].$file[0]['filename'].'thumb9050.'.$file[0]['ext'],90,50,2);


        if (empty($file)) {

            $this->ajax('上传失败');

        } else {

            $data = $file[0];
            $data['thumb']=$thumb;
            $this->ajax($data);

        }



    }


    private function getData(){


        $data = array();
        $data['goods']['cid']=Q('cid');
        $data['goods']['lid']=Q('lid');
        $data['goods']['shopid']=Q('shopid');
        $data['goods']['price']=Q('price');
        $data['goods']['old_price']=Q('old_price');
        $data['goods']['main_title']=Q('main_title');
        $data['goods']['sub_title']=Q('sub_title');

        $data['goods']['begin_time']=strtotime(Q('begin_time'));
        $data['goods']['end_time']=strtotime(Q('end_time'));

        if(isset($_POST['old_img'])){


            if(isset($_POST['old_img'])){
                $this->delOldFile($_POST['old_img']);
            }


            $data['goods']['goods_img']=Q('goods_img');


        }else{

            $data['goods']['goods_img']=Q('goods_img');
        }




        $data['goods_detail']['detail']=Q('detail');
        $data['goods_detail']['goods_server']=serialize(Q('goods_server'));
        return $data;

    }

    private function delOldFile($img){

        $pathInfo = pathInfo(substr($img,22));
      //  p($pathInfo);
        $oldFiles = array(
            dirname(dirname(dirname(dirname(__FILE__)))).'/'.substr($img,22),
            dirname(dirname(dirname(dirname(__FILE__)))).'/'.$pathInfo['dirname'].'/'.$pathInfo['filename'].'thumb9050'.'.'.$pathInfo['extension'],
            dirname(dirname(dirname(dirname(__FILE__)))).'/'.$pathInfo['dirname'].'/'.$pathInfo['filename'].'thumb200100'.'.'.$pathInfo['extension'],
            dirname(dirname(dirname(dirname(__FILE__)))).'/'.$pathInfo['dirname'].'/'.$pathInfo['filename'].'thumb310185'.'.'.$pathInfo['extension'],
            dirname(dirname(dirname(dirname(__FILE__)))).'/'.$pathInfo['dirname'].'/'.$pathInfo['filename'].'thumb460280'.'.'.$pathInfo['extension'],

        );

      //  p($oldFiles);


        foreach($oldFiles as $v){

            if(file_exists($v)) unlink($v);

        }



    }

     public function edit(){




         if(IS_POST){

           // p($_POST);

             $data = $this->getData();
           //  p($data);
            $this->db->editGoods($this->gid,$data);
             $this->success('更新商品成功');

         }



         $goods = $this->db->getGoodsFind($this->gid);
         $this->setCategory();
         $this->setLocality();
         $this->assign('server',C('GOODS_SERVER'));

         $goods['goods_server']=unserialize($goods['goods_server']);

         $this->assign('goods',$goods);
         p($goods);
         $this->display();


     }

    public function del(){


        $this->db->delGoods($this->gid);

        $this->success('删除成功');


    }






}