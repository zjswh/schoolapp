<?php
    require "init.inc.php";
    global $_tpl;
    $_offCourse = new offCourseAction($_tpl);
    $_offCourse->action();
    $_tpl->display('offCourse.tpl');
?>
