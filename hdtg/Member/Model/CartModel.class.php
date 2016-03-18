<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/1/3
 * Time: 14:35
 */
class CartModel extends ViewModel
{


    public $table='cart';


    public $view=array(

//        'cart'=>array(
//            '_type'=>'inner'
//        ),
//        'goods'=>array(
//            '_type'=>'inner',
//            '_on'=>'goods.gid=cart.goods_id',
//
//        ),
    );






    public function  addCart($data){

          return $this->add($data);

    }



    public function checkCart($where){

           $result = $this->field('cart_id')->where($where)->find();

                return isset($result['cart_id'])?$result['cart_id']:null;
    }


    public function incCart($id,$num){

        return $this->inc('goods_num','cart_id='.$id,$num);


    }

    public function countCart($where){

        return $this->where($where)->count();

    }

    public function getGoods($where){

        return $this->table('goods')->where($where)->find();

    }

    public function updateCartNum($where,$num){

        $this->where($where)->save(array('goods_num'=>$num));
        return $this->getAffectedRows();

    }


    public function getCartAll($uid){



        $this->view= array(

            'cart'=>array(
                '_type'=>'inner'
            ),
        'goods'=>array(
            '_type'=>'inner',
            '_on'=>'goods.gid=cart.goods_id',

        ),
        );

      return   $this->where(array('cart.user_id'=>$uid))->all();

    }

    public function delCart($where){

        return $this->where($where)->del();
    }



}