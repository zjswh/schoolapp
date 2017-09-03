<?php
    require substr(dirname(__FILE__),0,-6).'/init.inc.php';
    global $_tpl;
    $_user = new UserAction($_tpl);
    $_user->action();
    $_tpl->display('user.tpl');
?>
