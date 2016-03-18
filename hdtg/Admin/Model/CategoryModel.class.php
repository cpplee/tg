<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/12/17
 * Time: 16:42
 */
class CategoryModel extends ViewModel
{



    public $tables = 'category';



    public function getCategoryAll(){



           return  $this->all();
    }

    public function addCategory($data){

        $this->add($data);
    }


    public function getParentInfo($cid){

        $result = $this->where(array('cid'=>$cid))->find();

//        p($result);
        if($result){
            return $result;
        }else{

            return array(
                'cid'=>0,
                'cname'=>'顶级分类'
            );
        }



    }




    public function getCategoryFind($cid){


        $result = $this->where(array('cid'=>$cid))->find();


        return $result;



    }


   public function editCategory($cid,$data){

       $this->where(array('cid'=>$cid))->save($data);



   }


    public function checkSonCategory($cid){

        return $this->where(array('pid'=>$cid))->count();

    }


    public function delCategory($cid){


        return $this->where(array('cid'=>$cid))->del();
    }



    public function getSonCategory($cid){

        $result = $this->field('cid')->where(array('pid'=>$cid))->all();



        return $result;
    }




}