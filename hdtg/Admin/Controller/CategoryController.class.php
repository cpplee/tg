<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/12/17
 * Time: 14:19
 */
class CategoryController extends CommonController
{


    private $cid;


    public function __auto(){

     $this->db = K('category');

        $this->cid = Q('cid');
    }




    public function index(){


        $category = $this->db->getCategoryAll();

        $data = Data::channelList($category,0,'--','cid','pid',1);

     //  p($data);
       $this->assign('data',$data);
        $this->display();
    }

    public function add(){



  if(IS_POST){
      $data = $this->getData();


      $this->db->addCategory($data);
        $this->success('添加成功');


  }

        $parent=$this->db->getParentInfo($this->cid);
//        p($parent);
        $this->assign('parent',$parent);


        $cate = $this->db->getCategoryAll();
        $cate = Data::channelList($cate,0,'--','cid','pid',1);

         $this->assign('cate',$cate);

            $this->display();

    }

    public function welcome(){

            $this->display();


          }


    public function edit(){



                 if(IS_POST){


    $data =$this->getData();

       $this->db->editCategory($this->cid,$data);

    $this->success('修改分类成功');



             }






        $category =  $this->db->getCategoryFind($this->cid);
      //  p($category);
        $parent=$this->db->getParentInfo($category['pid']);
     //  p($parent);
        $this->assign('parent',$parent);

        $cate = $this->db->getCategoryAll();
        $cate = Data::channelList($cate,0,'--','cid','pid',1);

        $this->assign('level',$cate);
        $this->assign('category',$category);


        $this->display();




    }

    public function getData(){

        $data = array();
        $data['cname']=Q('cname');
        $data['title']=Q('title');
        $data['keywords']=Q('keywords');
        $data['pid']=Q('pid');
        $data['description']=Q('description');
        $data['sort']=Q('sort');
        $data['display']=Q('display');

        return $data;


    }


    public function del(){

        if($this->db->checkSonCategory($this->cid))
        {

            $this->error('请先删除子分类');

        }

        $this->db->delCategory($this->cid);

       $this->success('删除成功');
    }







}