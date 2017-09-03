<?php
    class demoAction extends Action{

        public function __construct(&$_tpl){
            parent::__construct($_tpl, new UserModel());
        }
        public function action(){
            switch(@$_GET['action']){
                case 'show':
                    $this->show();
                    break;
                case 'uploadPic':
                    $this->upload();
                    break;
                case 'uploadVideo':
                    $this->uploadVideo();
                    break;
            }
        }

        private function show(){
            $this->_tpl->assign('show',true);
            $_cookie = new Cookie('src');
            $this->_tpl->assign("src",$_cookie->getCookie());
        }
        
        private function uploadPic(){
            if(isset($_POST['send'])){
                $_fileupload = new FileUpload('file',$_POST['MAX_FILE_SIZE']);
                $_file = $_fileupload->getLinkPath();
                $_img = new Image($_file);
                $_img->thumb(150,150);
                $_img->out();
                $_cookie = new Cookie('src',$_file);
                $_cookie->setCookie();
                Tool::alertOpenerClose('图片上传成功！','index.php?action=show');
            }
        }
        private function uploadVideo(){
            if(isset($_POST['send'])){
                $_fileupload = new FileUpload('file',$_POST['MAX_FILE_SIZE']);
                if(!!$_file = $_fileupload->getLinkPath()){
                    // Tool::alertOpenerClose('视频上传成功！',$_file);
                    Tool::alertOpenerClose('视频上传成功！','index.php?action=show');
                }
                
            }
        }
    }
?>
