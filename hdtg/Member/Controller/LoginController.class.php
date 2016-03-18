<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/12/31
 * Time: 13:21
 */
class LoginController extends CommonController
{



    public function __auto(){



        $this->db=K('User');

    }



    public function index(){




        $this->display();


    }

    public function login(){



        if(!IS_POST) $this->error('非法登录');


        $data = $this->getData();




        $where = array('uname'=>$data['uname'],'_logic'=>'OR','email'=>$data['email']);


       $userInfo =  $this->db->getUser($where);

       if($userInfo['password']==$data['password']){

            $_SESSION[C('RBAC_AUTH_KEY')]=$userInfo['uid'];

         //  p($_SESSION[C('RBAC_AUTH_KEY')]);
       //    p($data['auto_login']);
           if(!is_null($data['auto_login'])){

               setcookie(session_name(),session_id(),time()+C('COOKIE_LIFE_TIME'),'/');
           }else{

               setcookie(session_name(),session_id(),0,'/');
           }
           
           $this->success('登陆成功',U('Index/Index/index'));


       }










    }


    public function quit(){

       setcookie(session_name(),session_id(),0,'/');
        session_unset();
        session_destroy();

      $this->success('退出成功');

    }





    public function getData(){

        $data =array();

        $data['uname']=Q('username');
        $data['email']=Q('email','');
        $data['auto_login']=Q('auto_login');

        $data['password']=md5(Q('password'));

        return $data;

    }



}