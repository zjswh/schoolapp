<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title></title>
		<!-- Bootstrap -->
		<link href="../css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="../css/course-content.css">
		<script src="../js/jquery.js"></script>
		<script src="../js/bootstrap.min.js"></script>
		<script src="../js/offCourse.js"></script>
		
	</head>
	<body>
		<div id="course-content">
			<div id="manage">
				<div class="panel panel-default">
					<div class="panel-body">
						<h3><?php echo $this->_vars['title'];?></h3>
						<div>
							<form role="search" method="GET" action="offlineCourse.php">
								<div class="form-group">
									<input type="hidden" name="action" value="search">
									<input type="text" name="word" class="form-control" placeholder="请输入课程名称">
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
									<th>课程编号</th>
									<th>课程名称</th>
									<th>授课时间</th>
									<th>完成情况</th>
								</tr>
							</thead>
							<tbody>
							<?php if(@$this->_vars['show']) {?>
								<?php if(@$this->_vars['AllOffChildCourse']) {?>
								<?php foreach ($this->_vars['AllOffChildCourse'] as $key=>$value) { ?>
								<tr class="active tr">
									<td>
									<input type="checkbox" value="" class="checkbox">
									<input type="hidden" value="<?php echo $value->id?>" class="id" >
									</td>
									<td><script>document.write(<?php echo $key+1?>+<?php echo $this->_vars['num'];?>);</script></td>
									<td><?php echo $value->name?></td>
									<td><?php echo $value->tranning_date?></td>
									<td><?php echo $value->isFinish?></td>
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
								<input  type="button" class="btn btn-default" id='deleteAll' value="删除" >
								<?php echo $this->_vars['page'];?>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		
	</body>
</html>