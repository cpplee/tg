<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/12/21
 * Time: 19:35
 */
class GoodsModel extends ViewModel
{


    public $table ='goods';

    public $view = array(
        'goods'=>array(
          '_type'=>'inner',
        ),
        'locality'=>array(
            '_type'=>'inner',
            '_on'=>'locality.lid=goods.lid'
        ),
        'category'=>array(
            '_type'=>'inner',
            '_on'=>'category.cid=goods.cid'
        ),
        'shop'=>array(
            '_type'=>'inner',
            '_on'=>'shop.shopid=goods.shopid'
        ),
        'goods_detail'=>array(
            '_type'=>'inner',
            '_on'=>'goods.gid=goods_detail.goods_id'
        ),



    );

    public function addGoods($data){



         $gid = $this->table('goods')->add($data['goods']);

        $data['goods_detail']['goods_id'] =$gid;



       // p( $data['good_detail']['gid']);



       // p($data['goods_detail']);
         $this->table('goods_detail')->add($data['goods_detail']);

    }




    public function getGoodsTotal(){


           return $this->count();

    }

    public function getGoodsAll($limit){


         return $this->limit($limit)->all();


    }

   public function getGoodsFind($gid){


       return $this->where(array('gid'=>$gid))->find();

   }


    public function editGoods($gid,$data){

        $this->table('goods')->where(array('gid'=>$gid))->save($data['goods']);
        $data['goods_detail']['goods_id'] =$gid;



        // p( $data['good_detail']['gid']);



        // p($data['goods_detail']);
        $this->table('goods_detail')->save($data['goods_detail']);


    }


    public function delGoods($gid){

        $this->table('goods_detail')->where(array('goods_id'=>$gid))->del();

        $this->table('goods')->where(array('gid'=>$gid))->del();





    }




}