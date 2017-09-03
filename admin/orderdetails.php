<?php
    require substr(dirname(__FILE__),0,-6).'/init.inc.php';
    global $_tpl;
    $_orderdetails = new orderAction($_tpl);
    $_orderdetails->action();
    $_tpl->display('orderdetails.tpl');
?>
