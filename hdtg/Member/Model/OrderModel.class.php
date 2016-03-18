<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/1/8
 * Time: 17:06
 */
class OrderModel extends ViewModel
{
    public $table='order';

    public $view;

    public function addOrder($data){

           return $this->add($data);


    }

    public function getOrderData($where){


          $this->view=array(
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

        return $this->where($where)->all();



    }


    public function checkOrder($where){

        return $this->where($where)->count();
    }


    public function getOrder($orderids){

        $this->view=array(
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

        $where['orderid']=array('in',$orderids);

        return $this->where($where)->all();

    }

    /**
     * 修改订单的状态
     */
    public function updateStatus($orderids){
        $where['orderid']=array('in',$orderids);
        return $this->where($where)->save(array('status'=>'已付款'));
    }

    /**
     * 删除订单
     */
    public function delOrder($where){
        return $this->where($where)->delete();
    }



}