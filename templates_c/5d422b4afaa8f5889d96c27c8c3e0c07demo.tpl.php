<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
         <script type="text/javascript" src="js/jquery.js"></script>
         <script type="text/javascript" src="js/demo.js"></script>
    </head>
    <body>
    <?php if(@$this->_vars['show']) {?>
        <img src="<?php echo $this->_vars['src'];?>" alt="" />
        <br />
    <?php } ?>
    <input type="text" class="text" />	
    <input type="button" value="as" id="btn" />
    <form method="post" action="index.php?action=uploadVideo" enctype="multipart/form-data" style="text-align:center;margin:30px;">
        <input type="hidden" name="MAX_FILE_SIZE" value="99999999" />
        <input type="file" name="file"/>
        <input type="submit" name="send" value="确定上传" />
    </form>
    
    </body>
</html>