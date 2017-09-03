<?php
require '../init.inc.php';
 
$lcs = new LCS();
//返回最长公共子序列

// $_model = new Model();
// $_sql = "SELECT id,name FROM onlinecourse";
// $res = $_model->all($_sql);
// $_arr = array();
// foreach($res as $value){
//     if($lcs->getSimilar("实战",$value->name)>0.1){
//         array_push($_arr, $value->id);
//         // $_arr[$value->id] = $value->name;
//         // echo $value->name.'<br/>';
//     }
// }
// $_str = '';
// for($i = 0 ;$i < count($_arr);$i++){
//     $_str .= $_arr[$i].',';
// }
// $_str = substr($_str, 0,-1);
// $_sql = "SELECT * FROM onlinecourse WHERE id IN(".$_str.")";
// $_res = $_model->all($_sql);
// print_r($_res);
echo $lcs->getLCS("hello word","hello china");
?>
