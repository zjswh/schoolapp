<?php
class bbsModel extends Model{
    private $id;
    private $username;              //发布者
    private $type;                  //论坛类型
    private $state;                 //论坛帖子的状态
    private $title;                 //帖子标题
    private $content;               //帖子内容
    private $readcount;             //浏览次数
    private $commentcount;          //评论次数
    private $date;                  //发布时间
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
    
    //设置帖子类型
    public function setBbsType(){
        $_sql = "UPDATE bbs SET type='$this->type' WHERE id='$this->id'";
        return parent::aud($_sql);
    }
    
    //查找相关帖子
    public function searchBbs(){
        $_sql = "SELECT
                         *
                    FROM
                         bbs
                    WHERE
                        title like '%$this->word%'
                    OR
                        content like '%$this->word%'";
        return parent::all($_sql);
                    
    }
    
    
    
    //获取总记录数
    public function getOffBbs(){
        $_sql = "SELECT * FROM bbs";
        return parent::total($_sql);
    }
    
    //获取所有的帖子
    public function getAllBbs(){
        $_sql = "SELECT * FROM bbs ORDER BY date DESC $this->limit ";
        return parent::all($_sql);
    }
    
    public function getLaterBbs(){
        $_sql = "SELECT * FROM bbs ORDER BY date DESC limit 1";
        return parent::one($_sql);
    }
    public function deleteBbs(){
        $_sql = "DELETE FROM bbs WHERE id='$this->id'";
        return parent::aud($_sql);
    }
    
    public function deleteComment(){
        $_sql = "DELETE FROM comment WHERE id='$this->id'";
        return parent::aud($_sql);
    }
    
    public function showComment(){
        $_sql = "SELECT * FROM comment WHERE articleId='$this->id'";
        return parent::all($_sql);
    }
    
    public function getUserInfo(){
        $_sql = "SELECT imgurl FROM user WHERE nickname='$this->username'";
        return parent::one($_sql);
    }
    public function getOneBbs(){
        $_sql = "SELECT * FROM bbs WHERE id='$this->id'";
        return parent::all($_sql);
    }
//     public function updateBbs(){
//         $_sql = "UPDATE
//         bbs
//         SET
//         type='$this->type',
//         title='$this->title',
//         content='$this->content',
//         readcount='$this->readcount',
//         commentcount='$this->commentcount',
//         date=NOW()
//         WHERE
//         id='$this->id'
//         LIMIT 1";
//         return parent::aud($_sql);
//     }
    
//     public function addBbs(){
//         $_sql = "INSERT INTO
//         bbs(
//         username,
//         type,
//         title,
//         content,
//         readcount,
//         commentcount,
//         date
//         )
//         VALUES(
//         '$this->username'
//         '$this->type',
//         '$this->title',
//         '$this->content',
//         '$this->readcount',
//         '$this->commentcount',
//          NOW()
//         )";
//         return parent::aud($_sql);
//     }
    
}
?>
