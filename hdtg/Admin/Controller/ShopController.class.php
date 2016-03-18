<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/12/19
 * Time: 14:43
 */
class ShopController extends CommonController
{


    public $shopid;

    public function __auto(){



        $this->db = K('Shop');

        $this->shopid = Q('shopid');
    }





    public function index(){


       $total = $this->db->getShopCount();

        $page = new page($total,1,4,2);

        $data = $this->db->getShop($page->limit());

        $this->assign('page',$page->show());
       $this->assign('data',$data);
        $this->display();
    }


    public function add(){




        if(IS_POST){


    $data = $this->getData();

           $this->db->addShop($data);
            $this->success('添加商铺成功');

        }
        $this->display();

    }



     public function edit(){

         if(IS_POST){

           $data = $this->getData();

             $this->db->editShop($data,$this->shopid);
             $this->success('修改成功');




         }



         $shop = $this->db->getShopFind($this->shopid);

         $this->assign('shop',$shop);

         $this->display();




     }



    public function del(){




        $this->db->delShop($this->shopid);


        $this->success('删除成功');


    }












    public function getData(){
        $data = array();

        $data['shopname'] = Q('shopname');

        $data['shopaddress'] = Q('shopaddress');
        $data['metroaddress'] = Q('metroaddress');
        $data['shoptel'] = Q('shoptel');
        $data['shopcoord'] = Q('shopcoord');

        return $data;




    }
}