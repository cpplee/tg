<?php if(!defined('HDPHP_PATH'))exit;C('SHOW_NOTICE',FALSE);?>
<!-- 商品过滤开始 -->
	<div id="filter">
		<div class='hots'>
			<span>热门团购：</span>
			<div class='box'>
				<?php foreach ($hotsGroup as $k=>$v){?>
					<a href="<?php echo U('Index/Index/index');?>/cid/<?php echo $v['cid'];?>"><?php echo $v['cname'];?></a>
				<?php }?>
			</div>
		</div>
		
		<div class='filter-box'>
			<div class='category filter-label'>
				<div class='filter-label-level-1'>
					<span><b></b>分类：</span>
					<div class='box'>
						<?php foreach ($topCategory as $k=>$v){?>
							<?php echo $v;?>
						<?php }?>
					</div>
				</div>


				    <?php if($sonCategory){ ?>
				<div class='filter-label-level-2'>
                       <div class="box">
					<?php foreach ($sonCategory as $k=>$v){?>
						<?php echo $v;?>
					<?php }?>
					   </div>
				</div>
			</div>
			<?php } ?>
			<div class='locality filter-label'>
				<div class='filter-label-level-1'>
					<span><b></b>区域：</span>
					<div class='box'>
						<?php foreach ($topLocality as $k=>$v){?>
							<?php echo $v;?>
						<?php }?>
					</div>
				</div>
				<div class='filter-label-level-2'>
					<div class="box">
					<?php foreach ($sonLocality as $k=>$v){?>
						<?php echo $v;?>
					<?php }?>
					</div>
				</div>
			</div>



			    <?php if($price){ ?>
			<div class='price filter-label'>
				<div class='filter-label-level-1'>
					<span><b></b>价格：</span>
					<div class='box'>
						<?php foreach ($price as $k=>$v){?>
							<?php echo $v;?>							
						<?php }?>
					</div>
				</div>
			</div>	
			<?php } ?>
			<div class='screen'>
				<div>
					<a class='active' href="<?php echo $orderUrl['d'];?>">默认排序</a>
					<a href="<?php echo $orderUrl['b'];?>">销量<b></b></a>
					<a href="<?php echo $orderUrl['p_d'];?>">价格<b></b></a>
					<a  href="<?php echo $orderUrl['p_a'];?>">价格<b style="background-position:-45px -16px;"></b></a>
					<a style="border:0;" href="<?php echo $orderUrl['t'];?>">发布时间<b></b></a>
				</div>
			</div>
		</div>	
	</div>
	<!-- 商品过滤结束 -->