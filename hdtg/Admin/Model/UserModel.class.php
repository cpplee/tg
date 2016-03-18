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
     * ����û��ܵ����ݵ�����
     */
    public function getUserTotal($where){
        return $this->where($where)->count();
    }
    /**
     * ����û�������
     */
    public function getUser($where,$limit){

        return $this->where($where)->limit($limit)->all();
    }

    /**
     * ɾ���û���
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