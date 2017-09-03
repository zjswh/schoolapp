<?php
    require "init.inc.php";
    global $_tpl;
    $_user = new UserAction($_tpl);
    $_user->action();
    $_tpl->display('index.tpl');
?>