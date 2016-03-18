<?php if(!defined('HDPHP_PATH'))exit;C('SHOW_NOTICE',FALSE);?>
<?php if(!defined('HDPHP_PATH'))exit;C('SHOW_NOTICE',FALSE);?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title></title>
    <script type="text/javascript"  src="http://localhost/hdtg/Static/Jquery/jquery-1.8.2.min.js"></script>
    <link media="screen" rel="stylesheet" href="http://localhost/hdtg/Static/bootstrap/css/bootstrap.min.css"/>
    <script type="text/javascript"  src="http://localhost/hdtg/Static/bootstrap/js/bootstrap.min.js"></script>
    <link type="text/css" rel="stylesheet" href="http://localhost/hdtg/Static/HdUi/css/hdjs.css"/>
    <script type="text/javascript" src="http://localhost/hdtg/Static/HdUi/js/hdjs.min.js"></script>



    <link href="http://localhost/hdtg/hdtg/Admin/View/Public/css/common.css" rel="stylesheet" type="text/css"/>
    <script type="text/javascript" src="http://localhost/hdtg/hdtg/Admin/View/Public/js/common.js"></script>

</head>
<body>
<hdui/>
<script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=AC37be9efe7459c38f04c34a964155a2"></script>
<script type="text/javascript" src="http://localhost/hdtg/hdtg/Admin/View/Public/js/shop.js"></script>

<div id="map">
	<span class='title'>编辑商铺</span>
</div>
<div id="content">
	<form id="shopForm" action="<?php echo U('Admin/Shop/edit');?>/shopid/<?php echo $shop['shopid'];?>" method="post">
	<table class='table table-striped table-bordered'>
		<thead>
			<tr>
				<th width="20%">名称</th>
				<th>值</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>商铺名称</td>
				<td>
					<input type="text" name="shopname"  value="<?php echo $shop['shopname'];?>"/>
				</td>
			</tr>
			<tr>
				<td>商铺地址</td>
				<td>
					<input type="text" name="shopaddress"  value="<?php echo $shop['shopaddress'];?>"/>
				</td>
			</tr>
			<tr>
				<td>地铁地址</td>
				<td>
					<input type="text" name="metroaddress" value="<?php echo $shop['metroaddress'];?>"/>
				</td>
			</tr>
			<tr>
				<td>商铺电话</td>
				<td>
					<input type="text" name="shoptel" value="<?php echo $shop['shoptel'];?>"/>
				</td>
			</tr>
			<tr>
				<td>商铺坐标</td>
				<td>
					<input id="shopcoord" name="shopcoord" type="text" value='<?php echo $shop['shopcoord'];?>'/>
					<input id="getPoint" class='btn' type="button" value="获取坐标">
				</td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" class='btn' /></td>
			</tr>
		</tbody>
	</table>
	</form>
	
	
	
</div>
</body>
</html>