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


        public function getGoods($in){

              $where['gid']=array('in',$in);
           return  $this->where($where)->all();


        }




    public function getGoodsFind($gid){


        return $this->where(array('gid'=>$gid))->find();


    }



}