<?php
class newlistModel extends Model{
    private $id;
    private $word;
    private $limit;
    
    //拦截器(__set)
    public function __set($_key, $_value) {
        $this->$_key = $_value;
    }
    
    //拦截器(__get)
    public function __get($_key) {
        return $this->$_key;
    }
    
    //获取总记录数
    public function getOffNewlist(){
        $_sql = "SELECT * FROM newlist";
        return parent::total($_sql);
    }
    
    //获取所有的帖子
    public function getAllNewlist(){
        $_sql = "SELECT * FROM newlist ORDER BY date DESC $this->limit ";
        return parent::all($_sql);
    }
    
    public function getLaterNewlist(){
        $_sql = "SELECT * FROM newlist ORDER BY date DESC limit 1";
        return parent::one($_sql);
    }
    public function deleteNewlist(){
        $_sql = "DELETE FROM bbs WHERE id='$this->id'";
        return parent::aud($_sql);
    }
    public function getUserInfo(){
        $_sql = "SELECT imgurl FROM user WHERE nickname='$this->username'";
        return parent::one($_sql);
    }
    public function getOneNewlist(){
        $_sql = "SELECT * FROM newlist WHERE id='$this->id'";
        return parent::all($_sql);
    }
    
}
?>
