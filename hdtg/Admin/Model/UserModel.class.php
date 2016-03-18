<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/1/14
 * Time: 18:20
 */
class UserModel extends ViewModel
{


    public $table='user';

    public $view = array(
        'user'=>array(
            '_type'=>'inner',

        ),
        'userinfo'=>array(
            '_type'=>'inner',
            '_on'=>'userinfo.user_id=user.uid'
        )
    );

    /**
     * 获得用户总的数据的条数
     */
    public function getUserTotal($where){
        return $this->where($where)->count();
    }
    /**
     * 获得用户的数据
     */
    public function getUser($where,$limit){

        return $this->where($where)->limit($limit)->all();
    }

    /**
     * 删除用户的
     */

    public function delUser($uid){
        $this->table('collect')->where(array('user_id'=>$uid))->del();
        $this->table('cart')->where(array('user_id'=>$uid))->del();
        $this->table('order')->where(array('user_id'=>$uid))->del();
        $this->table('userinfo')->where(array('user_id'=>$uid))->del();
        $this->table('user_address')->where(array('user_id'=>$uid))->del();
        return $this->where(array('uid'=>$uid))->del();
    }

}