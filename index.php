<?php
    require "init.inc.php";
    global $_tpl;
    $_demo = new demoAction($_tpl);
    $_demo->action();
    $_tpl->display('demo.tpl');
    // $_time = '2013-03-24 08:16:42';
    // echo strtotime($_time); 时间转时间戳
?>
