<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/12/24
 * Time: 13:39
 */
class GoodsModel extends  ViewModel
{

    public $table ='goods';

    public $cids;
    public $lids;
    public $price;
    public $order = '';		//鎺掑簭瑙勫垯
    public $keywords = null;



    public $view = array(
        'goods'=>array(
            '_type'=>'inner',
        ),
        'locality'=>array(
            '_type'=>'inner',
            '_on'=>'locality.lid=goods.lid'
        ),
        'category'=>array(
            '_type'=>'inner',
            '_on'=>'category.cid=goods.cid'
        ),
        'shop'=>array(
            '_type'=>'inner',
            '_on'=>'shop.shopid=goods.shopid'
        ),
//        'goods_detail'=>array(
//            'type'=>'inner',
//           'on'=>'goods_detail.goods_id=goods.gid'
//        )

    );


    public function getGoodsTotal(){

        $result = null;



        if(is_null($this->keywords)){

            $where = rtrim('end_time>'.time().' and '.$this->price,' and ');
        }else{

            $where = 'main_title like "%'.$this->keywords.'%"';

        }
      //  p($this->cids);

       // p($where);

        if(!empty($this->cids)&&!empty($this->lids)){
            $result= $this->where($where)->where(array('goods.cid'=>$this->cids,'goods.lid'=>$this->lids))->count();


        }else{

            if(!empty($this->cids)){
                $result= $this->where($where)->where(array('goods.cid'=>$this->cids))->count();

            }
            if(!empty($this->lids)){
                $result= $this->where($where)->where(array('goods.lid'=>$this->lids))->count();
            }
        }
        if(empty($this->cids) && empty($this->lids)){
            $result = $this->where($where)->count();
        }
        return $result;
    }

    public function getGoods($limit){

        //p($this->order);
        $result = null;

        $fields = array(
            'goods.gid',
            'goods.goods_img',
            'goods.main_title',
            'goods.sub_title',
            'goods.price',
            'goods.old_price',
            'goods.buy'
        );
        //  p($this->cids);
        if(is_null($this->keywords)){

            $where = rtrim('end_time>'.time().' and '.$this->price,' and ');
        }else{

            $where = 'main_title like "%'.$this->keywords.'%"';

        }
        // p($where);

        if(!empty($this->cids)&&!empty($this->lids)){

            $result= $this->field($fields)->where($where)->where(array('goods.cid'=>$this->cids,'goods.lid'=>$this->lids))->order($this->order)->limit($limit)->all();

        }else{

            if(!empty($this->cids)){

                $result= $this->field($fields)->where($where)->where(array('goods.cid'=>$this->cids))->order($this->order)->limit($limit)->all();

            }
            if(!empty($this->lids)){

                $result= $this->field($fields)->where($where)->where(array('goods.lid'=>$this->lids))->order($this->order)->limit($limit)->all();

            }
        }

        //娌℃湁浠讳綍鏉′欢鐨勬儏鍐?
              if(empty($this->cids) && empty($this->lids)){
            $result = $this->field($fields)->where($where)->order($this->order)->limit($limit)->all();
        }

        return $result;
    }





    public function getGoodsDetail($gid){

        $this->view['goods_detail']=array(
            '_type'=>'inner',
            '_on'=>'goods_detail.goods_id=goods.gid'

        );

        $result = $this->where(array('gid'=>$gid))->find();

        return $result;



    }


       public function getHotsGoods(){


          return $this->order('price desc')->limit(5)->select();
       }


        public function getHotsGroup(){

           return $this->group('goods.cid')->order('buy desc')->limit(8)->all();

        }


    public function getRelatedGoods($cid){

        return $this->where(array('goods.cid'=>$cid))->limit(5)->select();
    }











}