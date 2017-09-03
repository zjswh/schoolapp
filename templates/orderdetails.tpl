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
		<script src="../js/jquery.js"></script>
		<script src="../js/bootstrap.min.js"></script>
		<script src="../js/orderdetails.js"></script>
	</head>
	<body>
		<div class="admin-biaogelist">
			<div class="listbiaoti am-cf">
				<ul class="am-icon-users">
					预约管理
				</ul>
				<dl class="am-icon-home" style="float: right;">
					当前位置： 首页 > <a href="orderdetails.php?action=show">详情查看</a>
				</dl>
			</div>
		</div>
		<div class="appointment" style="margin-top:35px;">
			<div class="panel-body" id="table">
				<h3 >报名情况表</h3>
				<table class="table table-bordered table-hover table-condensed" >
					<thead>
						<tr>
							<th>选择</th>
							<th>序号</th>
							<th>真实姓名</th>
							<th>所在院校(单位)</th>
							<th>Tel</th>
							<th>e-mail</th>
							<th>拥有wex5证书</th>
							<th>操作</th>
						</tr>
					</thead>
					<tbody>
						{if $AllUser}
						{foreach $AllUser(key,value)}
						<tr class="active">
							<td>
							<input type="checkbox" value="">
							</td>
							<td>
							<script>
																document.write({@key+1}+{$num});
							</script></td>
							<td>{@value->nickname}</td>
							<td>{@value->academy}</td>
							<td>{@value->phone}</td>
							<td>{@value->email}</td>
							<td>
							<div class="form-group">
								<label class="radio-inline">
									<input type="radio"  value="{@value->nickname}" name="{@value->nickname}">
									是 </label>
								<label class="radio-inline">
									<input type="radio"  value="{@value->nickname}" name="{@value->nickname}" checked="checked">
									否 </label>
							</td>
							<td><a href="?action=delete&id={@value->id}" onClick="return confirm('您真的要删除这位报名者吗？') ? true:false;">删除</a></td>
						</tr>
						{/foreach}
						{else}
						<tr class="active">
							<td colspan="8"]> 暂无任何数据 </td>
						</tr>
						{/if}
					</tbody>
				</table>
				<div class="page" style="width:30%">
					<ul class="pagination pagination-sm">
						<button class="btn btn-default" style="float:left;height:30px;margin-right:5px;line-height:10px;">
							<a href="../config/excel.php?id={$id}">下载</a>
						</button>
						{$page}
					</ul>
				</div>
			</div>
			<div class="work">
			<h3 style="margin-left:15px;">会务安排</h3>
			<div class="panel-body">
				{if $show}
				{if $meetManage}
				{foreach $meetManage(key,value)}
				<table class="table table-bordered table-hover table-condensed">
					<thead>
						<tr>
							<th>阶段</th>
							<th>事项</th>
							<th>模块</th>
							<th>内容</th>
							<th>时间</th>
							<th>备注</th>
						</tr>
					</thead>
					<tbody>
						<tr class="active">
							<td rowspan="4">前期准备</td>
						</tr>
						<tr class="active">
							<td>住宿</td>
							<td>{@value->place}</td>
							<td>自行入住</td>
							<td>提前两天完成</td>
							<td></td>
						</tr>
						<tr class="active">
							<td>餐饮</td>
							<td>{@value->food}</td>
							<td>自己解决</td>
							<td>提前一天完成</td>
							<td></td>
						</tr>
						<tr class="active">
							<td>教室</td>
							<td>{@value->classroom}</td>
							<td>确定教室使用时间</td>
							<td></td>
							<td></td>
						</tr>
						<tr class="active">
							<td rowspan="3" >培训安排</td>
						</tr>
						<tr class="active">
							<td>上课教师</td>
							<td>{@value->teacher}</td>
							<td>{@value->info}</td>
							<td>8:00am~11:00am </td>
							<td></td>
						</tr>
						<tr class="active">
							<td>突发事件</td>
							<td>课程协调</td>
							<td>处理突发事件，把控课程进度 </td>
							<td></td>
							<td></td>
						</tr>
					</tbody>
				</table>
				{/foreach}
				{else}
				<table class="table table-bordered table-hover table-condensed">
					<thead>
						<tr>
							<th>阶段</th>
							<th>事项</th>
							<th>模块</th>
							<th>内容</th>
							<th>时间</th>
							<th>备注</th>
						</tr>
					</thead>
					<tbody>
						<tr class="active">
							<td rowspan="4">前期准备</td>
						</tr>
						<tr class="active">
							<td>住宿</td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr class="active">
							<td>餐饮</td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr class="active">
							<td>教室</td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr class="active">
							<td rowspan="3" >培训安排</td>
						</tr>
						<tr class="active">
							<td>上课教师</td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr class="active">
							<td>突发事件</td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
					</tbody>
				</table>
				{/if}
				<button class="btn btn-default" style="float:right;">
					<a href="changeMeetManage.php" target="_blank">修改</a>
				</button>
				{/if}
			</div>
		</div>
		</div>
		
	</body>
</html>