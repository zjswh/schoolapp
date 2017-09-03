<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
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
		<link rel="stylesheet" type="text/css" href="../css/update_mess.css">
		<script src="../js/jquery.js"></script>
		<script src="../js/bootstrap.min.js"></script>
 </head>
  
  <body>
        <div class="admin-biaogelist">
          <div class="listbiaoti am-cf">
            <ul class="am-icon-users">
              视频管理
            </ul>
            <dl class="am-icon-home" style="float: right;">
              当前位置： 首页 > <a href="uploadfile.php?action=add"><?php echo $this->_vars['title'];?></a>
            </dl>
          </div>
        </div>
       <div  id="register">
           <form action="../config/videoupload.php" method="post" enctype="multipart/form-data" >
               <input type="hidden" name="MAX_FILE_SIZE" value="9999999999" />
               <dl>
                   <dd>添加到课程：
                   <select name="type" id="select">
                   	<?php echo $this->_vars['nav'];?>
                   </select>
                   </dd>
	   			   <dd>视频的名称：<input type="text" name="name" class="text"></dd>
                   <dd>视频的简介：<textarea name="text" cols="34" rows="8" style="border:1px dashed #333;resize: none;" ></textarea></dd>
                   <dd>上传的视频：<input type="file" value="浏览" name="video" class="files" /></dd>
                   <dd><input type="submit" value="上传" class="submit" name="send"></dd>
               </dl>
           </form>
      </div>
     
  </body>
</html>
