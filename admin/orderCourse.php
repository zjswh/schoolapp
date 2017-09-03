<?php
    require substr(dirname(__FILE__),0,-6).'/init.inc.php';
    global $_tpl;
    $_order = new orderAction($_tpl);
    $_order->action();
    $_tpl->display('orderCourse.tpl');
?>
