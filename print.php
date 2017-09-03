<?php
    header("Content-type:text/html;charset=utf-8");
    require "init.inc.php";
    $_model = new Model();
    $data = array();
    $_sql = "SELECT * FROM offlinechildtitle";
    $_object = $_model->all($_sql);
    foreach($_object as $_value){
        $_a = array($_value->name,$_value->address,$_value->name,$_value->address,$_value->name);
        array_push($data, $_a);
    }
    
    require "PHPExcel/Classes/PHPExcel.php";
    
    $excel = new PHPExcel();
    //Excel表格式,这里简略写了8列
    $letter = array('A','B','C','D','E','F','F','G');
    //表头数组
    $tableheader = array('学号','姓名','性别','年龄','班级');
    

    
    //填充表头信息
    for($i = 0;$i < count($tableheader);$i++) {
        $excel->getActiveSheet()->setCellValue("$letter[$i]1","$tableheader[$i]");
    }
    //填充表格信息
    for ($i = 2;$i <= count($data) + 1;$i++) {
        $j = 0;
        foreach ($data[$i - 2] as $key=>$value) {
            $excel->getActiveSheet()->setCellValue("$letter[$j]$i","$value");
            $j++;
        }
    }
    $write = new PHPExcel_Writer_Excel5($excel);
    header("Pragma: public");
    header("Expires: 0");
    header("Cache-Control:must-revalidate, post-check=0, pre-check=0");
    header("Content-Type:application/force-download");
    header("Content-Type:application/vnd.ms-execl");
    header("Content-Type:application/octet-stream");
    header("Content-Type:application/download");;
    header('Content-Disposition:attachment;filename="报名表.xls"');
    header("Content-Transfer-Encoding:binary");
    $write->save('php://output');

?>
