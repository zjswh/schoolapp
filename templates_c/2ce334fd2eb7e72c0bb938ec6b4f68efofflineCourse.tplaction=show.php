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
		
		<link rel="icon" type="image/png" href="../css/i/favicon.png">
		<link rel="apple-touch-icon-precomposed" href="../css/i/app-icon72x72@2x.png">
		<meta name="apple-mobile-web-app-title" content="Amaze UI" />
		<link rel="stylesheet" href="../css/amazeui.min.css"/>
		<link rel="stylesheet" href="../css/admin.css"/>
		<link rel="stylesheet" type="text/css" href="../css/course-content.css">
		<script src="../js/jquery.js"></script>
		<script src="../js/bootstrap.min.js"></script>
		<script src="../js/offCourse.js"></script>
	</head>
	<body>
		
		<div class="admin-biaogelist">
			<div class="listbiaoti am-cf">
				<ul class="am-icon-users">
					线下培训
				</ul>
				<dl class="am-icon-home" style="float: right;">
					当前位置： 首页 > <a href="offlineCourse.php?action=show"><?php echo $this->_vars['title'];?></a>
				</dl>
			</div>
		</div>
		<div id="course-content" style="margin-top:35px;">
			<div id="manage">
				<div class="panel panel-default">
					<div class="panel-body">
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
									<th>报名进度</th>
									<th>授课地址</th>
									<th>主办方</th>
									<th>承办方</th>
									<th>培训发布时间</th>
									<th>授课时间</th>
									<th>费用</th>
									<th>完成情况</th>
									<th>操作</th>	
								</tr>
							</thead>
							<tbody>
							<?php if(@$this->_vars['show']) {?>
								<?php if(@$this->_vars['AllOffCourse']) {?>
								<?php foreach ($this->_vars['AllOffCourse'] as $key=>$value) { ?>
								<tr class="active tr">
									<td>
									<input type="checkbox"  class="checkbox">
									<input type="hidden" value="<?php echo $value->id?>" class="id" >
									</td>
									<td><script>document.write(<?php echo $key+1?>+<?php echo $this->_vars['num'];?>);</script></td>
									<td><a href="../admin/offChildCourse.php?action=show&id=<?php echo $value->id?>&title=<?php echo $value->completename?>" title="<?php echo $value->completename?>"><?php echo $value->name?></a></td>
									<td><?php echo $value->ordernum?>/<?php echo $value->number?></td>
									<td><?php echo $value->address?></td>
									<td><?php echo $value->sponsor?></td>
									<td><?php echo $value->organizer?></td>
									<td><?php echo $value->pubdate?></td>
									<td><?php echo $value->tranning_date?></td>
									<td><?php echo $value->cost?></td>
									<td>
									<div class="progress">
										<div class="progress-bar progress-bar-info"  role="progressbar" aria-valuenow="<?php echo $value->pro?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $value->pro?>%">
											<?php echo $value->pro?>%
										</div>
									</div>
									</td>
									<td>
									<a href="../admin/offCourse.php?action=update&id=<?php echo $value->id?>">修改
									</a>|<a href="?action=delete&id=<?php echo $value->id?>" onClick="return confirm('您真的要删除这门课程吗？') ? true:false;">删除</a>
									</td>
								</tr>
								<?php } ?>
								<?php } else { ?>
								<tr class="active">
									<td colspan="9"]>
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
									<input type="checkbox" value="">
									</td>
									<td><script>document.write(<?php echo $key+1?>+<?php echo $this->_vars['num'];?>);</script></td>
									<td><a href="con-course.html"><?php echo $value->name?></a></td>
									<td><?php echo $value->ordernum?>/<?php echo $value->number?></td>
									
									<td><?php echo $value->address?></td>
									<td><?php echo $value->sponsor?></td>
									<td><?php echo $value->organizer?></td>
									<td><?php echo $value->pubdate?></td>
									<td><?php echo $value->tranning_date?></td>
									<td><?php echo $value->cost?></td>
									<td>
									<div class="progress">
										<div class="progress-bar progress-bar-info"  role="progressbar" aria-valuenow="<?php echo $value->pro?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $value->pro?>%">
											<?php echo $value->pro?>%
										</div>
									</div></td>
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