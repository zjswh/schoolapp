<?php
    header("Content-type:text/html;charset=utf-8");
    require "../init.inc.php";
    $_model = new orderModel();
    $data = array();
    $_model->id = $_GET['id'];
    $_object = $_model->showOrderUser();
    foreach($_object as $_key=>$_value){
        $_a = array($_key+1,$_value->nickname,$_value->academy,$_value->phone,$_value->email,'');
        array_push($data, $_a);
    }
    $_name = $_model->getoffCourse()->name.'表';
    require "../PHPExcel/Classes/PHPExcel.php";
    
    $excel = new PHPExcel();
    //Excel表格式,这里简略写了8列
    $letter = array('A','B','C','D','E','F','F','G');
    //表头数组
    $tableheader = array('序号','用户名','所在院校(单位)','Tel','e-mail','备注');
    
    
    
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
    $excel->getActiveSheet()->getColumnDimension('C')->setWidth(16);
    $excel->getActiveSheet()->getColumnDimension('D')->setWidth(12);
    $excel->getActiveSheet()->getColumnDimension('E')->setWidth(12);
    $write = new PHPExcel_Writer_Excel5($excel);
    header("Pragma: public");
    header("Expires: 0");
    header("Cache-Control:must-revalidate, post-check=0, pre-check=0");
    header("Content-Type:application/force-download");
    header("Content-Type:application/vnd.ms-execl");
    header("Content-Type:application/octet-stream");
    header("Content-Type:application/download");;
    header('Content-Disposition:attachment;filename="'.$_name.'.xls"');
    header("Content-Transfer-Encoding:binary");
    $write->save('php://output');

?>