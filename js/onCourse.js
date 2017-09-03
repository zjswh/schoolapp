$(function(){
	$('#deleteAll').click(function(){
		var checkboxs = $('#table .checkbox');
		var ids = new Array();
		for(var i=0;i<checkboxs.length;i++){
			if(checkboxs[i].checked == true){
				ids.push($('#table .tr').eq(i).find('.id').val());
			}
		}
		var r = confirm('你真的要删除这些用户吗？');
		if(r == true){
			if(ids.length == 0){
				alert('删除失败！未勾选任意一条记录。');
				exit();
			}
			$.ajax({
			url:'../admin/onlineCourse.php',
			type:'get',
			dataType:'json',
			data:{
				action:'deletes',
				id:ids
			},
			success:function(response,status,xhr){
				if(response.success == 1){
					alert('删除成功！');
					location.href="../admin/onlineCourse.php?action=show";
				}
			}
		});
		}
	});
	$('.delete').click(function(){
		return confirm('你真的要删除这个用户吗？') ? true : false;
	});
	$('#add').click(function(){
		var url = "../templates/course-form.html";
		var name = "add";
		var width = "400";
		var height = "400";
		var left = (screen.width - width) / 2;
		var top = (screen.height - height) / 2 - 50;
		window.open(url, name, 'width='+width+',height='+height+',top='+top+',left='+left);
	});
});
