<?php
    require substr(dirname(__FILE__),0,-6).'/init.inc.php';
    global $_tpl;
    $_ordercourse = new orderAction($_tpl);
    $_ordercourse->action();
    $_tpl->display('changeMeetManage.tpl');
?>
