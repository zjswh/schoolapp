<?php
    require substr(dirname(__FILE__),0,-6).'/init.inc.php';
    global $_tpl;
    $_upload = new videoAction($_tpl);
    $_upload->action();
    $_tpl->display('upload.tpl');
?>
