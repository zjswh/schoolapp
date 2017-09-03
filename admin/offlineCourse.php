<?php
    require substr(dirname(__FILE__),0,-6).'/init.inc.php';
    global $_tpl;
    $_offline = new offCourseAction($_tpl);
    $_offline->action();
    $_tpl->display('offlineCourse.tpl');
?>
