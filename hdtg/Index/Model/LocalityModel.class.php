<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/12/23
 * Time: 20:57
 */
class LocalityModel extends ViewModel
{


    public $tables = 'locality';


    /**
     * ���ȼ���ȡ��������
     */
    public function getLocalityLevel($pid){
        return $this->field('lname,lid')->where(array('pid'=>$pid,'display'=>1))->order('sort asc')->select();
    }
    /**
     * ��ȡ�����ĸ�id
     */
    public function getLocalityPid($lid){
        $result =  $this->field('pid')->where(array('lid'=>$lid))->find();
        return $result['pid'];
    }
    /**
     * ��ȡ���е��ӵ���id
     */
    public function getSonLocality($lid){
        $result = $this->field('lid')->where(array('pid'=>$lid))->select();
        if(empty($result)){
            $result = array(array('lid'=>$lid));
        }
        return $result;
    }




}