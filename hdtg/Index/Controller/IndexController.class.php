<?php
//测试控制器类
class IndexController extends CommonController{
    //动作方法



     public $cid;        //分类主键
    public $lid;    //地区主键
    public $price;
    private $url;		//检索的url


    private $order;

    public function __auto(){

        if(strlen(U('Index/Index/index'))>strlen(__URL__)){
            $this->url = U('Index/Index/index');
        }else{
           $newUrl= str_replace(array('?','='),'/',__URL__);
            p($newUrl);
            $this->url = remove_url_param('keywords',$newUrl);
        }



      $this->db=K('Goods');

        $this->cid = Q('cid');
        $this->lid = Q('lid');
        $this->price=Q('price');
        $this->order = Q('order','t-desc');

        $this->setCategory();
        $this->setLocality();
        $this->setPrice();
        $this->setOrderUrl();

    }



    public function index(){



       // p($this->cid);




        $this->getSearchWhere();

        $this->setOrder();


        $goodsTotal =$this->db->getGoodsTotal();

       // p($goodsTotal);
        $page = new Page($goodsTotal,5,4,2);

        $goods = $this->db->getGoods($page->limit());


        $goods = $this->disGoods($goods);
       // p($goods);
        $this->assign('goods',$goods);
       $this->assign('page',$page->show());
        //显示视图

        $this->assignHotsGoods();

        $this->setHotsGroup();

        $this->assign('userIsLogin',isset($_SESSION[C('RBAC_AUTH_KEY')]));

         //  p(isset($_SESSION[C('RBAC_AUTH_KEY')]));

        $this->display();
    }



    private function setOrder(){
        $order = '';
        $arr = explode('-',$this->order);
        switch ($arr[0]){
            case 'd':
                $order = 'begin_time '.$arr[1];
                break;
            case 'b':
                $order = 'buy '.$arr[1];
                break;
            case 'p':
                $order = 'price '.$arr[1];
                break;
            case 't':
                $order = 'begin_time '.$arr[1];
                break;
        }

        $this->db->order = $order;
    }



    private function getSearchWhere(){

        if(isset($_GET['keywords'])){

           $this->db->keywords=Q('keywords');
            p($this->db->keywords);
            return;

        }




        if(!is_null($this->cid)){

            $db=K('Category');

            $sonCids= $db->getSonCategory($this->cid);

            $temp = array();
            foreach($sonCids as $v){
               $temp[] = $v['cid'];
            }
          $tempString = implode(',',$temp);
           // p($tempString);
           $this->db->cids['goods.cid'] = array('IN',$tempString);
         //  p($this->db->cids);
        }

        if(!is_null($this->lid)){
            $db=K('Locality');
            $sonCids= $db->getSonLocality($this->lid);
             //   p($sonCids);
            $temp = array();
            foreach($sonCids as $v){
                $temp[] = $v['lid'];
            }
            $tempString = implode(',',$temp);

            // p($tempString);
            $this->db->lids['goods.lid'] = array('IN',$tempString);

         //  p($this->db->lids);

        }

        if(!is_null($this->price)){

            $arr =explode('-',$this->price);


           if(isset($arr[1])){

               $this->db->price='price>'.$arr[0].' and price<'.$arr[1];

           }else{
               $this->db->price='price>'.$arr[0];

           }

        //    p($this->db->price);

        }

    }

    public function setCategory(){



        $url = remove_url_param('cid', $this->url);



      $db = K('Category');

        if(is_null($this->cid)){

            $topCategory = $db->getCategoryLevel(0);
            $temArr = array();
            $temArr[] = '<a class="active" href=""'.$url.'">全部</a>';
            foreach($topCategory as $v){

                $temArr[] = '<a href="'.$url.'/cid/'.$v['cid'].'">'.$v['cname'].'</a>';


            }
          //  p($temArr);
            $this->assign('topCategory',$temArr);
                 return ;
        }

        $pid = $db->getCategoryPid($this->cid);
        $topCategory = $db->getCategoryLevel(0);
        $tmpArr = array();
        $tmpArr[] = '<a  href="'.$url.'">全部</a>';
        foreach ($topCategory as $v){
            if($pid == $v['cid'] || $this->cid == $v['cid']){
                $tmpArr[] = '<a class="active" href="'.$url.'/cid/'.$v['cid'].'">'.$v['cname'].'</a>';
            }else{
                $tmpArr[] = '<a href="'.$url.'/cid/'.$v['cid'].'">'.$v['cname'].'</a>';
            }
        }
        $this->assign('topCategory',$tmpArr);
        if($pid == 0){
            $sonCategory = $db->getCategoryLevel($this->cid);
        }else{
            $sonCategory = $db->getCategoryLevel($pid);
        }
        if(is_null($sonCategory)) return;

        $temArr = array();

        if($pid==0){

            $temArr[] = '<a class="active" href="'.$url.'/cid/'.$this->cid.'">全部</a>';

        }else{

            $temArr[] = '<a  href="'.$url.'/cid/'.$pid.'">全部</a>';

        }


        foreach($sonCategory as $v){

            if($v['cid']==$this->cid){

                $temArr[] = '<a class="active" href="'.$url.'/cid/'.$v['cid'].'">'.$v['cname'].'</a>';

            }else{

                $temArr[] = '<a  href="'.$url.'/cid/'.$v['cid'].'">'.$v['cname'].'</a>';

            }

        }

        $this->assign('sonCategory', $temArr);


    }




    private function setLocality(){
        $url = remove_url_param('lid',$this->url);


        $db = K('Locality');

        //当没有cid的时候
        if(is_null($this->lid)){
            $topLocality = $db->getLocalityLevel(0);
            $tmpArr = array();
            $tmpArr[] = '<a class="active" href="'.$url.'">全部</a>';
            foreach ($topLocality as $v){
                $tmpArr[] = '<a href="'.$url.'/lid/'.$v['lid'].'">'.$v['lname'].'</a>';
            }
            $this->assign('topLocality',$tmpArr);
            return ;
        }

        $pid = $db->getLocalityPid($this->lid);
        $topLocality = $db->getLocalityLevel(0);
        $tmpArr = array();
        $tmpArr[] = '<a  href="'.$url.'">全部</a>';
        foreach ($topLocality as $v){
            if($pid == $v['lid'] || $this->lid == $v['lid']){
                $tmpArr[] = '<a class="active" href="'.$url.'/lid/'.$v['lid'].'">'.$v['lname'].'</a>';
            }else{
                $tmpArr[] = '<a href="'.$url.'/lid/'.$v['lid'].'">'.$v['lname'].'</a>';
            }
        }

        $this->assign('topLocality',$tmpArr);
        if($pid == 0){
            $sonLocality = $db->getLocalityLevel($this->lid);
        }else{
            $sonLocality = $db->getLocalityLevel($pid);
        }
        if(is_null($sonLocality)) return;

        //组合子地区模板
        $tmpArr = array();
        if($pid == 0){
            $tmpArr[] = '<a class="active"  href="'.$url.'/lid/'.$this->lid.'">全部</a>';
        }else{
            $tmpArr[] = '<a  href="'.$url.'/lid/'.$pid.'">全部</a>';
        }

        foreach ($sonLocality as $v){
            if($v['lid'] == $this->lid){
                $tmpArr[] = '<a class="active" href="'.$url.'/lid/'.$v['lid'].'">'.$v['lname'].'</a>';
            }else{
                $tmpArr[] = '<a  href="'.$url.'/lid/'.$v['lid'].'">'.$v['lname'].'</a>';
            }
        }

        $this->assign('sonLocality', $tmpArr);
    }
    /**
     * 设置价格筛选模板
     */
    private function setPrice(){
        $url = remove_url_param('price',$this->url);

        $db = K('Category');
        $key = '';
        if(is_null($this->cid)){
            $key = 'all';
        }else{
            $pid = $db->getCategoryPid($this->cid);
            $key = $pid?$pid:$this->cid;
        }
        $prices = C('price');
        $price = $prices[$key];
        $tmpArr = array();
        if(is_null($this->price)){
            $tmpArr[] = '<a class="active" href="'.$url.'">全部</a>';
        }else{
            $tmpArr[] = '<a  href="'.$url.'">全部</a>';
        }
        foreach ($price as $v){
            if($this->price == $v[1]){
                $tmpArr[] = '<a  class="active" href="'.$url.'/price/'.$v[1].'">'.$v[0].'</a>';
            }else{
                $tmpArr[] = '<a  href="'.$url.'/price/'.$v[1].'">'.$v[0].'</a>';
            }
        }
        $this->assign('price', $tmpArr);
    }




    private function disGoods($data){

        if(!is_array($data)) return;

        foreach($data as $k=>$v){


           $pathInfo = pathinfo($v['goods_img']);


            if(isset($pathInfo)){
                $data[$k]['goods_img']= $pathInfo['dirname'].'/'.$pathInfo['filename'].'thumb310185'.'.'.$pathInfo['extension'];
            }

            $data[$k]['sub_title'] = mb_substr($v['sub_title'],0,30,'utf8');

        }


        return $data;

    }


    public function setOrderUrl(){


      $url = remove_url_param('order',$this->url);


        $orderUrl = array();

        $orderUrl['d']=$url.'/order/t-desc';

        $orderUrl['b']=$url.'/order/b-desc';

        $orderUrl['p_d']=$url.'/order/p-desc';

        $orderUrl['p_a']=$url.'/order/p-asc';

        $orderUrl['t']=$url.'/order/t-desc';



        $this->assign('orderUrl',$orderUrl);



    }

      public function assignHotsGoods(){

          $hotsGoods = $this->db->getHotsGoods();

          foreach($hotsGoods as $k=>$v){
              $data[$k+1]=$v;
              $pathInfo = pathinfo($v['goods_img']);
              if(isset($pathInfo)){
                  $data[$k+1]['goods_img']= $pathInfo['dirname'].'/'.$pathInfo['filename'].'thumb9050'.'.'.$pathInfo['extension'];
              }

          }

          $this->assign('hotsGoods',$data);


      }

    public function setHotsGroup(){

        $hotsGroup = $this->db->getHotsGroup();

        $this->assign('hotsGroup',$hotsGroup);

    }







}
