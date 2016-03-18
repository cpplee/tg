<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/12/18
 * Time: 18:12
 */
class LocalityModel extends ViewModel
{


    public $tables='locality';


    public function getLocalityAll(){


           return $this->all();


    }

    public function addLocalityInfo($data){


        $this->add($data);

    }

    public function getParentInfo($lid){


          $result = $this->where(array('lid'=>$lid))->find();

         if($result){
             return $result;

         }else{

             return array(
                 'lname'=>'顶级地区',
                 'lid'=>0
             );
         }
    }


    public function getLocalityFind($lid){



        return $this->where(array('lid'=>$lid))->find();
    }


    public function editLocality($data,$lid){

          $this->where(array('lid'=>$lid))->save($data);



    }


    public function checkSonLocality($lid){

       return $this->where(array('pid'=>$lid))->count();

    }


    public function delLocality($lid){

        $this->where(array('lid'=>$lid))->delete();

    }
}