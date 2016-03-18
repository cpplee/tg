<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/12/19
 * Time: 20:28
 */
class CommonController extends Controller
{


    protected $db;


    public function __init(){


        if(method_exists($this,'__auto')){


             $this->__auto();

        }

           $this->setNav();

    }


    private function setNav(){
        $db = K('category');
        $nav = $db->getCategoryLevel(0);
        $this->assign('nav',$nav);
    }
}