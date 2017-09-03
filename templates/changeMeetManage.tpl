<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		<title>Bootstrap 101 Template</title>
		<link href="../css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="../css/appointment.css">
	</head>
	<body>
	
		<div class="work">
			<div class="panel-body">
			
				<form method="post" action="?action=update">
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
							<td><input type="text" class="btn btn-default"  value=""/></td>
							<td><input type="text" class="btn btn-default" style="width:300px;" value="自行入住"/></td>
							<td><input type="text" class="btn btn-default" style="width:250px;"  value="提前两天完成"/></td>
							<td></td>
						</tr>
						<tr class="active">
							<td>餐饮</td>
							<td><input type="text" class="btn btn-default" /></td>
							<td><input type="text" class="btn btn-default" style="width:300px;" value="自己解决"/> </td>
							<td><input type="text" class="btn btn-default" style="width:250px;" value="提前一天完成"/> </td>
							<td></td>
						</tr>
						<tr class="active">
							<td>教室</td>
							<td><input type="text" class="btn btn-default" /></td>
							<td><input type="text" class="btn btn-default" style="width:300px;" value="确定教室使用时间"/> </td>
							<td><input type="text" class="btn btn-default" style="width:250px;"  value=""/></td>
							<td></td>
						</tr>
						<tr class="active">
							<td rowspan="3" >培训安排</td>
						</tr>
						<tr class="active">
							<td>上课教师</td>
							<td><input type="text" class="btn btn-default" /></td>
							<td><input type="text" style="width:300px;" class="btn btn-default" /></td>
							<td><input type="text" class="btn btn-default" style="width:250px;" value="8:00am~11:00am"/> </td>
							<td></td>
						</tr>
						<tr class="active">
							<td>突发事件</td>
							<td><input type="text" class="btn btn-default" value="课程协调"/></td>
							<td><input type="text"  style="width:300px;"class="btn btn-default" value="处理突发事件，把控课程进度"/> </td>
							<td><input type="text" class="btn btn-default" style="width:250px;"  value=""/></td>
							<td></td>
						</tr>
					</tbody>
				</table>
				<input type="submit" class="btn btn-default" style="float:right;" value="完成">
				</form>
			</div>
		</div>
		</div> <script src="../js/jquery.js"></script>
		<script src="../js/bootstrap.min.js"></script>
	</body>
</html>