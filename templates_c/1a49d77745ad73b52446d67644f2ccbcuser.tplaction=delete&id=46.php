<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Bootstrap 101 Template</title>
		<link href="../css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="../css/user-content.css">
		<script src="../js/jquery.js"></script>
		<script src="../js/bootstrap.min.js"></script>
		<script src="../js/user.js"></script>
	</head>
	<body>
		<div id="user-content">
			<div class="panel panel-default">
				<div class="panel-body">
					<h3>用户信息</h3>
					<div>
						<form role="search" method="GET" action="user.php">
							<div class="form-group">
								<input type="hidden" name=action value="search">
								<input type="text" name="word" class="form-control" placeholder="请输入用户名">
								<button type="submit" class="btn btn-default">
									查询
								</button>
							</div>
						</form>
					</div>
					<table class="table table-bordered table-hover table-condensed" id="table">
						<thead>
							<tr>
								<th>选择</th>
								<th>序号</th>
								<th>头像</th>
								<th>用户名</th>
								<th>真实姓名</th>
								<th>Tel</th>
								<th>e-mail</th>
								<th>操作</th>
							</tr>
						</thead>
						<tbody>
						<?php if(@$this->_vars['show']) {?>
						<?php if(@$this->_vars['AllUser']) {?>
							<?php foreach ($this->_vars['AllUser'] as $key=>$value) { ?>
							<tr class="active tr">
								<td>
								<input type="checkbox" value="" class="checkbox">
								<input type="hidden" value="<?php echo $value->id?>" class="id">
								</td>
								<td><script>document.write(<?php echo $key+1?>+<?php echo $this->_vars['num'];?>);</script></td>
								<td><img src="<?php echo $value->imgurl?>" width="25" height="25"></td>
								<td><?php echo $value->nickname?></td>
								<td><?php echo $value->truename?></td>
								<td><?php echo $value->phone?></td>
								<td><?php echo $value->email?></td>
								<td>
								<a href="user.php?action=delete&id=<?php echo $value->id?>" class='delete'>刪除</a>
								<!-- <input type="button" class="btn btn-default" value="刪除" onclick="openwin()"> -->
								</td>
							</tr>
							<?php } ?>
						<?php } else { ?>
						<tr class="active">
							<td colspan="8"]>
								暂无任何数据
							</td>
						</tr>
						<?php } ?>
						<?php } ?>
						<?php if(@$this->_vars['search']) {?>
							<?php if(@$this->_vars['result']) {?>
							<?php foreach ($this->_vars['result'] as $key=>$value) { ?>
							<tr class="active tr">
								<td>
								<input type="checkbox" value="" id="checkbox">
								</td>
								<td><script>document.write(<?php echo $key+1?>+<?php echo $this->_vars['num'];?>);</script></td>
								<td><img src="../img/headimg.jpg" width="25" height="25"></td>
								<td><?php echo $value->nickname?></td>
								<td><?php echo $value->truename?></td>
								<td><?php echo $value->phone?></td>
								<td><?php echo $value->email?></td>
								<td>
								<a href="user.php?action=delete&id=<?php echo $value->id?>">刪除</a>
								<!-- <input type="button" class="btn btn-default" value="刪除" onclick="openwin()"> -->
								</td>
							</tr>
							<?php } ?>
							<?php } else { ?>
							<tr class="active">
								<td colspan="8"]>
									暂无任何数据
								</td>
							</tr>
							<?php } ?>
						<?php } ?>
						</tbody>
					</table>
					<div class="page">
						<ul class="pagination pagination-sm">
							<input  type="button" class="btn btn-default" id="deleteAll"  value="批量删除" >
							<?php echo $this->_vars['page'];?>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>