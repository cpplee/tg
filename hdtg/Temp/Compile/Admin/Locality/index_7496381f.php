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
	<span class='title'>地区列表</span>
</div>
<div id="content">
	<table id="table" class='table table-striped table-bordered'>
		<thead>
			<tr>
				<th width="5%"></th>
				<th width="25%">地区名称</th>
				<th width="10%">地区排序</th>
				<th width="10%">是否显示</th>
				<th >操作</th>
			</tr>
		</thead>
		<tbody>
		<?php foreach ($data as $k=>$v){?>
			<tr class="level_<?php echo $v['_level'];?> pid_<?php echo $v['pid'];?>" cid="<?php echo $v['lid'];?>" level="<?php echo $v['_level'];?>">
				<td><a class='btn btn-mini btn-info unfold' style="font-size:16px;" href="">+</a></td>
				<td>|-<?php echo $v['_html'];?><?php echo $v['lname'];?></td>
				<td><?php echo $v['sort'];?></td>
				<td>
					    <?php if($v['display']){ ?>
						显示
						<?php }else{ ?>
						隐藏
					<?php } ?>
				</td>
				<td>
					<a class='btn btn-small' href="<?php echo U('Admin/Locality/add');?>/lid/<?php echo $v['lid'];?>">添加子类</a>
					<a class='btn btn-small' href="<?php echo U('Admin/Locality/edit');?>/lid/<?php echo $v['lid'];?>">编辑</a>
					<a class='btn btn-small' href="<?php echo U('Admin/Locality/del');?>/lid/<?php echo $v['lid'];?>">删除</a>
				</td>
			</tr>
		<?php }?>	
		</tbody>
	</table>
</div>
</body>
</html>