<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/12/17
 * Time: 16:51
 */
class CommonController extends Controller
{

    protected $db;


public function __init(){


    if(!isset($_SESSION[C('RBAC_SUPER_ADMIN')])){

        $this->error('û�е�¼����Ȩ��');

    }



     if(method_exists($this,'__auto')){


         $this->__auto();
     }

}




}