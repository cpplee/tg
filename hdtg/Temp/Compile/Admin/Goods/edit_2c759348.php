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
<script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=AC37be9efe7459c38f04c34a964155a2"></script>

<script type="text/javascript" src="http://localhost/hdtg/Static/Uploadify/jquery.uploadify.min.js"></script>
<link href="http://localhost/hdtg/Static/Uploadify/uploadify.css" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="http://localhost/hdtg/Static/JqueryUi/js/jquery-ui-1.10.3.custom.min.js"></script>
<link href="http://localhost/hdtg/Static/JqueryUi/css/flick/jquery-ui-1.10.3.custom.min.css" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="http://localhost/hdtg/hdtg/Admin/View/Public/js/goods.js"></script>
<div id="map">
	<span class='title'>编辑商品</span>
</div>
<div id="content">
	<form id="goodsForm" action="<?php echo U('Admin/Goods/edit');?>/gid/<?php echo $goods['gid'];?>" method="post">
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
					<input type="hidden" name="shopid" value="<?php echo $goods['shopid'];?>"/>
					<?php echo $goods['shopname'];?>
				</td>
			</tr>
			<tr>
				<td>分类名称</td>
				<td>
					
					<select name="cid" >
						<option value="<?php echo $goods['cid'];?>"><?php echo $goods['cname'];?></option>
						<?php foreach ($category as $k=>$v){?>
							<option value="<?php echo $v['cid'];?>"><?php echo $v['_html'];?><?php echo $v['cname'];?></option>
						<?php }?>
					</select>
				</td>
			</tr>
			<tr>
				<td>所在地区</td>
				<td>
					<select name="lid" >
						<option value="<?php echo $goods['lid'];?>"><?php echo $goods['lname'];?></option>
						<?php foreach ($locality as $k=>$v){?>
							<option value="<?php echo $v['lid'];?>"><?php echo $v['html'];?><?php echo $v['lname'];?></option>	
						<?php }?>
					</select>
				</td>
			</tr>
			<tr>
				<td>商品主标题</td>
				<td>
					<input type="text" name="main_title" value="<?php echo $goods['main_title'];?>" />
				</td>
			</tr>
			<tr>
				<td>商品副标题</td>
				<td>
					<textarea name="sub_title"><?php echo $goods['sub_title'];?></textarea>
				</td>
			</tr>
			<tr>
				<td>现价</td>
				<td>
					<input type="text" name="price" value="<?php echo $goods['price'];?>"/>
				</td>
			</tr>
			<tr>
				<td>原价</td>
				<td>
					<input type="text" name="old_price" value="<?php echo $goods['old_price'];?>"/>
				</td>
			</tr>
			<tr>
				<td>上架时间</td>
				<td>
					<input id="begin_time" type="text" name="begin_time" value="<?php echo date('Y-m-d',$goods['begin_time']);?>" />
				</td>
			</tr>
			<tr>
				<td>下架时间</td>
				<td>
					<input id="end_time" type="text" name="end_time" value="<?php echo date('Y-m-d',$goods['end_time']);?>" />
				</td>
			</tr>
			<tr>
				<td>商品展示图</td>

				<td>
					<input id="files" type="hidden" name="goods_img" >
					<div lab="uploadFile">
						<input id="file" type="file" multiple="true" >
						<span>类型: *.jpg,*.png 大小: 2000KB 数量: 10</span>

						<div id="uploadList">
							<ul>
							</ul>
						</div>
					</div>
				</td>
			</tr>
			<tr>
				<td>
					<img width="200" src="<?php echo $goods['goods_img'];?>"/>
					<input type="hidden" name="old_img" value="<?php echo $goods['goods_img'];?>"/>
				</td>
			</tr>
			<tr>
				<td>商品服务</td>
				<td>
					<?php foreach ($server as $k=>$v){?>
						<?php if(in_array($k,$goods['goods_server'])){?>
						<label>
							<input type="checkbox" checked="checked" name="goods_server[]" value="<?php echo $k;?>">
							<?php echo $v['name'];?>
						</label>
						<?php }else{?>
						<label>
							<input type="checkbox" name="goods_server[]" value="<?php echo $k;?>">
							<?php echo $v['name'];?>
						</label>
						<?php }?>
					<?php }?>
				</td>
			</tr>	
			<tr>
				<td>商品细节展示</td>
				<td>
					<!-- 加载编辑器的容器 -->
					<script id="container" name="detail" type="text/plain" style="width:700px;height:300px;"><?php echo $goods['detail'];?></script>


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

<!-- 配置文件 -->
<script type="text/javascript" src="http://localhost/hdtg/Static/Ueditor/ueditor.config.js"></script>
<!-- 编辑器源码文件 -->
<script type="text/javascript" src="http://localhost/hdtg/Static/Ueditor/ueditor.all.js"></script>
<!-- 实例化编辑器 -->
<script type="text/javascript">
	var ue = UE.getEditor('container');
</script>
<script type="text/javascript">
	$(function() {
		var tempArr =new Array();
		$('#file').uploadify({
			'formData'     : {//POST数据
				'<?php echo session_name();?>' : '<?php echo session_id();?>',
			},
			'fileTypeDesc' : '上传文件',//上传描述
			'fileTypeExts' : '<?php echo $set['filetype'];?>',
			'swf'      : 'http://localhost/hdtg/Static/uploadify/uploadify.swf',
			'uploader' : '<?php echo U("Goods/upload");?>',
			'buttonText':'选择文件',
			'fileSizeLimit' : '2000KB',
			'uploadLimit' : 1000,//上传文件数
			'width':65,
			'height':25,
			'successTimeout':10,//等待服务器响应时间
			'removeTimeout' : 0.2,//成功显示时间
			'onUploadSuccess' : function(file, data, response) {
				data=$.parseJSON(data);

//				$.each(data,function(i,val){
//
//					alert(" #Index:" + i + ":" + val);
//
//
//
//
//				});
				var imageUrl = data.image?data.url:'http://localhost/hdtg/Static/image/default.png';
				tempArr.push(imageUrl);
				$('#files').val(tempArr);
				var li="<li path='"+data.path+"' url='"+data.url+"'><img src='"+imageUrl+"' class='hd-w80 hd-h70'/></li>";
				$("#uploadList ul").prepend(li);
			}
		});
	});
</script>
</body>
</html>