<?php
    require "init.inc.php";
    global $_tpl;
    $_onCourse = new onCourseAction($_tpl);
    $_onCourse->action();
    $_tpl->display('onCourse.tpl');
?>
