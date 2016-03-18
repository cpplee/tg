<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/12/18
 * Time: 17:48
 */
class LocalityController extends CommonController
{

    protected $db;

    private $lid;

    public function __auto(){

        $this->db = K('Locality');

        $this->lid = Q('lid');


    }


    public function index(){


        $data = $this->db->getLocalityAll();

        $data= Data::channelList($data,0,'--','lid','pid',1);
        $this->assign('data',$data);

        $this->display();

    }


    public function add(){


        if(IS_POST){



        $data = $this->getData();

           // p($data);

            $this->db->addLocalityInfo($data);

            $this->success('添加地区成功');




        }


        $parent = $this->db->getParentInfo($this->lid);

        $this->assign('parent',$parent);


       $locality =  $this->db->getLocalityAll();

       $level =  Data::channelList($locality,0,'--','lid','pid',1);


        $this->assign('level',$level);


        $this->display();

    }


    public function getData(){

        $data = array();
        $data['lname']=Q('lname');
        $data['sort']=Q('sort');
        $data['display']=Q('display');
        $data['pid']=Q('pid');

        return $data;

    }


    public function edit(){


        if(IS_POST){

              $data = $this->getData();

            $this->db->editLocality($data,$this->lid);
              $this->success('修改地区成功');

        }



        $locality =  $this->db->getLocalityAll();

        $level =  Data::channelList($locality,0,'--','lid','pid',1);


        $this->assign('level',$level);




        $locality = $this->db->getLocalityFind($this->lid);


        $parent = $this->db->getParentInfo($locality['pid']);

        $this->assign('parent',$parent);


         $this->assign('locality',$locality);


        $this->display();


    }



    public function del(){


        if($this->db->checkSonLocality($this->lid)){

            $this->error('请先删除子地区');
        }
            $this->db->delLocality($this->lid);

          $this->success('删除成功');
    }



}