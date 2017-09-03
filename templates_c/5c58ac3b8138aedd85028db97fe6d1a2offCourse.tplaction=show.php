<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>课程添加</title>
		<link href="../css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="../css/jquery.datetimepicker.css"/>
		<link rel="stylesheet" type="text/css" href="../css/user-form.css">
		<link rel="icon" type="image/png" href="../css/i/favicon.png">
		<link rel="apple-touch-icon-precomposed" href="../css/i/app-icon72x72@2x.png">
		<meta name="apple-mobile-web-app-title" content="Amaze UI" />
		<link rel="stylesheet" href="../css/amazeui.min.css"/>
		<link rel="stylesheet" href="../css/admin.css"/>
		<script src="../js/jquery.js"></script>
		<script src="../js/bootstrap.min.js"></script>
		<script src="../js/jquery.datetimepicker.full.js"></script>
		<script type="text/javascript" src="../js/addoffCourse.js"></script>
	</head>
	<body>
		<div class="admin-biaogelist">
			<div class="listbiaoti am-cf">
				<ul class="am-icon-users">
					线上课程
				</ul>
				<dl class="am-icon-home" style="float: right;">
					当前位置： 首页 > 
						<a href="offCourse.php?action=show"><?php echo $this->_vars['title'];?></a>
					
				</dl>
			</div>
		</div>
		<div class="form">
		<?php if(@$this->_vars['add']) {?>
			<form role="form" action="../admin/offCourse.php?action=add" method="post">
				<div class="form-group">
					<label>课程名称</label>
					<input type="name" class="form-control" name="name" placeholder="请输入您的课程名称">
				</div>
				<div class="form-group">
					<label>授课时间</label>
					<input type="name" class="form-control" name="tranning_date"  placeholder="请输入授课时间" id=datetimepicker_format>
				</div>
				<div class="form-group">
					<label>授课地点</label>
					<input type="name" class="form-control"  name="address"  placeholder="请输入授课地点">
				</div>
				<div class="form-group">
					<label>主办方</label>
					<input type="name" class="form-control"  name="sponsor"  placeholder="请输入主办方">
				</div>
				<div class="form-group">
					<label>承办方</label>
					<input type="name" class="form-control"  name="organizer"  placeholder="请输入承办方">
				</div>
				<input  type="submit" value="保存"  class="submit" name="send">
			</form>
		<?php } ?>
		<?php if(@$this->_vars['update']) {?>
			<form role="form" action="../admin/offCourse.php?action=add" method="post">
			<input type="hidden" value="<?php echo $this->_vars['id'];?>" name="id">
				<div class="form-group">
					<label>课程名称</label>
					<input type="name" value="<?php echo $this->_vars['name'];?>" class="form-control" name="name" placeholder="请输入您的课程名称">
				</div>
				<div class="form-group">
					<label>授课时间</label>
					<input type="name" value="<?php echo $this->_vars['tranning_date'];?>" class="form-control" name="tranning_date"  placeholder="请输入授课时间" id=datetimepicker_format>
				</div>
				<div class="form-group">
					<label>授课地点</label>
					<input type="name" value="<?php echo $this->_vars['address'];?>" class="form-control"  name="address"  placeholder="请输入授课地点">
				</div>
				<div class="form-group">
					<label>主办方</label>
					<input type="name" value="<?php echo $this->_vars['sponsor'];?>" class="form-control"  name="sponsor"  placeholder="请输入主办方">
				</div>
				<div class="form-group">
					<label>承办方</label>
					<input type="name" value="<?php echo $this->_vars['organizer'];?>" class="form-control"  name="organizer"  placeholder="请输入承办方">
				</div>
				<input  type="submit" value="保存"  class="submit" name="send">
			</form>
		<?php } ?>
		</div>
	</body>
</html>