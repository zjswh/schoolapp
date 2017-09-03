<?php
    class onCourseModel extends Model{
        private $id;   
        private $name;                  //课程名称
        private $typeId;                //所属类别Id
        private $info;                  //课程介绍
        private $keyword;               //关键字    
        private $sourceUrl;             //资源下载地址
        private $imgurl;                //图片路径
        private $pubdate;               //课程资源上线时间
        private $studyNum;              //学习统计人数
        private $courseId;              //所属课程ID
        private $limit;
        //拦截器(__set)
        public function __set($_key, $_value) {
            $this->$_key = $_value;
        }
        
        //拦截器(__get)
        public function __get($_key) {
            return $this->$_key;
        }

        // //获取下一个自增序号
        // public function nexteId(){
        //     return parent::nextid('onlinecourse');
        // }
        // //获取单行数据
        // public function getOneOnCourse(){
        //     $_sql = "SELECT * FROM onlinecourse WHERE id='$this->id' limit 1";
        //     return parent::all($_sql);
        // }

        // //获取总记录数
        // public function getOnCourseTotal(){
        //     $_sql = "SELECT * FROM onlinecourse";
        //     return parent::total($_sql);
        // }
        
        public function getNavCourse(){
            $_sql = "SELECT * FROM onlinecourse ORDER BY pubdate DESC";
            return parent::all($_sql);
        }
        
        public function getLaterOnCourse(){
            $_sql = "SELECT * FROM onlinecourse ORDER BY pubdate DESC";
            return parent::one($_sql);
        }
        
        public function getAllCourseType(){
            $_sql = "SELECT * FROM coursetype";
            return parent::all($_sql);
        }
        //获取所有是一级目录
        public function getAllOnCourse(){
            $_sql = "SELECT * FROM onlinecourse ORDER BY pubdate DESC $this->limit ";
            return parent::all($_sql);
        }
        public function getTotalOnCourse(){
            $_sql = "SELECT COUNT(*) FROM onlinecourse";
            return parent::total($_sql);
        }
        //获取单行数据
        public function getOneOnCourse(){
            $_sql = "SELECT * FROM onlinechildtitle WHERE courseId='$this->courseId'";
            return parent::all($_sql);
        }
        //获取指定的所有二级目录的数量
        public function getAllOnChildCourseTotal(){
            $_sql = "SELECT COUNT(*) FROM onlinechildtitle WHERE courseId='$this->courseId'";
            return parent::total($_sql);
        }
        //获取指定的所有二级目录
        public function getAllOnChildCourse(){
            $_sql = "SELECT * FROM onlinechildtitle WHERE courseId='$this->courseId'";
            return parent::all($_sql);
        }
        
        public function getCourse(){
            $_sql = "SELECT * FROM onlinecourse ORDER BY rand() LIMIT 0,6";
            return parent::all($_sql);
        }

        
        public function deleteOnCourse(){
            $_sql = "DELETE FROM onlinecourse WHERE id IN($this->id)";
            return parent::aud($_sql);
        }

        // public function updateOnCourse(){
        //      $_sql = "UPDATE 
        //                 onlinecourse 
        //             SET 
        //                 name='$this->name',
        //                 pubdate=NOW(),
        //                 tranning_date=NOW(),
        //                 sponsor='$this->sponsor',
        //                 organizer='$this->organizer',
        //                 address='$this->address',
        //                 overview='$this->overview',
        //                 prerequisite='$this->prerequisite',
        //                 plan='$this->plan',
        //                 proDescription='$this->proDescription',
        //                 endRequisite='$this->endRequisite',
        //                 cost='$this->cost'

        //             WHERE 
        //                 id='$this->id' 
        //             LIMIT 1";
        //     return parent::aud($_sql);
        // }

        // public function updateToMenu(){
        //      $_sql = "UPDATE 
        //                 onlinechildtitle 
        //             SET 
        //                 name='$this->name',
        //                 tranning_date='$this->tranning_date',
        //                 address='$this->address',
        //                 isFinish='$this->isFinish'
        //             WHERE 
        //                 courseId='$this->courseId' 
        //             LIMIT 1";
        //     return parent::aud($_sql);
        // }

        // public function addOnCourse(){
        //     $_sql = "INSERT INTO 
        //                 onlinecourse(
        //                     name,
        //                     pubdate,
        //                     tranning_date,
        //                     sponsor,
        //                     organizer,
        //                     address,
        //                     overview,
        //                     prerequisite,
        //                     plan,
        //                     proDescription,
        //                     endRequisite,
        //                     cost
        //                     )
        //                 VALUES(
        //                     '$this->name',
        //                      NOW(),
        //                      NOW(),
        //                     '$this->sponsor',
        //                     '$this->organizer',
        //                     '$this->address',
        //                     '$this->overview',
        //                     '$this->prerequisite',
        //                     '$this->plan',
        //                     '$this->proDescription',
        //                     '$this->endRequisite',
        //                     '$this->cost'
        //                     )";
        //     return parent::aud($_sql);
        // }
        // //onlinechildtitle
        // public function addChildCourse(){
        //     $_sql = "INSERT INTO 
        //                 onlinechildtitle(
        //                     courseId,
        //                     name,
        //                     tranning_date,
        //                     address
        //                     )
        //                 VALUES(
        //                     '$this->courseId',
        //                     '$this->childname',
        //                      NOW(),
        //                     '$this->address'
        //                     )";
        //     return parent::aud($_sql);
        // }

}
?>
