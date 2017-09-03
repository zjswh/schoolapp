<?php
    class UserModel extends Model{
        private $username;
        private $password;
        private $word;
        private $id;
        private $nickname;
        private $imgurl;
        private $token;
        private $academy;
        private $truename;
        private $phone;
        private $email;
        private $limit;

        //拦截器(__set)
        public function __set($_key, $_value) {
            $this->$_key = $_value;
        }
        
        //拦截器(__get)
        public function __get($_key) {
            return $this->$_key;
        }

        public function login(){
            $_sql = "SELECT * FROM user WHERE nickname='$this->username'";
            return parent::one($_sql);
        }
        //根据条件搜索
        public function search(){
            $_sql = "SELECT 
                            * 
                        FROM 
                            user 
                        WHERE 
                            nickname LIKE '%$this->word%'
                        OR
                            academy LIKE '%$this->word%'
                        OR
                            truename LIKE '%$this->word%'
                    $this->limit";
            return parent::all($_sql);
        }

        //获取单行数据
        public function getOneUser(){
            $_sql = "SELECT * FROM user WHERE id='$this->id' limit 1";
            return parent::all($_sql);
        }

        //获取所有数据 
        public function getAllUser(){
            $_sql = "SELECT * FROM user $this->limit";
            return parent::all($_sql);
        }
        public function getUserTotal(){
            $_sql = "SELECT COUNT(*) FROM user";
            return parent::total($_sql);
        }
        public function getUserLimitTotal(){
            $_sql = "SELECT COUNT(*) FROM user 
                        WHERE 
                            nickname LIKE '%$this->word%'
                        OR
                            academy LIKE '%$this->word%'
                        OR
                            truename LIKE '%$this->word%' ";
            return parent::total($_sql);
        }
        //新增用户
        public function addUser(){
            $_sql = "INSERT INTO 
                        user(
                            nickname,
                            imgurl,
                            token,
                            academy,
                            truename,
                            phone,
                            email,
                            date)
                        VALUES(
                            '$this->nickname',
                            '$this->imgurl',
                            '$this->token',
                            '$this->academy',
                            '$this->truename',
                            '$this->phone',
                            '$this->email',
                            NOW()
                            )";
            return parent::aud($_sql);
        }
        //修改用户信息
        public function updateUser(){
            $_sql = "UPDATE 
                        user 
                    SET 
                        nickname='$this->nickname',
                        imgurl='$this->imgurl',
                        academy='$this->academy',
                        truename='$this->truename',
                        phone='$this->phone',
                        email='$this->email'
                    WHERE 
                        id='$this->id' 
                    LIMIT 1";
            return parent::aud($_sql);
        }
        //删除用户
        public function deleteUser(){
            $_sql = "DELETE FROM user WHERE id in($this->id)";
            return parent::aud($_sql);
        }
        public function showQuery($_query){
        $json = '';
        while(!!$row = mysql_fetch_array($_query,MYSQL_ASSOC)){
            foreach($row as $key => $value){
                $row[$key] = urlencode(str_replace("\n", "", $value));
            }
            $json .= urldecode(json_encode($row)).',';
        }

        echo '['.substr($json,0,strlen($json)-1).']';
        mysql_close();
    }
    }
?>
