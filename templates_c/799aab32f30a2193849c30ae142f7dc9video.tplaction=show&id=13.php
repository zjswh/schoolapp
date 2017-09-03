<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title></title>
		<script src="../js/Chart.js"></script>
		<link href="../css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
		
		<link rel="icon" type="image/png" href="../css/i/favicon.png">
		<link rel="apple-touch-icon-precomposed" href="../css/i/app-icon72x72@2x.png">
		<meta name="apple-mobile-web-app-title" content="Amaze UI" />
		<link rel="stylesheet" href="../css/amazeui.min.css"/>
		<link rel="stylesheet" href="../css/admin.css"/>
		<link rel="stylesheet" type="text/css" href="../css/video-content.css">
		<script src="../js/jquery.js"></script>
		<script src="../js/bootstrap.min.js"></script>
		<script src="../js/video.js"></script>
	</head>
	<body>
		<div class="admin-biaogelist">
			<div class="listbiaoti am-cf">
				<ul class="am-icon-users">
					视频管理
				</ul>
				<dl class="am-icon-home" style="float: right;">
					当前位置： 首页 > <a href="video.php?action=show"><?php echo $this->_vars['title'];?></a>
				</dl>
			</div>
		</div>
		<div id="video-course">
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="course-style">
						<div class="form-group">
							<label>课程类别</label>
							<select class="form-control" id="select">
								<?php if(@$this->_vars['list']) {?>
									<?php echo $this->_vars['list'];?>
								<?php } ?>
							</select>
						</div>
						
					</div>
					<div class="video">
						<div class="panel-body">
							<table class="table table-bordered table-hover table-condensed" id="table">
								<thead>
									<tr>
										<th>章节名</th>
										<th>选择</th>
										<th>小节名</th>
										<th>播放时间</th>
									</tr>
								</thead>
								<tbody>
								<?php if(@$this->_vars['ChildCourse']) {?>
								<?php foreach ($this->_vars['ChildCourse'] as $key=>$value) { ?>
									<tr class="active tr" >
										<td rowspan="<?php echo $value->count?>" style="vertical-align:middle;"><?php echo $value->name?></td>
									
									<?php if ($value->videolist) {?>
									<?php foreach ($value->videolist as $key=>$value) { ?>
										<td>
										<input type="checkbox" value="" class="checkbox">
										<input type="hidden" value="<?php echo $value->id?>" class="id">
										</td>
										<td><?php echo $value->name?></td>
										<td><?php echo $value->time?></td>
									</tr>
									<tr class="active tr">
									<?php } ?>
									<?php } else { ?>
										<td><input type="checkbox" value=""></td>
										<td>暂无</td>
										<td>暂无</td>
									</tr>
									<?php } ?>
									</tr>
									<?php } ?>
								<?php } else { ?>
								<tr class="active">
									<td colspan="4"]> 暂无任何数据 </td>
								</tr>
								<?php } ?>
								</tbody>
							</table>
							<div class="page">
								<ul class="pagination pagination-sm">
									
									<input  type="button" class="btn btn-default" id="deleteAll" value="删除" >
									<?php echo $this->_vars['page'];?>
								</ul>
							</div>
						</div>
					</div>
					
				</div>
			</div>
		</div>
		
	</body>
</html>