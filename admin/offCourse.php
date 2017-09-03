<?php
    require substr(dirname(__FILE__),0,-6).'/init.inc.php';
    global $_tpl;
    $_offCourse = new offCourseAction($_tpl);
    $_offCourse->action();
    $_tpl->display('offCourse.tpl');
?>
