$(function(){
	$('#select').change(function(){
			window.location.href="../admin/video.php?action=show&id="+$('#select option').eq(this.selectedIndex).val();
	});
	$('#deleteAll').click(function(){
		var checkboxs = $('#table .checkbox');
		var ids = new Array();
		for(var i=0;i<checkboxs.length;i++){
			if(checkboxs[i].checked == true){
				var j = i+1;
				if($('#table .tr').eq(i).find('.id').val() == null){
					ids.push($('#table .tr').eq(j).find('.id').val());
				}else{
					ids.push($('#table .tr').eq(i).find('.id').val());
				}
			}
		}
		var r = confirm('你真的要删除这些视频吗？');
		if(r == true){
			if(ids.length == 0){
				alert('删除失败！未勾选任意一条记录。');
				exit();
			}
			$.ajax({
				url:'../admin/video.php',
				type:'get',
				dataType:'json',
				data:{
					action:'deletes',
					id:ids
				},
				success:function(response,status,xhr){
					if(response.success == 1){
						alert('删除成功！');
						location.href=response.url;
					}
				}
			});
		}
	});
	
	$('#add').click(function(){
		var url = "../admin/uploadfile.php?action=add";
		var name = "upload";
		var width = "600";
		var height = "500";
		var left = (screen.width - width) / 2;
		var top = (screen.height - height) / 2 - 50;
		window.open(url, name, 'width='+width+',height='+height+',top='+top+',left='+left);
	});
})