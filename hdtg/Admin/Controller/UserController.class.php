<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/1/14
 * Time: 18:10
 */
class UserController extends CommonController
{



    public function __auto(){

        $this->db =K('User');

    }

    public function index(){
        $where = $this->getWhere();
        $total = $this->db->getUserTotal($where);
        $page=  new Page($total,2,2,2);
        $user = $this->db->getUser($where,$page->limit());
        $this->assign('page',$page->show());
        $this->assign('user', $user);
        $this->display();
    }
    /**
     * ��ȡwhere����
     * @return multitype:
     */
    private function getWhere(){
        $where = array();

        return $where;
    }

    public function del(){
        $uid = Q('uid',0);
        if($this->db->delUser($uid)){
            $this->success('ɾ���ɹ�!','index');
        }else{
            $this->error('ɾ��ʧ��!','index');
        }
    }

}