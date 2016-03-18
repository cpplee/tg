<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/12/27
 * Time: 18:28
 */
class BuyController extends CommonController
{


public function __auto(){


    if(is_null($_SESSION[C("RBAC_AUTH_KEY")])){

        go(U('Member/Login/index'));

    }
    $this->uid =intval($_SESSION[C("RBAC_AUTH_KEY")]);
   // var_dump($this->uid);
}




    public function index(){

            $db = K('user');
            //   p($this->uid);
            $address = $db->getAddress($this->uid);
            // p($address);
            $this->assign('address', $address);

            $gid = Q('gid');

            $db = K('goods');

            $goods = $db->getGoodsFind($gid);

            $this->assign('goods',$goods);


        $this->display();

    }


    public function payment(){


       if(IS_POST){
            if(!isset($_POST['addressid'])) $this->error('请选择一个收货地址');
           if(is_array($_POST['gid'])){

               $data = $_POST;
               foreach($data['gid'] as $k=>$v){

                   $_POST['gid'] = $v;
                   $_POST['price']= $data['price'][$k];
                   $_POST['goods_num'] = $data['goods_num'][$k];
                   $_POST['addressid'] = $data['addressid'];
                   if(!$this->getOrder()) $this->error('订单提交失败');
                   //   p($_POST);

               }

           }else{

               if(!$this->getOrder()) $this->error('订单提交失败');

           }

       }


        $order = $this->getOrderDataInfo();

        $sumArr = array();
        foreach($order as $v){

            $sumArr[] = $v['price']*$v['goods_num'];

        }

        $this->assign('sumPrice',array_sum($sumArr));


        $this->assign('order',$order);

        $db=K('user');
        $balance = $db->getUserBalance($this->uid);
        p($balance);
        $this->assign('balance',$balance);
        $this->display();
    }





    private function getOrder(){

        $data = array();
        $data['user_id']=$this->uid;
        $data['goods_id']=$_POST['gid'];
        $data['goods_num']=$_POST['goods_num'];
        $data['addressid']=$_POST['addressid'];

        $data['total_money']= $data['goods_num']*$_POST['price'];

        $db = K('order');
        $where = array('user_id'=>$this->uid,'goods_id'=>$data['goods_id'],'status'=>'未付款');
        if(!$db->checkOrder($where)){
            return $db->addOrder($data);
        }
        return true;


    }

    private function getOrderDataInfo(){

        $db = K('order');
        $orderid = Q('oid',null);
        if(is_null($orderid)){
            $where = array('user_id'=>$this->uid,'status'=>'未付款');
        }else{
            $where = array('orderid'=>$orderid);
        }
        return  $db->getOrderData($where);




    }


   public function buysuccess($orderids,$totalPrice){

       $db = K('order');
       if(!$db->updateStatus($orderids)){
           $this->error('付款失败!',U('Index/Index/index'));
       }else{
           $db = K('user');
           $db->updateBalance($this->uid,$totalPrice);
           $db = K('cart');
           $db->delCart(array('user_id'=>$this->uid));
           $this->display('buysuccess');
       }
   }

    public function checkBuy(){

      if(!IS_POST){

          exit;
      }
      $orderids = $_POST['orderid'];

        $db = K('order');
        $data=$db->getOrder($orderids);
        $sumArr = array();
        foreach ($data as $v){
            $sumArr[] = $v['price']*$v['goods_num'];
        }
        $totalPrice = array_sum($sumArr);
     //   p($totalPrice);
        $db = K('user');
        $balance = $db->getUserBalance($this->uid);
        if($balance<$totalPrice){
            $this->error('付款失败，请充值!',U('Member/Account/index'));
        }else{
            $this->buysuccess($orderids,$totalPrice);
        }

    }


}