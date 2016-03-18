<?php if(!defined('HDPHP_PATH'))exit;C('SHOW_NOTICE',FALSE);?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link href="http://localhost/hdtg/hdtg/Admin/View/Public/css/base.css" type="text/css" rel="stylesheet">
<link href="http://localhost/hdtg/hdtg/Admin/View/Public/css/index.css" type="text/css" rel="stylesheet">
<link href="http://localhost/hdtg/hdtg/Admin/View/Public/css/reset.css" type="text/css" rel="stylesheet">
<script type='text/javascript'>
HOST = 'http://localhost';
ROOT = 'http://localhost/hdtg';
WEB = 'http://localhost/hdtg/index.php';
URL = 'http://localhost/hdtg/index.php/Admin/Index/index';
APP = 'http://localhost/hdtg/hdtg';
COMMON = 'http://localhost/hdtg/hdtg/Common';
HDPHP = 'http://localhost/hdtg/hdphp/hdphp';
HDPHP_DATA = 'http://localhost/hdtg/hdphp/hdphp/Data';
HDPHP_EXTEND = 'http://localhost/hdtg/hdphp/hdphp/Extend';
MODULE = 'http://localhost/hdtg/index.php/Admin';
CONTROLLER = 'http://localhost/hdtg/index.php/Admin/Index';
ACTION = 'http://localhost/hdtg/index.php/Admin/Index/index';
STATIC = 'http://localhost/hdtg/Static';
HDPHP_TPL = 'http://localhost/hdtg/hdphp/hdphp/Lib/Tpl';
VIEW = 'http://localhost/hdtg/hdtg/Admin/View';
PUBLIC = 'http://localhost/hdtg/hdtg/Admin/View/Public';
CONTROLLER_VIEW = 'http://localhost/hdtg/hdtg/Admin/View/Index';
</script>
	<script type="text/javascript" src="http://localhost/hdtg/Static/Jquery/jquery-1.8.2.min.js"></script>
<script	type="text/javascript" src="http://localhost/hdtg/hdtg/Admin/View/Public/js/index.js"></script>


<base target="showContent" />
<title>后盾团购</title>

</head>
<body style="overflow:hidden;" scroll="no">

<div id="header">
	<div class='hd-box'>
		<div class='hd-top'>
			<div class="logo">
				<a href="http://localhost/hdtg/hdtg"><img src="http://localhost/hdtg/hdtg/Admin/VIEW/Public/images/logo.png"/></a>
			</div>
			<div class='logout'>
				<a style='color:#FFF;' href="">站点主页</a>
				<a href="">退出登录</a>
			</div>
		</div>
		<div class='bar'>
			<div class='home'>
				<a href="http://localhost/hdtg/hdtg"></a>
			</div>
			<div class="nav">
				<a href="<?php echo U('Admin/User/index');?>">会员管理</a>
				<a href="<?php echo U('Admin/Locality/index');?>">地区管理</a>
				<a href="<?php echo U('Admin/Category/index');?>">分类管理</a>
				<a href="<?php echo U('Admin/Shop/index');?>">商铺管理</a>
				<a href="<?php echo U('Admin/Goods/index');?>">商品管理</a>
				<a  href="<?php echo U('Admin/Order/index');?>">订单管理</a>
				<a class='active' href="javascript:void(0);">站点概要</a>
			</div>
		</div>
	</div>
</div>
<div id="box">
	<div id="sidebar">
		<!-- 会员管理 -->
		<div class='menuItem'>
			<div class='menu'>
				<a class='title' href="javascript:void(0);">会员管理</a>
				<ul class='menuList' >
					<li><a href=""></a></li>
					<li><a href=""></a></li>
				</ul>
			</div>
		</div>
		<!-- 地区管理 -->
		<div class='menuItem'>
			<div class='menu'>
				<a class='title' href="javascript:void(0);">地区管理</a>
				<ul class='menuList' >
					<li><a href="<?php echo U('Locality/add');?>">添加地区</a></li>
					<li><a href="<?php echo U('Locality/index');?>">显示地区</a></li>
				</ul>
			</div>
		</div>
		<!-- 分类管理 -->
		<div class='menuItem'>
			<div class='menu'>
				<a class='title' href="javascript:void(0);">分类管理</a>
				<ul class='menuList' >
					<li><a href="<?php echo U('Admin/Category/add');?>">添加分类</a></li>
					<li><a href="<?php echo U('Admin/Category/index');?>">分类列表</a></li>
				</ul>
			</div>
		</div>
		<!-- 商铺管理 -->
		<div class='menuItem'>
			<div class='menu'>
				<a class='title' href="javascript:void(0);">商铺管理</a>
				<ul class='menuList' >
					<li><a href="<?php echo U('Admin/Shop/add');?>">添加商铺</a></li>
					<li><a href="<?php echo U('Admin/Shop/index');?>">商铺列表</a></li>
				</ul>
			</div>	
		</div>	
		<!-- 商品管理 -->
		<div class='menuItem'>
			<div class='menu'>
				<a class='title' href="javascript:void(0);">商品管理</a>
				<ul class='menuList' >
					<li><a href="<?php echo U('Admin/Goods/index');?>">商品列表</a></li>
					<li><a href=""></a></li>
				</ul>
			</div>	
		</div>
		<!-- 订单管理 -->
		<div class='menuItem'>
			<div class='menu'>
				<a class='title' href="javascript:void(0);">订单管理</a>
				<ul class='menuList' >
					<li><a href="<?php echo U('Admin/Order/index');?>">全部订单</a></li>
					<li><a href="<?php echo U('Admin/Order/index',array('status'=>'已付款'));?>">已付款</a></li>
					<li><a href="<?php echo U('Admin/Order/index',array('status'=>'未付款'));?>">未付款</a></li>
				</ul>
			</div>
		</div>
		<!-- 站点概要 -->
		<div class='menuItem' style="display:block;">
			<div class='menu'>	
				<a class='title' href="javascript:void(0);">站点概要</a>
				<ul class='menuList' >
					<li><a href=""></a></li>
					<li><a href=""></a></li>
				</ul>
			</div>
		</div>
	</div>
	<div id="content">
		 <iframe id="iContent" name='showContent' scrolling="auto" height="100%" width="100%" frameborder="0" src="http://localhost/hdtg/hdtg/Admin/View/Index/welcome.html" >
     		  
	 	</iframe>
	</div>
</div>
</body>
</html>