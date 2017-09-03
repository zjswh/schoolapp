<?php
    require substr(dirname(__FILE__),0,-6).'/init.inc.php';
    global $_tpl;
    session_start();
    if(!isset($_SESSION['username'])){
        Tool::alertLocation('请先登录','login.php');
    }

    $_tpl->display('admin.tpl');
?>
