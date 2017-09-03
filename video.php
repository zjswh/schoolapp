<?php
    require "init.inc.php";
    global $_tpl;
    $_video = new VideoAction($_tpl);
    $_video->action();
    // $_tpl->display('index.tpl');
?>