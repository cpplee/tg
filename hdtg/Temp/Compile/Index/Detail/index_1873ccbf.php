<?php if(!defined('HDPHP_PATH'))exit;C('SHOW_NOTICE',FALSE);?>
	<?php if(!defined('HDPHP_PATH'))exit;C('SHOW_NOTICE',FALSE);?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link href="http://localhost:88/hdtg/Public/css/reset.css" type="text/css" rel="stylesheet" >
<link href="http://localhost:88/hdtg/Public/css/common.css" type="text/css" rel="stylesheet" >
	<script type='text/javascript'>
HOST = 'http://localhost:88';
ROOT = 'http://localhost:88/hdtg';
WEB = 'http://localhost:88/hdtg/index.php';
URL = 'http://localhost:88/hdtg/index.php/Index/Detail/index/gid/17';
APP = 'http://localhost:88/hdtg/hdtg';
COMMON = 'http://localhost:88/hdtg/hdtg/Common';
HDPHP = 'http://localhost:88/hdtg/hdphp/hdphp';
HDPHP_DATA = 'http://localhost:88/hdtg/hdphp/hdphp/Data';
HDPHP_EXTEND = 'http://localhost:88/hdtg/hdphp/hdphp/Extend';
MODULE = 'http://localhost:88/hdtg/index.php/Index';
CONTROLLER = 'http://localhost:88/hdtg/index.php/Index/Detail';
ACTION = 'http://localhost:88/hdtg/index.php/Index/Detail/index';
STATIC = 'http://localhost:88/hdtg/Static';
HDPHP_TPL = 'http://localhost:88/hdtg/hdphp/hdphp/Lib/Tpl';
VIEW = 'http://localhost:88/hdtg/hdtg/Index/View';
PUBLIC = 'http://localhost:88/hdtg/hdtg/Index/View/Public';
CONTROLLER_VIEW = 'http://localhost:88/hdtg/hdtg/Index/View/Detail';
HISTORY = 'http://localhost:88/hdtg/index.php/Index/Index/index/page/1';
</script>
	<script type="text/javascript" src="http://localhost:88/hdtg/Static/Jquery/jquery-1.8.2.min.js"></script>
<script type="text/javascript" src="http://localhost:88/hdtg/Public/js/common.js"></script>
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
				<a style="line-height:60px;" href="http://localhost:88/hdtg">后盾团购</a>
				<a style="font-size:16px;" href="http://localhost:88/hdtg">www.houdunwang.com</a>
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
				<a category=-1 class='active'  href="http://localhost:88/hdtg">首页</a>
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


<!-- 载入公共头部文件结束 -->
	<link href="http://localhost:88/hdtg/hdtg/Index/View/Public/css/detail.css" type="text/css" rel="stylesheet" >
	<div id="map" class='position'>
		<a href="北京团购"><?php echo $detail['lname'];?></a><span>»</span><a href="电影团购"><?php echo $detail['cname'];?></a><span>»</span><a href="<?php echo U('Index/Index/index',array('cid'=>$detail['cid']));?>"><?php echo $detail['shopname'];?></a>
	</div>
	<div id="content" class='position' style="height:3000px;">
		<div class='content-left'>
			<div class="goods-intro">
				<div class='goods-title'>
					<h1><?php echo $detail['main_title'];?></h1>
					<h3><?php echo $detail['sub_title'];?></h3>
				</div>
				<div class='deal-intro'>
					<div class='buy-intro'>
						<div class='price'>
							<div class='discount-price'>
								<span>¥</span><?php echo $detail['price'];?>
							</div>
							<div class='cost-price'>
								<span class='discount'><?php echo $detail['zhekou'];?>折</span>
								门店价<b>¥<?php echo $detail['old_price'];?></b>
							</div>
						</div>
						<div class='deal-buy-cart'>
							<a href="<?php echo U('Member/Buy/index',array('gid'=>$detail['gid']));?>" class='buy'></a>
							<a href="javascript:void(0);" url="<?php echo U('Member/Cart/add',array('gid'=>$detail['gid']));?>"  id="addCart"  class='cart'></a>
						</div>
						<div class='purchased'>
							<p class='people'>
								<span><?php echo $detail['buy'];?></span>人已团购
							</p>
							<p class='time'>
								剩余<span>3</span>天以上
							</p>
						</div>
						<ul class='refund-intro'>
							<?php foreach ($detail['server'] as $k=>$v){?>
							<li>
								<?php echo $v['img'];?>
								<span class='text'><?php echo $v['name'];?></span>
							</li>
							<?php }?>
						</ul>
					</div>
					<div class='image-intro'>
						<img src="<?php echo $detail['goods_img'];?>"/>
					</div>
				</div>
				<div class='collect'>
					<a class='collect-link' url="<?php echo U('Member/Index/addCollect',array('gid'=>$detail['gid']));?>" id="addCollect" href='javascript:void(0);'><i></i>收藏本单</a>
					
					<div class='share'>
						
					</div>
					
				</div>
			</div>
			<div class='detail'>
				<ul class='plot-points'>
					<li class='active'><a href="#shop-site">商家位置</a></li>
					<li><a href="#details">本单详情</a></li>
					<li><a href="#comment">消费评价</a></li>
				</ul>
				<div id="shop-site" class='shop-site'>
					<p class='site-title'>商家位置</p>
					<div class='box'>
						<div id="bMap" class='map'>
							
						</div>
						<div class='info'>
							<h3><?php echo $detail['shopname'];?></h3>
							<dl>
								<dt>地址:</dt>
								<dd><?php echo $detail['shopaddress'];?></dd>
							</dl>
							<dl>
								<dt>地铁:</dt>
								<dd><?php echo $detail['metroaddress'];?></dd>
							</dl>
							<dl>
								<dt>电话:</dt>
								<dd><?php echo $detail['shoptel'];?></dd>
							</dl>
						</div>
					</div>
				</div>
				<div id="details"  class='details'>
					<img src="http://localhost:88/hdtg/Public/images/goods.png">

				</div>
				<div id="comment" class='comment'>
					<div class='comment-list-title'>
						<span>全部评价</span>
						<a class='order-time' href="">按时间<i></i></a>
					</div>
					<div class='comment-list'>
						<div class='list-con'>
							<div class='con-top'>
								<span class='username'>sdas</span>
								<span class='time'>评价于:<em>2013-08-04</em></span>
							</div>
							<p>
								说是香草拿铁不是很苦，结果根本不是想象中的味道！像速溶冲调！还要另加五元？有此一说吗？银座店环境一般！
							</p>
						</div>
						
					</div>
					<div class='comment-page'>
						<a href="">1</a>
						<a href="">1</a>
						<a href="">1</a>
						<a href="">1</a>
						<a href="">1</a>
						<a href="">1</a>
					</div>
				</div>
			</div>
		
		</div>
		<div class='content-right'>
			<div class='recommend'>
				<h3 class='recommend-title'>
					看过本团购的用户还看了
				</h3>
				<?php foreach ($related as $k=>$v){?>
					<div class='recommend-goods'>
						<a class='goods-image' href="<?php echo U('Index/Detail/index');?>/gid/<?php echo $v['gid'];?>">
							<img alt="图像加载失败.." src="<?php echo $v['goods_img'];?>">
						</a>
						<h4>
							<a href="<?php echo U('Index/Detail/index');?>/gid/<?php echo $v['gid'];?>"><?php echo $v['main_title'];?></a>
						</h4>
						<p>
							<strong>¥<?php echo $v['price'];?></strong>
							<span class='cost-price'>门店价<del><?php echo $v['old_price'];?></del></span>
						<span class='num'>
							<span><?php echo $v['buy'];?></span>
							 人已团购
						</span>
						</p>
					</div>
				<?php }?>
				</div>
			</div>
	</div>
	<div class="c"></div>
	<div id="cover"></div>
	<div id="infoWindow">

	</div>
	<script src="http://localhost:88/hdtg/hdtg/Index/View/Public/js/detail.js"> </script>
	<script>
		var cartSucc = "<div class='colse'><a href='javascript:hideInfoWindow();'></a></div>\
			<ul class='status'>\
			<li class='ico'></li>\
			<li class='msg'>\
				<h3>添加成功!</h3>\
				<p>购物车内共有<span id='totalCategory'></span>种商品</p>\
				<p>购物车内共有<span id='total'></span>个商品</p>\
			</li>\
		</ul>\
		<div class='goBtn'>\
			<a href='javascript:hideInfoWindow();'>继续浏览</a>\
			<a href='<?php echo U('Member/Cart/index');?>'>查看购物车</a>\
		</div>";
		var collectSucc = "<div class='colse'><a href='javascript:hideInfoWindow();'></a></div>\
			<ul class='status'>\
			<li class='ico'></li>\
			<li class='msg'>\
				<h3>收藏成功!</h3>\
			</li>\
		</ul>\
		<div class='goBtn'>\
			<a href='javascript:hideInfoWindow();'>继续浏览</a>\
			<a href='<?php echo U('Member/Index/collect');?>'>查看我的收藏</a>\
		</div>";
		var userIsLogin = false;
		    <?php if($userIsLogin){ ?>
		userIsLogin = true;
		<?php } ?>
	</script>
	<script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=AC37be9efe7459c38f04c34a964155a2"></script>

<script>
      var shopcoord =<?php echo $detail['shopcoord'];?>;

  var  map = new BMap.Map('bMap');
	var point = new BMap.Point(shopcoord.lng,shopcoord.lat);
	map.centerAndZoom(point,15);
	map.enableScrollWheelZoom();

	  map.addControl(new BMap.NavigationControl());  //添加默认缩放平移控件
	  map.addControl(new BMap.NavigationControl({anchor: BMAP_ANCHOR_TOP_RIGHT, type: BMAP_NAVIGATION_CONTROL_SMALL}));  //右上角，仅包含平移和缩放按钮
	  map.addControl(new BMap.NavigationControl({anchor: BMAP_ANCHOR_BOTTOM_LEFT, type: BMAP_NAVIGATION_CONTROL_PAN}));  //左下角，仅包含平移按钮
	  map.addControl(new BMap.NavigationControl({anchor: BMAP_ANCHOR_BOTTOM_RIGHT, type: BMAP_NAVIGATION_CONTROL_ZOOM}));  //右下角，仅包含缩放按钮
     var marker1 = new BMap.Marker(new BMap.Point(shopcoord.lng,shopcoord.lat));

      map.addOverlay(marker1);
</script>



<!-- 载入公共头部文件开始 --> 
	<?php if(!defined('HDPHP_PATH'))exit;C('SHOW_NOTICE',FALSE);?>

	<div id="footer">
		<p>本demo不用于任何商业目的，仅供学习与交流</p>
	</div>
	</body>
</html>
<!-- 载入公共头部文件结束 -->