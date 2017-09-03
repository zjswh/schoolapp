<?php
class orderModel extends Model{
    private $id;
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
    public function getTotalCourse(){
        $_sql = "SELECT COUNT(*) FROM offlinecourse WHERE UNIX_TIMESTAMP(tranning_date)>UNIX_TIMESTAMP(NOW())";
        return parent::total($_sql);
    }
    
    //获取所有未开课的课程
    public function getAllCourse(){
        $_sql = "SELECT * FROM offlinecourse WHERE UNIX_TIMESTAMP(tranning_date)>UNIX_TIMESTAMP(NOW()) $this->limit";
        return parent::all($_sql);
    }
    
    public function showTotalOrderUser(){
        $_sql = "SELECT
                COUNT(*)
                FROM
                ordercourse o,user u
                WHERE
                o.user=u.nickname
                AND
                offlineCourseId='$this->id'";
       return parent::total($_sql);
    }
    public function showOrderUser(){
        $_sql = "SELECT 
                        o.id,
                        o.offlineCourseId,
                        o.time,
                        u.nickname,
                        u.academy,
                        u.phone,
                        u.email
                    FROM 
                        ordercourse o,user u
                    WHERE 
                        o.user=u.nickname
                    AND
                        offlineCourseId='$this->id'
                    $this->limit;";
        return parent::all($_sql);
    }
    public function deleteUser(){
        $_sql = "DELETE FROM ordercourse WHERE id='$this->id'";
        return parent::aud($_sql);
    }
    
    public function getMeetManage(){
        $_sql = "SELECT * FROM meetmanage WHERE id='$this->id'";
        return parent::all($_sql);
    }
    
    public function getoffCourse(){
        $_sql = "SELECT name FROM offlinecourse WHERE id='$this->id'";
        return parent::one($_sql);
    }
}
?>
