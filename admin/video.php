<?php
    require substr(dirname(__FILE__),0,-6).'/init.inc.php';
    global $_tpl;
    $_video = new videoAction($_tpl);
    $_video->action();
    $_tpl->display('video.tpl');
?>
