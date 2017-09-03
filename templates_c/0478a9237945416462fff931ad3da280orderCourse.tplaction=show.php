<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		<title>Bootstrap 101 Template</title>
		<!-- Bootstrap -->
		<link href="../css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
		<link rel="icon" type="image/png" href="../css/i/favicon.png">
		<link rel="apple-touch-icon-precomposed" href="../css/i/app-icon72x72@2x.png">
		<meta name="apple-mobile-web-app-title" content="Amaze UI" />
		<link rel="stylesheet" href="../css/amazeui.min.css"/>
		<link rel="stylesheet" href="../css/admin.css"/>
		<link rel="stylesheet" type="text/css" href="../css/appointment.css">
	</head>
	<body>
		<div class="admin-biaogelist">
			<div class="listbiaoti am-cf">
				<ul class="am-icon-users">
					预约管理
				</ul>
				<dl class="am-icon-home" style="float: right;">
					当前位置： 首页 > <a href="orderCourse.php?action=show"><?php echo $this->_vars['title'];?></a>
				</dl>
			</div>
		</div>
		<div class="appointment" style="margin-top:35px">
			<div class="panel-body">
				<div class="outline-user">
					<div class="btn-group">
						<button class="btn btn-default dropdown-toggle" data-toggle="dropdown" type="button">
							课程类别<span class="caret"></span>
						</button>
						<ul class="dropdown-menu">
							<li>
								<a href="##">基础</a>
							</li>
							<li>
								<a href="##">案例</a>
							</li>
							<li>
								<a href="##">工具</a>
							</li>
						</ul>
					</div>
					<table class="table table-bordered table-hover table-condensed">
						<thead>
							<tr>
								<th>选择</th>
								<th>课程编号</th>
								<th>课程名称</th>
								<th>报名进度</th>
								<th>课程时长</th>
								<th>操作</th>
							</tr>
						</thead>
						<tbody>
						<?php if(@$this->_vars['AllCourse']) {?>
						<?php foreach ($this->_vars['AllCourse'] as $key=>$value) { ?>
							<tr class="active">
								<td>
								<input type="checkbox" value="">
								</td>
								<td><script>document.write(<?php echo $key+1?>+<?php echo $this->_vars['num'];?>);</script></td>
								<td><?php echo $value->name?></td>
								<td><?php echo $value->ordernum?>/<?php echo $value->number?></td>
								<td>01:00:00</td>
								<td>
									<a href="../admin/orderdetails.php?action=showone&id=<?php echo $value->id?>">详情</a>
								</td>
							</tr>
						<?php } ?>
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
		<script src="../js/jquery.js"></script>
		<script src="../js/bootstrap.min.js"></script>
	</body>
</html>