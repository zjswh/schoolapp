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
					当前位置： 首页 > <a href="video.php?action=show">{$title}</a>
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
								{if $list}
									{$list}
								{/if}
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
								{if $ChildCourse}
								{foreach $ChildCourse(key,value)}
									<tr class="active tr" >
										<td rowspan="{@value->count}" style="vertical-align:middle;">{@value->name}</td>
									
									{iff @value->videolist}
									{for @value->videolist(key,value)}
										<td>
										<input type="checkbox" value="" class="checkbox">
										<input type="hidden" value="{@value->id}" class="id">
										</td>
										<td>{@value->name}</td>
										<td>{@value->time}</td>
									</tr>
									<tr class="active tr">
									{/for}
									{else}
										<td><input type="checkbox" value=""></td>
										<td>暂无</td>
										<td>暂无</td>
									</tr>
									{/iff}
									</tr>
									{/foreach}
								{else}
								<tr class="active">
									<td colspan="4"]> 暂无任何数据 </td>
								</tr>
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
			</div>
		</div>
		
	</body>
</html>