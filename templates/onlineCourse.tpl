<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>线上课程</title>
		<!-- Bootstrap -->
		<link href="../css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
		<link rel="icon" type="image/png" href="../css/i/favicon.png">
		<link rel="apple-touch-icon-precomposed" href="../css/i/app-icon72x72@2x.png">
		<meta name="apple-mobile-web-app-title" content="Amaze UI" />
		<link rel="stylesheet" href="../css/amazeui.min.css"/>
		<link rel="stylesheet" href="../css/admin.css"/>
		<link rel="stylesheet" type="text/css" href="../css/online-course.css">
		<script src="../js/jquery.js"></script>
		<script src="../js/bootstrap.min.js"></script>
		<script src="../js/onCourse.js"></script>
	</head>
	<body>
		<div class="admin-biaogelist">
			<div class="listbiaoti am-cf">
				<ul class="am-icon-users">
					线上课程
				</ul>
				<dl class="am-icon-home" style="float: right;">
					当前位置： 首页 > <a href="onlineCourse.php?action=show">{$title}</a>
				</dl>
			</div>
		</div>
		<div class="online-course">
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="course-style">
						<div class="form-group">
							<label>课程类别</label>
							<select class="form-control">
								<option>基础</option>
								<option>案例</option>
								<option>工具</option>
							</select>
						</div>
					</div>
					<table class="table table-bordered table-hover table-condensed" id="table">
						<thead>
							<tr>
								<th>选择</th>
								<th>课程编号</th>
								<th>课程名称</th>
								<th>播放总时长</th>
								<th>资源上线时间</th>
								<th>学习人数统计</th>
								<th>操作</th>
							</tr>
						</thead>
						<tbody>
							{if $show}
							{if $AllOnCourse}
							{foreach $AllOnCourse(key,value)}
							<tr class="active tr">
								<td>
								<input type="checkbox" value="" class="checkbox">
								<input type="hidden" value="{@value->id}" class="id">
								</td>
								<td><script>document.write({@key+1}+{$num});</script></td>
								<td><a href="video.php?action=show&id={@value->id}" title="{@value->completename}">{@value->name}</a></td>
								<td>{@value->totaltime}</td>
								<td>{@value->pubdate}</td>
								<td>{@value->studyNum}</td>
								<td><a href="onlineCourse.php?action=delete&id={@value->id}" onClick="return confirm('您真的要删除这门课程吗？') ? true:false;">删除</a></td>
							</tr>
							{/foreach}
							{else}
							<tr class="active">
								<td colspan="8"]> 暂无任何数据 </td>
							</tr>
							{/if}
							{/if}
						</tbody>
					</table>
					<div class="page">
						<ul class="pagination pagination-sm">
							<input  type="button" class="btn btn-default" id="deleteAll" value="删除" >
							{$page}
						</ul>
					</div>
				</div>
			</div>
		</div>
		
	</body>
</html>