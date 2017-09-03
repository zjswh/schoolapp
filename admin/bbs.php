<?php
    require substr(dirname(__FILE__),0,-6).'/init.inc.php';
    global $_tpl;
    $_bbs = new bbsAction($_tpl);
    $_bbs->action();
    $_tpl->display('bbs.tpl');
?>
