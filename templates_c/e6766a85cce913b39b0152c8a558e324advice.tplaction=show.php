<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title></title>
		<link href="../css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
		<link rel="icon" type="image/png" href="../css/i/favicon.png">
		<link rel="apple-touch-icon-precomposed" href="../css/i/app-icon72x72@2x.png">
		<meta name="apple-mobile-web-app-title" content="Amaze UI" />
		<link rel="stylesheet" href="../css/amazeui.min.css"/>
		<link rel="stylesheet" href="../css/admin.css"/>
		<link rel="stylesheet" type="text/css" href="../css/advice.css">
	</head>
	<body>
		<div class="admin-biaogelist">
			<div class="listbiaoti am-cf">
				<ul class="am-icon-users">
					意见反馈
				</ul>
				<dl class="am-icon-home" style="float: right;">
					当前位置： 首页 > <a href="advice.php?action=show">意见查看</a>
				</dl>
			</div>
		</div>
		<div class="panel-body" style="margin-top:50px;">
			<div class="mytable">
				<table class="table table-bordered table-hover table-condensed">
					<thead>
						<tr>
							<th>用户名</th>
							<th>反馈内容</th>
							<th>反馈状况</th>
						</tr>
					</thead>
					<tbody>
						<tr class="active">
							<td> marry </td>
							<td>上了今天的课，我收获蛮大的，很棒</td>
							<td>已阅</td>
						</tr>
						<tr class="active">
							<td>joe</td>
							<td>希望下次可以开设一门vue.js相关的课程</td>
							<td>已阅</td>
						</tr>
						<tr class="active">
							<td>李四</td>
							<td>听说vue.js挺好用的，希望可以在这里学习到相关的课程</td>
							<td>未阅</td>
						</tr>
						<tr class="active">
							<td>二珂</td>
							<td>wex5这平台确实好用的说</td>
							<td>已阅</td>
						</tr>
						<tr class="active">
							<td>散散</td>
							<td>大家好像都在用wex5，我也要去学了</td>
							<td>未阅</td>
						</tr>
						<tr class="active">
							<td>nick</td>
							<td>希望课程一直可以这么棒</td>
							<td>已阅</td>
						</tr>
						<tr class="active">
							<td>小明</td>
							<td>这app还是挺好用的说</td>
							<td>未阅</td>
						</tr>
						<tr class="active">
							<td>nick</td>
							<td>看看有没有和我一样学习wex5的小伙伴</td>
							<td>已阅</td>
						</tr>
						<tr class="active">
							<td>花花</td>
							<td>大家好像都在用wex5，我也要去学了</td>
							<td>未阅</td>
						</tr>
						<tr class="active">
							<td>西西</td>
							<td>希望课程一直可以这么棒</td>
							<td>已阅</td>
						</tr>
					</tbody>
				</table>
			</div>
			<div class="page">
				<ul class="pagination pagination-sm">
					<input  type="button" class="btn btn-default" onClick="rec()" value="删除" >
					<li>
						<a href="#">上一页</a>
					</li>
					<li>
						<a href="#">1</a>
					</li>
					<li>
						<a href="#">2</a>
					</li>
					<li class="active">
						<a href="#">3</a>
					</li>
					<li>
						<a href="#">4</a>
					</li>
					<li>
						<a href="#">5</a>
					</li>
					<li>
						<a href="#">下一页</a>
					</li>
				</ul>
			</div>
		</div>
		<script src="../js/jquery.js"></script>
		<script src="../js/bootstrap.min.js"></script>
	</body>
</html>