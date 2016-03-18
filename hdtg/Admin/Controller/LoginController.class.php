<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/1/13
 * Time: 13:38
 */
class LoginController extends Controller
{



    public function __init(){

        $this->setNav();
        $this->assign('userIsLogin',isset($_SESSION[C('RBAC_AUTH_KEY')]));


    }


    public function index(){

        $this->display();
    }


      public function showCode(){

          $code = new Code();
          $code->show();
      }




    public function login(){

        IF(!IS_POST) $this->error('禁止访问');

         $username = Q('username',null,'addslashed');
        $password = Q('password',null,'md5');
        $db = M('admin');
        $where = array('adminname'=>$username);
        $info = $db->where($where)->find();
        if($info['adminpass'] !=$password){
            $this->error('登陆失败!','index');
        }else{
            $_SESSION[C('RBAC_SUPER_ADMIN')] = $info['adminid'];
            $this->success('登陆成功!',U('Admin/Index/index'));
        }



    }
    public function checkCode(){

        $data = array('status'=>false);

        if($_SESSION['code']== strtoupper($_POST['code'])){

            $data['status']=true;
        }

        $this->ajax($data,'json');

    }

    private function setNav(){
        $db = K('category');
        $nav = $db->getCategoryLevel(0);
        $this->assign('nav',$nav);
    }
}