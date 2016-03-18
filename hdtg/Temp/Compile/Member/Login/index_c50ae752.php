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
URL = 'http://localhost/hdtg/index.php/Member/Login/index';
APP = 'http://localhost/hdtg/hdtg';
COMMON = 'http://localhost/hdtg/hdtg/Common';
HDPHP = 'http://localhost/hdtg/hdphp/hdphp';
HDPHP_DATA = 'http://localhost/hdtg/hdphp/hdphp/Data';
HDPHP_EXTEND = 'http://localhost/hdtg/hdphp/hdphp/Extend';
MODULE = 'http://localhost/hdtg/index.php/Member';
CONTROLLER = 'http://localhost/hdtg/index.php/Member/Login';
ACTION = 'http://localhost/hdtg/index.php/Member/Login/index';
STATIC = 'http://localhost/hdtg/Static';
HDPHP_TPL = 'http://localhost/hdtg/hdphp/hdphp/Lib/Tpl';
VIEW = 'http://localhost/hdtg/hdtg/Member/View';
PUBLIC = 'http://localhost/hdtg/hdtg/Member/View/Public';
CONTROLLER_VIEW = 'http://localhost/hdtg/hdtg/Member/View/Login';
HISTORY = 'http://localhost/hdtg/';
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
				<a category=-1 class='active'  href="http://localhost/hdtg">首页</a>
				<?php foreach ($nav as $k=>$v){?>
					<a category=<?php echo $k;?> href="<?php echo U('Index/Index/index');?>/cid/<?php echo $v['cid'];?>"><?php echo $v['cname'];?></a>
				<?php }?>
			</div>

			<script>
				/**
				 * 获取cookie
				 * @param name
				 * @returns
				 */
				function getCookie(name){
					var arr = document.cookie.split(';');
					for(var i=0;i<arr.length;i++){
						var	arr2 = arr[i].split('=');
						var preg = new RegExp('\\b'+name+'\\b','i')
						if(preg.test(arr2[0])){
							return	arr2[1];
						}
					}
				}
				$('.category a').click(function(){
					var category = $(this).attr('category');
					document.cookie = "category="+category+';path=/';
				})
				var category = getCookie('category');
				$('.category a').each(function(){
					if($(this).attr('category') == category){
						$(this).addClass('active');
					}else{
						$(this).removeClass('active');
					}
				})
			</script>

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
	<link href="http://localhost/hdtg/hdtg/Member/View/Public/css/login.css" type="text/css" rel="stylesheet" >
	<!-- 页面主体开始 -->
	<div id="login-box">
		<h3>会员登录</h3>
		<div class='left'>

			<form action="<?php echo U('Member/Login/login');?>" method="post">
			<div class='form'>
				<dl>
					<dt>账号:</dt>
					<dd class='text'>
						<input name="username" type="text"/>
					</dd>
				</dl>
				<dl>
					<dt>密码:</dt>
					<dd class='text'>
						<input name="password" type="password"/>
					</dd>
					<dd><a style="color:#11bbbb;" href="">忘记密码</a></dd>
				</dl>
				<dl>
					<dt></dt>
					<dd>
						<label>
							<input name="auto_login" type="checkbox"/> 记住账号
						</label>
						&nbsp;&nbsp;				
						<label>
							<input type="checkbox"/> 下次自动登录
						</label>
					</dd>
				</dl>
				<dl>
					<dt></dt>
					<dd class='submit'>
						<input type="submit" value="登录">
					</dd>
				</dl>
			</div>
			</form>
		</div>
		<div class='right'>
			<p class='right-title'>尚未注册？</p>
			<a class='reg-link' href="">免费注册</a>
			<p class='open-title'>用合作网站账号登录</p>
			<div class='open'>
				<a class='open-login-link sina' href=""><img src="http://study.houdunwang.com/hdlearn/config/img/weibo_login.png"></a>
				<a class='open-login-link qq' href=""><img src="http://study.houdunwang.com/hdlearn/config/img/qq_login.png"></a>
			</div>
		</div>
	</div>
</body>
</html>