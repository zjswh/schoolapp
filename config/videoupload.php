<?php
    require substr(dirname(__FILE__),0,-7).'/init.inc.php';
    if(isset($_POST['send'])){
        
        $_fileupload = new FileUpload('video',$_POST['MAX_FILE_SIZE']);
        if(!!$_file = $_fileupload->getLinkPath()){
            $_url = substr($_file, 11);
            $_model = new videoModel();
            $_model->sectionId = $_POST['type']; 
            $_model->name= $_POST['name'];
            $_model->videoUrl= $_url;
            if($_model->addVideo()){
                Tool::alertOpenerClose('视频上传成功！',null);
            }
       }
    
    }
?>