<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/12/28
 * Time: 19:07
 */
class RegController extends CommonController
{



    public function __auto(){

        $this->db = K('User');


    }


    public function index(){

        $this->display();

    }

    public function showCode(){

        $code = new Code();

        $code->show();




    }


    public function check(){

        if(IS_AJAX === false){

          $this->error('非法调用');

        }




        $key = key($_POST);
        $value = $_POST[$key];

        switch($key){

            case 'email':
                  if($this->db->check('email',$value)){

                       $this->ajax(array('status'=>false,'msg'=>'该邮箱已存在'),'json');
                  }else{
                      $this->ajax(array('status'=>true,'msg'=>'该邮箱未被使用'),'json');
                  }
                break;
            case 'username':
                if($this->db->check('uname',$value)){

                    $this->ajax(array('status'=>false,'msg'=>'该用户名已存在'),'json');
                }else{
                    $this->ajax(array('status'=>true,'msg'=>'该用户名未被使用'),'json');
                }
                break;
            case 'code':
                if($_SESSION['code']!=strtoupper($_POST['code'])){

                    $this->ajax(array('status'=>false,'msg'=>'该验证码不正确'),'json');
                }else{
                    $this->ajax(array('status'=>true,'msg'=>'验证码正确'),'json');
                }
                break;

        }


     // $this->ajax($_POST,'json');

    }




    public function addUserInfo(){



        if(!IS_POST) $this->error('禁止访问');

        $data =array();

        $data['email']=Q('email');

        $data['uname']=Q('username');
        $data['password']=md5(Q('email'));

       $uid =  $this->db->addUser($data);

        if($uid){
            $_SESSION[C('RBAC_AUTH_KEY')]=$uid;
            setcookie(session_name(),session_id(),time()+C('COOKIE_LIFE_TIME'),'/');

            $this->success('注册成功');
        }else{

            $this->error('注册失败');

        }
    }



}