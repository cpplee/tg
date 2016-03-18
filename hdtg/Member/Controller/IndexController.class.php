<?php
//测试控制器类
class IndexController extends CommonController{
    //动作方法


    public function __auto(){


        if(is_null($_SESSION[C("RBAC_AUTH_KEY")])){

            go(U('Member/Login/index'));

        }
        $this->uid =intval($_SESSION[C("RBAC_AUTH_KEY")]);
        // var_dump($this->uid);
    }



    public function index(){
        //显示视图
        $this->display();
    }




        public function getRecentView(){

            if(!IS_AJAX) $this->error('禁止访问');



            $key =encrypt('recent-view');


            if(!isset($_COOKIE[$key])){

               $result['status']=false;
          $this->ajax($result,'json');

            }

            $value=unserialize(decrypt($_COOKIE[$key]));

           $db=K('goods');

          $data=$db->getGoods($value);

            if($data){

                $data=$this->disData($data);
                $result['status']=true;
                $result['data']=$data;
                $this->ajax($result,'json');
            }else{

                    $result['status']=false;

            }

            $this->ajax($result,'json');

        }


    private function disData($data){


        foreach($data as $k=>$v){

            $pathInfo = pathinfo($v['goods_img']);

            if(isset($pathInfo)){
                $data[$k]['goods_img']= $pathInfo['dirname'].'/'.$pathInfo['filename'].'thumb9050'.'.'.$pathInfo['extension'];
            }


        }
        return $data;


    }

public function clearRecentView(){


           if(!IS_AJAX) $this->error('禁止访问');

             $key = encrypt('recent-view');

           if(isset($_COOKIE[$key])){

                  unset($_COOKIE[$key]);
           }

    setcookie($key,'',0,'/');

}


public function collect(){

    $db = K('user');


    $status = Q('status',null);
    $where=array('uid'=>$this->uid);
    if(!is_null($status)){
        if($status == 1){
            $where =	'uid ='.$this->uid.' and end_time>='.time();
        }else{
            $where = 'uid ='.$this->uid.' and end_time<'.time();
        }
    }





   $data= $db->getCollect($where);
   $collect = $this->disDataCollect($data);

    $this->assign('collect',$collect);


    $this->display();
}



    public function addCollect(){

        $db = K('user');
        $gid = Q('gid',null);
        $data = array(
            'user_id'=>$this->uid,
            'goods_id'=>$gid
        );
        $result = array();
        if($db->checkCollect($data)){
            $result = array('status'=>true);
        }else{
            if($db->addCollect($data)){
                $result = array('status'=>true);
            }else{
                $result = array('status'=>false);
            }
        }
       $this->ajax($result,'json');

    }

    public function disDataCollect($data){

        if(!$data) return false;

        foreach($data as $k=>$v){

            $pathInfo = pathinfo($v['goods_img']);

            if(isset($pathInfo)){
                $data[$k]['goods_img']= $pathInfo['dirname'].'/'.$pathInfo['filename'].'thumb9050'.'.'.$pathInfo['extension'];
               $data[$k]['status'] = $v['end_time']>time()?'进行中':'已下架';
            }


        }
        return $data;



    }

    public function delCollect(){

        $where = array(
            'user_id'=>$this->uid,
            'goods_id'=>Q('gid',null)

        );

        $db = K('user');
        if($db->delCollect($where)){


            $this->success('删除成功','collect');
        }


    }



}
