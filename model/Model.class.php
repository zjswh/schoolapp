<?php
    //模型基类
    class Model{
        //获取下一个增加数据的id模型
        public function nextid($_table){
            $_sql = "SHOW TABLE STATUS LIKE '$_table'";
            $_object = $this->one($_sql);
            return $_object->Auto_increment;
        }
        //查找总记录模型
        public function total($_sql){
            $_db = DB::getDB();
            $_result = $_db->query($_sql);
            $_total = $_result->fetch_row();
            @DB::unDB($_result=null,$_db);
            return $_total[0];
        }

        //
        protected function addone($_sql){
            $_db = DB::getDB();
            $_result = $_db->query($_sql);
            $_objects = $_result->fetch_object();
            DB::unDB($_result,$_db);
            return $_objects->id;
        }

        //查找单个数据模型
        public function one($_sql){
            $_db = DB::getDB();
            $_result = $_db->query($_sql);
            $_objects = $_result->fetch_object();
            DB::unDB($_result,$_db);
            return $_objects;
        }
        //多条sql修改
        protected function multi($_sql){
            $_db = DB::getDB();
            $_result = $_db->multi_query($_sql);
            DB::unDB($_result=null,$_db);
            Tool::alertLocation(null,PREV_URL);
            return true;
        }
        //查找多个数据模型
        public function all($_sql){
            $_db = DB::getDB();
            $_result = $_db->query($_sql);
            $_html = array();
            while(!!$_objects = $_result->fetch_object()){
                $_html[] = $_objects;
            }
            DB::unDB($_result,$_db);
            return $_html;
        }
        
        //增删修模型
        public function aud($_sql){
            $_db = DB::getDB();
            $_db->query($_sql);
            $_affected_rows = $_db->affected_rows;
            @DB::unDB($_result=null,$_db);
            return $_affected_rows;
        }
    }
?>
