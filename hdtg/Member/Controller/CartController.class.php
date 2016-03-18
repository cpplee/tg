<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/12/27
 * Time: 19:03
 */
class CartController extends Controller
{

       private $uid=null;


    public function __init(){

        if(Rbac::isLogin()){

                $this->uid = $_SESSION[C('RBAC_AUTH_KEY')];

                 $this->writeCart();
        }
        $this->setNav();
        $this->assign('userIsLogin',isset($_SESSION[C('RBAC_AUTH_KEY')]));

    }
    public function index(){



          $cart =$this->getCartData();
      //  p($cart);
        $data = $this->disCart($cart);
      //  p($data);
           if(!IS_AJAX){

               $this->assign('cart',$data[0]);
               $this->assign('total',$data[1]);
               $db = K('user');
               $address = $db->getAddress($this->uid);
               $this->assign('address', $address);
               $this->display();

           }else{

               if(isset($data[0])){

                   $this->ajax(array('status'=>true,'data'=>$data[0]),'json');

               }else{

                   $this->ajax(array('status'=>false),'json');
               }


           }



    }


      private function getCartData(){

          $db = K('cart');

          $result = array();

          if(is_null($this->uid)){


              if(is_null($_SESSION['cart']['goods'])) return;
              $carts = $_SESSION['cart']['goods'];

                  foreach($carts as $v){

                     $data = $db->getGoods(array('gid'=>$v['id']));

                   $data['goods_num']=$v['num'];
                $result[]=$data;
                  }

          }else{


              $result = $db->getCartAll($this->uid);




          }

        // p($result);
          return $result;

      }



    public function disCart($cart){

        if(empty($cart)) return false;
        $total =0;
        foreach($cart as $k=>$v){

             $cart[$k]['xiaoji'] = $v['goods_num']*$v['price'];
           $cart[$k]['status'] = $v['end_time']<time()?'已下架':'可购买';

            $total = $total + $cart[$k]['xiaoji'];
            $pathInfo = pathinfo($v['goods_img']);


            if(isset($pathInfo)){
                $cart[$k]['goods_img']= $pathInfo['dirname'].'/'.$pathInfo['filename'].'thumb9050'.'.'.$pathInfo['extension'];
            }


        }
              return array($cart,$total);

    }



    public function add(){



        if(!IS_AJAX){
            $this->error('禁止访问');}



        $result = array();


          if(is_null($this->uid)){

                        $data = array(

                            'id'=>Q('gid'),
                            'name'=>'',
                            'num'=>1,
                            'price'=>0

                        );

               Cart::add($data);
              $total = cart::getTotalNums();
              $totalCategory = count($_SESSION['cart']['goods']);

             $result = array('status'=>true,'total'=>$total,'totalCategory'=>$totalCategory);

               $this->ajax($result,'json');

          }else{
              $data = array();
              $data['goods_id']=Q('gid');
              $data['user_id']=$this->uid;
              $data['goods_num']=1;

              $result = $this->checkAdd($data);

              if($result){

                  $db =K('Cart');
                  $where = array('user_id'=>$data['user_id'],'goods_id'=>$data['goods_id']);

                   $total = $db->countCart($where);
                   $result = array('status'=>true,'total'=>$total);
              }
              $this->ajax($result,'json');

          }
    }
//
    public function writeCart(){

        if(is_null($_SESSION['cart']['goods'])) return;
             $carts = $_SESSION['cart']['goods'];
            foreach($carts as $v){

                $data = array();
                $data['user_id']=$this->uid;
                $data['goods_id']=$v['id'];
                $data['goods_num']=$v['num'];

               $this->checkAdd($data);
            }

       // unset($_SESSION['cart']);

    }


    public function checkAdd($data){
        $where =array('user_id'=>$this->uid,'goods_id'=>$data['goods_id']);

        $db = K('cart');

        $cart_id = $db->checkCart($where);

        if($cart_id){
            return $db->incCart($cart_id,$data['goods_num']);
        }else{
           return $db->addCart($data);
        }

    }

    public function updateGoods(){

        if(!IS_AJAX) return false;
           $gid = Q('gid');
           $goodsNum = Q('num');

        $result = array();
         if(is_null($this->uid)){

             foreach($_SESSION['cart']['goods'] as $k=>$v){
               if($v['id']==$gid){
                   $_SESSION['cart']['goods'][$k]['num'] =$goodsNum;

                   $result = array(
                       'status'=>true,
                       'num'=>$goodsNum,
                   );

               }
             }

         }else{

             $db = K('cart');
             $where= array(
                 'goods_id'=>$gid,
                 'user_id'=>$this->uid,
             );
             if($db->updateCartNum($where,$goodsNum)){

                 $result = array(
                     'status'=>true,
                     'num'=>$goodsNum,
                 );
             }


         }

            $this->ajax($result,'json');
    }


    private function setNav(){
        $db = K('category');
        $nav = $db->getCategoryLevel(0);
        $this->assign('nav',$nav);
    }

    public function del(){

        if(!IS_AJAX) $this->error('禁止访问');

        $gid = Q('gid');

        $result =array();
        $result['status']=false;
        if(is_null($this->uid)){

             foreach($_SESSION['cart']['goods'] as $k=>$v){

                    if($v['id']==$gid){
                          unset($_SESSION['cart']['goods'][$k]);
                        $result['status']=true;
                    }
             }
        }else{

            $where= array('user_id'=>$this->uid,'goods_id'=>$gid);
            $db = K('Cart');
           if($db->delCart($where)){
               $result['status']=true;
           }

        }



        $this->ajax($result,'json');
    }

}