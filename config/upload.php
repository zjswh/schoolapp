<?php
require substr(dirname(__FILE__),0,-7).'/init.inc.php';
if(isset($_POST['send'])){
    $_fileupload = new FileUpload('pic',$_POST['MAX_FILE_SIZE']);
    $_file = $_fileupload->getLinkPath();
    $_img = new Image($_file);
    $_img->thumb(150,150);
    $_img->out(); 
    Tool::alertLocation('图片上传成功！','../index.php?action=show');
    echo 'as';
}
?> 