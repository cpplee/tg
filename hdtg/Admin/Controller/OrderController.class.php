<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/1/14
 * Time: 16:02
 */
class OrderController extends CommonController
{





    public function __auto(){

        $this->db=K('Order');

    }




    public function index(){


        $where = $this->getWhere();

        $total = $this->db->getOrderTotal($where);

     $page = new Page($total,2,2,2);

        $order = $this->db->getOrder($where,$page->limit());

      $this->assign('order',$order);

        $this->assign('page',$page->show());


        $this->display();

    }

    private function getWhere(){

        $where = array();
        $status =  Q('status',null);
        if(!is_null($status)){
            $where['status'] = $status;
        }
        return $where;

    }



    public function del(){
        $oid=  Q('orderid',null);
        if($this->db->delOrder($oid)){
            $this->success('É¾³ı³É¹¦!','index');
        }else{
            $this->error('É¾³ıÊ§°Ü!','index');
        }
    }



}