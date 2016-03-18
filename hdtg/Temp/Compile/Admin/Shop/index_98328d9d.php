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
<div id="map">
	<span class='title'>商铺列表</span>
</div>
<div id="content">
	<table id="table" class='table table-striped table-bordered'>
		<thead>
			<tr>
				<th width="15%">商铺名称</th>
				<th width="25%">商铺地址</th>
				<th width="25%">地铁地址</th>
				<th width="15%">商家电话</th>
				<th >操作</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($data as $k=>$v){?>
				<tr>
					<td><?php echo $v['shopname'];?></td>
					<td><?php echo $v['shopaddress'];?></td>
					<td><?php echo $v['metroaddress'];?></td>
					<td><?php echo $v['shoptel'];?></td>
					<td>
						<a class='btn btn-small' href="<?php echo U('Admin/Goods/add');?>/shopid/<?php echo $v['shopid'];?>">添加商品</a>
						<a class='btn btn-small' href="<?php echo U('Admin/Shop/edit');?>/shopid/<?php echo $v['shopid'];?>">编辑</a>
						<a class='btn btn-small delAffirm' href="<?php echo U('Admin/Shop/del');?>/shopid/<?php echo $v['shopid'];?>">删除</a>
					</td>
				</tr>
			<?php }?>
		</tbody>
	</table>
	
	<div id="page">
		<?php echo $page;?>		
	</div>
</div>
</body>
</html>