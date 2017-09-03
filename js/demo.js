$(function(){
//    window.print();
    $("#send").click(function(){
        $.ajax({
            url: 'user.phone.php',
            type: 'post',
            data: {
                    action:'search', 
                    // nickname: $("#nickname").val(),
                    // imgurl: $("#imgurl").val(),
                    // token: $("#token").val(),
                    // academy: $("#academy").val(),
                    // truename: $("#truename").val(),
                    // phone: $("#phone").val(),
                    // email: $("#email").val()
                    word: $("#nickname").val()
                  },
            success: function(response,statu){
                alert(response); 
            }
        });
        
    });
    
    $('#btn').click(function(){
    	
    	
        $.ajax({
                type : "get",
                url : "mobile/collectbbs.php",
                dataType : "json",
                data:{
                	id :1,
                	action:'show',
                	token:'e10adc3949ba59abbe56e057f20f883e'
                },
                success : function(response,status,xhr){
                    alert(response);
                    // alert(json[0].id);
                    // $.each(json,function(index,value){
                    //     alert(value.name);
                    // });
                    // alert(typeof(xhr.responseText));
                    // alert(JSON.stringify(xhr.responseJSON));
                },
                error:function(){
                    alert('fail');
                }
        });
    });
    
    $("#showone").click(function(){
        $.ajax({
            url: 'user.php',
            type: 'post',
            data: {type: 'showone',id:'5'},
            success: function(response,statu,xhr){
                alert(response);
            }
        });
    });
    $("#showall").click(function(){
        $.ajax({
            url: 'user.php',
            type: 'post',
            data: {type: 'showall'},
            success: function(response,statu,xhr){
                alert(response);
            }
        });
    })
    
    
})