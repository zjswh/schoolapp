<?php
    require substr(dirname(__FILE__),0,-6).'/init.inc.php';
    global $_tpl;
    $_onlineCourse = new onCourseAction($_tpl);
    $_onlineCourse->action();
    $_tpl->display('onlineCourse.tpl');
?>
