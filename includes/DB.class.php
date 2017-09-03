<?php
    class DB{
        //获取对象句柄
        static public function getDB(){
            //连接数据库
            $_mysqli = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);
            //判断是否连接成功
            if(mysqli_connect_errno()){
                echo '数据库连接错误'.mysqli_connect_error();
                exit();
            }
            //设置编码集
            $_mysqli->set_charset('utf8');
            return $_mysqli;
        }
        static public function unDB(&$_result,&$_db){
            if(is_object($_result)){
                //清除结果集
                $_result->free();
                //销毁结果集
                $_result = null;
            }
            if(is_object($_db)){
                //关闭数据库
                $_db->close();
                //销毁对象句柄
                $_db = null;
            }
            
        }
    } 
?>
