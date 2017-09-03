<?php
    require substr(dirname(__FILE__),0,-6).'/init.inc.php';
    global $_tpl;
    $_newlist = new newlistAction($_tpl);
    $_newlist->action();
    $_tpl->display('newlist.tpl');
?>
