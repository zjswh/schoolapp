<?php
    //验证类
    class Validate{

        //是否为空
        static public function checkNull($_date){
            if(trim($_date) == '') return true;
            return false;
        }
        //
        static function checkToken($token){
            $_model = new Model();
            $string = '';
            $_sql = "SELECT * FROM user WHERE token='$token'";
            if(!!$_object = $_model->all($_sql)){
                $string = 1;
            }else{
                $string= 0;
            }
            return $string;
        }
        static function getMessage($token){
            $_model = new Model();
            $_sql = "SELECT * FROM user WHERE token='$token'";
            return $_model->one($_sql);
        }
        
        //验证登录并且获取用户名
        static function getUser(&$_array){
            $_token = $_GET['token'];
            $_array['state'] = Validate::checkToken($_token);
            if(!$_array['state']){
                echo json_encode($_array);
                exit();
            }
            $_one = Validate::getMessage($_token);
            return  $_one->nickname;
        }
        
        static function checkObject($_obj){
            if(!!$_object = $_obj){
                return $_object;
            }else{
                return [];
            }
        }
        //长度是否合法
        static public function checkLength($_date,$_length,$_flag){
            if($_flag == 'min'){
                if(mb_strlen(trim($_date),'utf-8')<$_length) return true;
            }elseif($_flag == 'max'){
                if(mb_strlen(trim($_date),'utf-8')>$_length) return true;
            }elseif($_flag == 'equals'){
                if(mb_strlen(trim($_date),'utf-8') != $_length) return true;
            }else{
                Tool::alertBack('ERROR,参数传递错误！');
            }
            return false;
        }

        //数据是否一致
        static public function checkEquals($_date,$_otherdate){
            if(trim($_date) != trim($_otherdate)) return true;
            return false;
        }
        //验证电子邮件
        static public function checkEmail($_data) {
            if (!preg_match('/^[\w\-\.]+@[\w\-\.]+(\.\w+)+$/',$_data)) return true;
            return false;
        }
        //session验证
        static public function checkSession() {
            
            if (!isset($_SESSION['admin'])) Tool::alertLocation('请先登录！','admin_login.php');
        }
    }
?>
