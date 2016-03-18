<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/1/14
 * Time: 16:03
 */
class OrderModel extends ViewModel
{

    public $table = 'order';

   public  $view = array();



    public function getOrder($where,$limit){



        $this->view = array(
            'order'=>array(
                '_as'=>'a',
                '_type'=>'INNER',

            ),
            'goods'=>array(
                '_as'=>'b',
                '_type'=>'INNER',
                '_on'=>'a.goods_id=b.gid'
            )
        );

   return $this->where($where)->order('orderid desc')->limit($limit)->all();


    }


        public function getOrderTotal($where){

          return $this->where($where)->count();


         }



        public function delOrder($oid){

            return $this->where(array('orderid'=>$oid))->delete();

        }




}