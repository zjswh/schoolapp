<?php
    header('Content-Type:text/html;charset=utf-8');
    header('Access-Control-Allow-Methods: GET，PUT, DELETE');
    header("Access-Control-Allow-Origin: *");
    header('Access-Control-Allow-Headers: content-type,X-Requested-With,X_Requested_With'); 
    if(strtolower($_SERVER['REQUEST_METHOD']) == 'options'){
        exit();
    }
    //网站根目录
    define('ROOT_PATH',dirname(__FILE__));
    //时区设置
    date_default_timezone_set('Asia/Shanghai');
    require "config/profile.inc.php";
    //自动加载类
    function __autoload($_className){
        if(substr($_className,-6) == 'Action'){
            require ROOT_PATH.'/action/'.$_className.'.class.php';
        }elseif(substr($_className,-5) == 'Model'){
            require ROOT_PATH.'/model/'.$_className.'.class.php';
        }else{
            require ROOT_PATH.'/includes/'.$_className.'.class.php';
        }
    }
    @$_tpl = new Templates();
?>
