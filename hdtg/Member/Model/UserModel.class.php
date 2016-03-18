<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/12/30
 * Time: 18:07
 */
class UserModel extends ViewModel
{

    public $table='user';
  public $view;

        public function check($field,$value){


            return $this->where(array($field=>$value))->count();




        }


    public function addUser($data){

      return  $this->add($data);

    }

    public function addAddress($data){
        return $this->table('user_address')->add($data);
    }

    public function getUser($where){

        return $this->where($where)->find();

    }


    public function addBalance($uid){
        return $this->table('userinfo')->inc('balance','user_id='.$uid,10000);
    }


    public function getAddress($uid){
        return $this->table('user_address')->where(array('user_id'=>$uid))->select();
    }

    public function delAddress($id){
        return $this->table('user_address')->where(array('addressid'=>$id))->del();
    }


    public function getUserBalance($uid){

        $result= $this->table('userinfo')->where(array('user_id'=>$uid))->find();
             return $result['balance'];

    }


    public function updateBalance($uid,$num){
        $this->table('userinfo')->dec('balance','user_id='.$uid,$num);
    }


    /**
     * 验证时存在商品的收藏
     */
    public function checkCollect($where){
        return $this->table('collect')->where($where)->count();
    }
    /**
     * 添加收藏
     */
    public function addCollect($data){
        return $this->table('collect')->add($data);
    }
    /**
     * 查询用户收藏的商品
     */
    public function getCollect($where){
        $this->view = array(
            'user'=>array(
                '_type'=>'inner',
            ),
            'collect'=>array(
                '_type'=>'inner',
                '_on'=>'user.uid=collect.user_id'
            ),
            'goods'=>array(
                '_type'=>'inner',
                '_on'=>'goods.gid=collect.goods_id'
            )
        );


        return $this->where($where)->all();

    }

    /**
     * 删除用户的收藏
     */
    public function delCollect($where){
        return $this->table('collect')->where($where)->del();
    }

}