<?php
    class Tool{
        //弹窗跳转
        static public function alertLocation($_info,$_url){
            if(!empty($_info)){
                echo "<script type='text/javascript'>alert('$_info');location.href='$_url';</script>";
            }else{
                header("Location:".$_url);
            }
        }
        //数组转字符串
        static function ArrToStr($_object,$_field){
            $_str = null;
            if($_object){
                foreach($_object as $_value){
                    $_str .= $_value->$_field.',';
                }
                $_str = substr($_str,0,-1);
            }
            return $_str;
        }

         static function toJson($object){
            $json = '';
            $_row = '';
            foreach($object as $value){
                foreach($value as $key=>$childvalue){
                    $_row[$key] = urlencode(str_replace("\n", "", $childvalue));
                }
                $json .= urldecode(json_encode($_row)).',';
            }
            
            
            return  '['.substr($json,0,strlen($json)-1).']';
            
         }
         static function changeTime($time){
             $_time = $time;
             $_time = strtotime($_time); //时间转时间戳
             $_now = time();
             if(($_now-$_time)>24*60*60){
                 $date3=date('m-d',$_time);
             }else if(($_now-$_time)<24*60*60 && 60*60<($_now-$_time)){
                 $_c = $_now-$_time;
                 $date3 = ceil($_c /(60*60)).'小时之前';
             }else{
                 $_c = $_now-$_time;
                 $date3 = ceil($_c /60).'分钟之前';
             }
             return $date3;
         }
         static function arraysToJson($object){
            $json = '';
            $_row = '';
            foreach($object as $value){
                foreach($value as $key=>$childvalue){
                    $_row[$key] = urlencode(str_replace("\n", "", $childvalue));
                }
                $json .= urldecode(json_encode($_row)).',';
            } 
            
            
            echo  '['.substr($json,0,strlen($json)-1).']';

        }
        static function arrayToJson($object){
            $json = '';
            foreach($object as $_key=>$value){
                $object[$_key] = urlencode(str_replace("\n", "", $value));
                $json .= urldecode(json_encode($object)).',';
            }
            echo  '['.substr($json,0,strlen($json)-1).']';

        }
        static function tplName(){
            $_str = explode('/',$_SERVER["SCRIPT_NAME"]);
            $_str = explode('.',$_str[count($_str)-1]);
            return $_str[0];
        }
        //讲html代码转换成样式
        static function tohtml($_string){
            $_str = htmlspecialchars_decode($_string);
            return $_str;
        }
        //字符串截取
        static public function subStr($_object,$_field,$_length,$_encoding) {
            if ($_object) {
                if(is_array($_object)){
                   foreach ($_object as $_value) {
                    if (mb_strlen($_value->$_field,$_encoding) > $_length) {
                            $_value->$_field = mb_substr($_value->$_field,0,$_length,$_encoding).'...';
                        }
                    } 
                }else{
                    $_object = mb_substr($_object,0,$_length,$_encoding);
                }
                
            }
            return $_object;
        }

        //弹窗返回
        static public function alertBack($_info){
            echo "<script type='text/javascript'>alert('$_info');history.back();</script>";
            exit();
        }

        //弹窗赋值关闭(上传专用)
        static public function alertOpenerClose($_info,$_path) {
            echo "<script type='text/javascript'>alert('$_info');</script>";
            echo "<script type='text/javascript'>opener.location.reload()</script>";
            echo "<script type='text/javascript'>window.close();</script>";
            exit();
        }

        static public function htmlString($_date){
            if(is_array($_date)){
                foreach($_date as $_key=>$_value){
                    @$_string[$_key] = Tool::htmlString($_value);
                }
            }elseif(is_object($_date)){

                foreach($_date as $_key=>$_value){
                    @$_string->$_key = Tool::htmlString($_value);
                }
            }else{
                $_string = htmlspecialchars($_date);
            }
            return $_string;
        }  

        //清除session
        static function unSession(){
            if(session_start()){
                session_destroy();
            }
        }
    }
?>
