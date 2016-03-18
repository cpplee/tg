<?php if(!defined('HDPHP_PATH'))exit;C('SHOW_NOTICE',FALSE);?>
	<?php if(!defined('HDPHP_PATH'))exit;C('SHOW_NOTICE',FALSE);?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link href="http://localhost/hdtg/Public/css/reset.css" type="text/css" rel="stylesheet" >
<link href="http://localhost/hdtg/Public/css/common.css" type="text/css" rel="stylesheet" >
	<script type='text/javascript'>
HOST = 'http://localhost';
ROOT = 'http://localhost/hdtg';
WEB = 'http://localhost/hdtg/index.php';
URL = 'http://localhost/hdtg/index.php/Member/Reg/index';
APP = 'http://localhost/hdtg/hdtg';
COMMON = 'http://localhost/hdtg/hdtg/Common';
HDPHP = 'http://localhost/hdtg/hdphp/hdphp';
HDPHP_DATA = 'http://localhost/hdtg/hdphp/hdphp/Data';
HDPHP_EXTEND = 'http://localhost/hdtg/hdphp/hdphp/Extend';
MODULE = 'http://localhost/hdtg/index.php/Member';
CONTROLLER = 'http://localhost/hdtg/index.php/Member/Reg';
ACTION = 'http://localhost/hdtg/index.php/Member/Reg/index';
STATIC = 'http://localhost/hdtg/Static';
HDPHP_TPL = 'http://localhost/hdtg/hdphp/hdphp/Lib/Tpl';
VIEW = 'http://localhost/hdtg/hdtg/Member/View';
PUBLIC = 'http://localhost/hdtg/hdtg/Member/View/Public';
CONTROLLER_VIEW = 'http://localhost/hdtg/hdtg/Member/View/Reg';
HISTORY = 'http://localhost/hdtg/index.php/Member/Reg/addUserInfo';
</script>
	<script type="text/javascript" src="http://localhost/hdtg/Static/Jquery/jquery-1.8.2.min.js"></script>
<script type="text/javascript" src="http://localhost/hdtg/Public/js/common.js"></script>
<meta name="keywords" content="" />
<meta name="description" content="" />
<title><?php echo $webInfo['title'];?></title>

</head>
<body>
	<!-- 顶部开始 -->
	<div id="top">
		<div class='position'>
			<div class='left'>
				后盾网，人人做后盾!
			</div>
			<div class='right'>
				<a href="javascript:addFavorite2();">收藏</a>
			</div>
		</div>
	</div>
	<!-- 顶部结束 -->
	<!-- 头部开始 -->
	<div id="header">
		<div class='position'>
			<div class='logo'>
				<a style="line-height:60px;" href="http://localhost/hdtg">后盾团购</a>
				<a style="font-size:16px;" href="http://localhost/hdtg">www.houdunwang.com</a>
			</div>
			<div class='search'>
				<div class='item'>
					<a href="<?php echo U('Index/Index/index',array('keywords'=>'小时代'));?>">小时代</a>
					<a href="<?php echo U('Index/Index/index',array('keywords'=>'KTV'));?>">KTV</a>
					<a href="<?php echo U('Index/Index/index',array('keywords'=>'电影'));?>">电影</a>
					<a href="<?php echo U('Index/Index/index',array('keywords'=>'全聚德'));?>">全聚德</a>
				</div>
				<div class='search-bar'>
					<form action="<?php echo U('Index/Index/index');?>" method="get">
						<input class='s-text' type="text" name="keywords" value="请输入商品名称，地址等">
						<input class='s-submit' type="submit" value='搜索'>
					</form>
				</div>
				</div>
			<div class='commitment'>
				
			</div>
		</div>
	</div>
	<!-- 头部结束 -->
	<!-- 导航开始-->
	<div id="nav">
		<div class='position'>
			<!-- 分类相关 -->
			<div class='category'>
				<a class='active' href="http://localhost/hdtg">首页</a>
				<?php foreach ($nav as $k=>$v){?>
					<a  href="<?php echo U('Index/Index/index');?>/cid/<?php echo $v['cid'];?>"><?php echo $v['cname'];?></a>
				<?php }?>
			</div>
			<!-- 用户相关 -->
			<div id="user-relevance" class='user-relevance'>
				    <?php if($userIsLogin){ ?>


					<div class='user-nav login-reg'>
						<a class='title' href="<?php echo U('Member/Login/quit');?>">退出</a>
					</div>
					<!--我的团购 -->
					<div class='user-nav my-hdtg '>
						<a class='title' href="<?php echo U('Member/Order/index');?>">我的团购</a>
						<ul class="menu">
							<li><a href="<?php echo U('Member/Order/index');?>">我的订单</a></li>
							<li><a href="<?php echo U('Member/Index/collect');?>">我的收藏</a></li>
							<li><a href="<?php echo U('Member/Account/index');?>">账户余额</a></li>
							<li><a href="<?php echo U('Member/Account/setting');?>">账户设置</a></li>
						</ul>
					</div>

					<?php }else{ ?>

					<!--登录注册-->
					<div class='user-nav login-reg'>
						<a class='title' href="<?php echo U('Member/Reg/index');?>">注册</a>
					</div>
					<div class='user-nav login-reg'>
						<a class='title' href="<?php echo U('Member/Login/index');?>">登录</a>
					</div>

				<?php } ?>





				<!-- 最近浏览 -->	
					<div  class='user-nav recent-view' id="recent-view" url="<?php echo U('Member/Index/getRecentView');?>" goodUrl="<?php echo U('Index/Detail/index');?>" claerView="<?php echo U('Member/Index/clearRecentView');?>">
						<a class='title' href="">最近浏览</a>
						<ul class="menu">


						</ul>
					</div>



					<div  class='user-nav my-cart ' id="my-cart" url="<?php echo U('Member/Cart/index');?>" goodUrl="<?php echo U('Index/Detail/index');?>" delCartUrl="<?php echo U('Member/Cart/del');?>" >
						<a class='title' href="<?php echo U('Member/Cart/index');?>"><i>&nbsp;</i>购物车</a>
						<ul class="menu">

						</ul>
					</div>
			</div>
		</div>
	</div> 
	<!-- 导航结束 -->


	<!-- 载入公共头部文件-->
	<link href="http://localhost/hdtg/hdtg/Member/View/Public/css/reg.css" type="text/css" rel="stylesheet" >

	<script src="http://localhost/hdtg/hdtg/Member/View/Public/js/regCheck.js"></script>
	<script>

		function changeCode(){
//            var src1='<?php echo U('Member/Reg/showCode');?>';
//		alert(123);
//		    alert(src1);

		         var src = $('#showCode').attr('src');
			src = src+'/mt/'+Math.random();
			$('#showCode').attr('src',src);
		}


		var __JSCONTROL__='http://localhost/hdtg/index.php/Member/Reg';
		//alert(__JSCONTROL__);

	</script>
	<div id="regBox">
		<div class='header'>
			已有本站账号?<a href="">登录</a>
		</div>
		<div class='form'>
		<form action="<?php echo U('Member/Reg/addUserInfo');?>" method="post" id="regForm">
			<dl class='focus'>
				<dt>邮箱</dt>
				<dd class='text'><input class='must' type="text"  ajax=1 name="email" /></dd>
				<dd class='prompt'>用于登录和找回密码，不会公开</dd>
			</dl>
			<dl>
				<dt>用户名</dt>
				<dd class='text'><input class='must' type="text" ajax=1 name="username"  /></dd>
				<dd class='prompt'></dd>
			</dl>
			<dl>
				<dt>创建密码</dt>
				<dd class='text'><input class='must' id="password" type="password" name="password"/></dd>
				<dd class='prompt'></dd>
			</dl>
			<dl>
				<dt>确认密码</dt>
				<dd class='text'><input class='must' type="password" name="password_d"/></dd>
				<dd class='prompt'></dd>
			</dl>
			<dl>
				<dt>所在城市</dt>
				<dd class='area'>
					<select id="s_province" name="s_province"></select>
					<select id="s_city" name="s_city" ></select>
					<select id="s_county" name="s_county"></select>
					<script type="text/javascript" src="http://localhost/hdtg/classLibs/area/area.js"></script>
					<script type="text/javascript">_init_area();</script>
				</dd>
				<dd class='prompt'></dd>
			</dl>
			<dl>
				<dt>验证码</dt>
				<dd class='text code' style="width:200px;"><input ajax=1 class='must' type="text"  name="code"/>
					<img id="showCode" onclick="changeCode();" style="float:left;margin: 0px 10px; width:80px; height:28px;" src="<?php echo U('Member/Reg/showCode');?>"></dd>
				<dd class='prompt'></dd>
			</dl>
			<dl>
				<dt></dt>
				<dd class='submit'><input type="submit" value="注册"></dd>
			</dl>
		</form>
		</div>
	</div>
</body>
</html>