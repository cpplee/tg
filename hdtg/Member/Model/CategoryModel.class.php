<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/12/19
 * Time: 20:54
 */
class CategoryModel extends ViewModel
{

    public $tables = 'category';

    public function getCategoryLevel($pid){

         return $this->where(array('pid'=>$pid,'display'=>1))->order('sort asc')->all();




    }



    public function getCategoryPid($cid){

        $result =  $this->where(array('cid'=>$cid))->find();

             return $result['pid'];

    }


    public function getSonCategory($cid){
        $result = $this->field('cid')->where(array('pid'=>$cid))->select();
        if(empty($result)){
            $result = array(array('cid'=>$cid));
        }
        return $result;
    }







}