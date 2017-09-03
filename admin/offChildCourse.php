<?php
    require substr(dirname(__FILE__),0,-6).'/init.inc.php';
    global $_tpl;
    $_offChildCourse = new offChildCourseAction($_tpl);
    $_offChildCourse->action();
    $_tpl->display('offChildCourse.tpl');
?>
