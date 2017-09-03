<?php
    require "init.inc.php";
    global $_tpl;
    $_offChildCourse = new offChildCourseAction($_tpl);
    $_offChildCourse->action();
    $_tpl->display('offChildCourse.tpl');
?>
