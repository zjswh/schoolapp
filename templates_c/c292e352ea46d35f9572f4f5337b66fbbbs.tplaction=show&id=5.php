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
	
	</head>
	<body>
		<div class="forum-list">
			<div class="panel panel-default">
				<div class="panel-body">
					<h3>论坛统计</h3>
					<div class="btn-group">
						<button class="btn btn-default dropdown-toggle" data-toggle="dropdown" type="button">
							主题类别<span class="caret"></span>
						</button>
						<ul class="dropdown-menu">
							<li>
								<a href="##">推荐</a>
							</li>
							<li>
								<a href="##">问答</a>
							</li>
							<li>
								<a href="##">生活</a>
							</li>
						</ul>
					</div>
					<table class="table table-bordered table-hover table-condensed">
						<thead>
							<tr>
								<th>选择</th>
								<th>编号</th>
								<th>帖子标题</th>
								<th>发表人</th>
								<th>评论数</th>
								<th>发表时间</th>
								<th>操作</th>
							</tr>
						</thead>
						<tbody>
						<?php if(@$this->_vars['AllBbs']) {?>
							<?php foreach ($this->_vars['AllBbs'] as $key=>$value) { ?>
							<tr class="active">
								<td>
								<input type="checkbox" value="">
								</td>
								<td><script>document.write(<?php echo $key+1?>+<?php echo $this->_vars['num'];?>);</script></td>
								<td><a href="bbs.php?action=show&id=<?php echo $value->id?>"><?php echo $value->title?></a></td>
								<td><?php echo $value->username?></td>
								<td><?php echo $value->readcount?></td>
								<td><?php echo $value->date?></td>
								<td>
									<button class="btn btn-default">
										<a href="bbs.php?action=delete&id=<?php echo $value->id?>" onClick="return confirm('您真的要删除这门课程吗？') ? true:false;">删除</a>
									</button>
								</td>
							</tr>
							<?php } ?>
						<?php } else { ?>
							<tr class="active">
								<td colspan="6"]>
									暂无任何数据
								</td>
							</tr>
						<?php } ?>
						</tbody>
					</table>
					<div class="page" style="width:27%;">
						<ul class="pagination pagination-sm">
						<?php echo $this->_vars['page'];?>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="forum-two">
			<h3 style="margin-left:3%;">帖子详情</h3>	
			<div class="panel panel-default">
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
					<div class="comment">
						<ul>
						<?php if(@$this->_vars['AllComment']) {?>
							<?php foreach ($this->_vars['AllComment'] as $key=>$value) { ?>
							<li>
								<img src="<?php echo $value->img?>" width="50px" height="50px">
								<p>
									<?php echo $value->username?>
								</p>
								<br />
								<p>
									<?php echo $value->content?>
								</p>
								<button class="btn btn-default" style="float:right;">
									<a href="bbs.php?action=deletecomment&id=<?php echo $value->id?>" onClick="return confirm('您真的要删除这门课程吗？') ? true:false;">删除</a>
								</button>
							</li>
							<?php } ?>
						<?php } else { ?>
							<li>
								暂无评论
							</li>
						<?php } ?>
						</ul>
					</div>
					<?php } ?>
				<?php } ?>
				</div>
			</div>
		</div>
		<script src="../js/jquery.js"></script>
		<script src="../js/bootstrap.min.js"></script>
	</body>
</html>