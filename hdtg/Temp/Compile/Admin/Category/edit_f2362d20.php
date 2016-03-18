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
<script type="text/javascript" src="http://localhost/hdtg/hdtg/Admin/View/Public/js/category.js"></script>
<div id="map">
	<span class='title'>添加分类</span>
</div>
<div id="content">
	<form id="categoryForm" action="<?php echo U('Admin/Category/edit');?>/cid/<?php echo $category['cid'];?>" method="post">
	<table class='table table-striped table-bordered'>
		<thead>
			<tr>
				<th width="20%">名称</th>
				<th>值</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>所属分类</td>
				<td>
					<select name="pid">
						<option value="<?php echo $parent['cid'];?>"><?php echo $parent['cname'];?></option>
						<option value="0">顶级分类</option>
						<?php foreach ($level as $k=>$v){?>
							<option value="<?php echo $v['cid'];?>">|<?php echo $v['_html'];?><?php echo $v['cname'];?></option>
						<?php }?>
					</select>
					
					
				</td>
			</tr>
			<tr>
				<td>分类名称</td>
				<td>
					<input type="text" name="cname" value="<?php echo $category['cname'];?>" />
				</td>
			</tr>
			<tr>
				<td>分类标题</td>
				<td>
					<textarea name="title"><?php echo $category['title'];?></textarea>
				</td>
			</tr>
			<tr>
				<td>分类关键字</td>
				<td>
					<textarea name="keywords"><?php echo $category['keywords'];?></textarea>
				</td>
			</tr>
			<tr>
				<td>分类描述</td>
				<td>
					<textarea name="description"><?php echo $category['description'];?></textarea>
				</td>
			</tr>
			<tr>
				<td>分类排序</td>
				<td>
					<input name="sort" type="text" value="<?php echo $category['sort'];?>" />
				</td>
			</tr>
			<tr>
				<td>是否显示</td>
				<td>
					    <?php if($category['display']){ ?>
						<lable>
						<input type="radio" name="display" checked=true value="1"/>	
						<span>显示</span>
						</lable>
						<lable>
						<input type="radio" name="display" value="0"/>	
						<span>隐藏</span>
						</lable>
						<?php }else{ ?>
						<lable>
						<input type="radio" name="display"  value="1"/>	
						<span>显示</span>
						</lable>
						<lable>
						<input type="radio" name="display" checked=true value="0"/>	
						<span>隐藏</span>
						</lable>
					<?php } ?>
					
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