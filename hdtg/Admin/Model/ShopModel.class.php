<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/12/19
 * Time: 16:14
 */
class ShopModel extends ViewModel
{


    public $tables = 'shop';


    public function addShop($data){

        $this->add($data);

    }

    public function getShopCount(){


           return $this->count();

    }


    public function getShop($limit){


        return $this->limit($limit)->all();

    }

    public function getShopFind($shopid){


            return $this->where(array('shopid'=>$shopid))->find();

    }


    public function editShop($data,$shopid){

        $this->where(array('shopid'=>$shopid))->save($data);

    }




    public function delShop($shopid){


        $this->where(array('shopid'=>$shopid))->del();

    }





}