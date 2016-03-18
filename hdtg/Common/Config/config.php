<?php
if (!defined("HDPHP_PATH"))exit('No direct script access allowed');
//更多配置请查看hdphp/Config/config.php
return array(
    /********************************基本参数********************************/
    'AUTO_LOAD_FILE'                => array(),     //自动加载文件
    /********************************数据库********************************/
    'DB_DRIVER'                     => 'mysqli',    //驱动
    'DB_CHARSET'                    => 'utf8',      //字符集
    'DB_HOST'                       => '127.0.0.1', //主机
    'DB_PORT'                       => 3306,        //端口
    'DB_USER'                       => 'root',      //帐号
    'DB_PASSWORD'                   => '',          //密码
    'DB_DATABASE'                   => 'hdgroup',          //数据库
    'DB_PREFIX'                     => 'group_',          //表前缀
    /********************************模板参数********************************/
    'TPL_PATH'                      => 'View',      //目录
    'TPL_FIX'                       => '.html',     //文件扩展名
    'TPL_TAGS'                      => array(),     //标签类
    /********************************URL路由********************************/
    'ROUTE'                         => array(),     //路由配置


    /********************************商品服务********************************/
   'GOODS_SERVER'=>array(

       1=>array(
           'name'=>'假一赔十',
           'img'=>'<span class="ico" style="background-position:0px 0px"></span>',
       ),
       2=>array(
           'name'=>'随时退款',
           'img'=>'<span class="ico" style="background-position:0px -62px"></span>',
       ),
      3=>array(
           'name'=>'不支持随时退款',
          'img'=>'<span class="ico" style="background-position:0px -121px"></span>',
       ),
       4=>array(
           'name'=>'不支持随时退款',
           'img'=>'<span class="ico" style="background-position:0px -182px"></span>',
       ),

   ),

    /********************************商品服务********************************/

      'price'=>array(
          'all'=>array(
              array('50元一下','0-50'),
              array('50元到100','50-100'),
              array('100元到150','100-150'),
              array('150元到200','150-200'),
              array('200元以上','200')
          ),
          '1'=>array(
              array('50元一下','0-50'),
              array('50元到100','50-100'),
              array('100元到150','100-150'),
              array('150元到200','150-200'),
              array('200元以上','200')
          ),
          '2'=>array(
              array('50元一下','0-50'),
              array('50元到100','50-100'),
              array('100元到150','100-150'),
              array('150元到200','150-200'),
              array('200元以上','200')
          ),
          '3'=>array(
              array('50元一下','0-50'),
              array('50元到100','50-100'),
              array('100元到150','100-150'),
              array('150元到200','150-200'),
              array('200元以上','200')
          ),
          '4'=>array(
              array('50元一下','0-50'),
              array('50元到100','50-100'),
              array('100元到150','100-150'),
              array('150元到200','150-200'),
              array('200元以上','200')
          ),
          '5'=>array(
              array('50元一下','0-50'),
              array('50元到100','50-100'),
              array('100元到150','100-150'),
              array('150元到200','150-200'),
              array('200元以上','200')
          ),
          '6'=>array(
              array('50元一下','0-50'),
              array('50元到100','50-100'),
              array('100元到150','100-150'),
              array('150元到200','150-200'),
              array('200元以上','200')
          ),
          '7'=>array(
              array('50元一下','0-50'),
              array('50元到100','50-100'),
              array('100元到150','100-150'),
              array('150元到200','150-200'),
              array('200元以上','200')
          ),
          '8'=>array(
              array('50元一下','0-50'),
              array('50元到100','50-100'),
              array('100元到150','100-150'),
              array('150元到200','150-200'),
              array('200元以上','200')
          ),
          '9'=>array(
              array('50元一下','0-50'),
              array('50元到100','50-100'),
              array('100元到150','100-150'),
              array('150元到200','150-200'),
              array('200元以上','200')
          ),



      ),


    /********************************RBAC权限控制********************************/
    'RBAC_TYPE'                     => 1,           //1时时认证｜2登录认证
    'RBAC_SUPER_ADMIN'              => 'super_admin', //超级管理员SESSION名
    'RBAC_USERNAME_FIELD'           => 'username',  //用户名字段
    'RBAC_PASSWORD_FIELD'           => 'password',  //密码字段
    'RBAC_AUTH_KEY'                 => 'uid',       //用户SESSION名
    'RBAC_NO_AUTH'                  => array(),     //不需要验证的控制器或方法如:array('index/index')表示index控制器的index方法不需要验证
    'RBAC_USER_TABLE'               => 'user',      //用户表
    'RBAC_ROLE_TABLE'               => 'role',      //角色表
    'RBAC_NODE_TABLE'               => 'node',      //节点表
    'RBAC_ROLE_USER_TABLE'          => 'user_role', //角色与用户关联表
    'ACCESS_TABLE'                  => 'access',    //权限分配表
    'RBAC_SUPER_ADMIN'          => 'super_admin', //角色与用户关联表
    'COOKIE_LIFE_TIME'               => 864000
);
?>