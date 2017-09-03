<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		<title></title>
		<link href="../css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="../css/forum.css">
		<link rel="icon" type="image/png" href="../css/i/favicon.png">
		<link rel="apple-touch-icon-precomposed" href="../css/i/app-icon72x72@2x.png">
		<meta name="apple-mobile-web-app-title" content="Amaze UI" />
		<link rel="stylesheet" href="../css/amazeui.min.css"/>
		<link rel="stylesheet" href="../css/admin.css"/>
	
	</head>
	<body>
		<div class="admin-biaogelist">
			<div class="listbiaoti am-cf">
				<ul class="am-icon-users">
					动态资讯
				</ul>
				<dl class="am-icon-home" style="float: right;">
					当前位置： 首页 > <a href="user.php?action=show"><?php echo $this->_vars['title'];?></a>
				</dl>
			</div>
		</div>
		<div class="forum-list">
			<div class="panel panel-default">
				<div class="panel-body">
					<h3>动态资讯</h3>
					
					<table class="table table-bordered table-hover table-condensed">
						<thead>
							<tr>
								<th>选择</th>
								<th>编号</th>
								<th>资讯标题</th>
								<th>发表时间</th>
								<th>操作</th>
							</tr>
						</thead>
						<tbody>
						 <?php if(@$this->_vars['AllNewlist']) {?>
							<?php foreach ($this->_vars['AllNewlist'] as $key=>$value) { ?> 
							<tr class="active">
								<td>
								<input type="checkbox" value="">
								</td>
								<td><script>document.write(<?php echo $key+1?>+<?php echo $this->_vars['num'];?>);</script></td>
								<td><a href="bbs.php?action=show&id=<?php echo $value->id?>"><?php echo $value->title?></a></td>
								<td><?php echo $value->date?></td>
								<td>
								<a href="bbs.php?action=delete&id=<?php echo $value->id?>" onClick="return confirm('您真的要删除这门课程吗？') ? true:false;">修改</a>|
								<a href="bbs.php?action=delete&id=<?php echo $value->id?>" onClick="return confirm('您真的要删除这门课程吗？') ? true:false;">删除</a>
								
								</td>
							</tr>
							 <?php } ?>
						<?php } else { ?>
							<tr class="active">
								<td colspan="5"]>
									暂无任何数据
								</td>
							</tr>
						<?php } ?> 
							
						</tbody>
					</table>
					<div class="page" style="width:47%;">
						<ul class="pagination pagination-sm">
						<input  type="button" class="btn btn-default" id="deleteAll"  value="批量删除" >
						<?php echo $this->_vars['page'];?>
						</ul>
					</div>
				</div>
			</div>
			<div class="forum-two">
			
			<div class="panel panel-default">
			<h3 style="margin:10px 0 0 15px;">资讯详情</h3>	
				<div class="panel-body">
				<?php if(@$this->_vars['showone']) {?>
					<?php foreach ($this->_vars['showone'] as $key=>$value) { ?>
					<div class="concrete-forum">
						<p>
							【<?php echo $value->title?>】
							<?php echo $value->content?> <br />
							<?php if(@$this->_vars['imglist']) {?>
								<?php echo $this->_vars['imglist'];?>
							<?php } ?>
						</p>
					</div>
					<?php } ?>
				<?php } ?>
				</div>
			</div>
		</div>
		</div>
		
		<script src="../js/jquery.js"></script>
		<script src="../js/bootstrap.min.js"></script>
	</body>
</html>