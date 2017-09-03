<?php
    class offCourseModel extends Model{
        private $id;   
        private $pubdate;
        private $tranning_date;         //培训时间
        private $sponsor;               //主办方    
        private $organizer;             //承办方
        private $address;               //地点
        private $overview;              //课程概述
        private $prerequisite;          //先修条件
        private $plan;                  //学习计划
        private $proDescription;        //实战项目说明
        private $endRequisite;          //结业要求
        private $cost;                  //费用
        private $courseId; 
        private $name; 
        private $childname; 
        private $isFinish; 
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

        //获取下一个自增序号 
        public function nexteId(){
            return parent::nextid('offlinecourse');
        }

        //二级课程的进度
        public function showOneProgress(){
            $_sql = "SELECT isFinish,tranning_date FROM offlinechildtitle WHERE id='$this->id'";
            return parent::one($_sql);
        }
        
        
        
        public function showLateCourse(){
            $_sql = 'SELECT 
                            * 
                        FROM 
                            offlinechildtitle 
                        WHERE
                            UNIX_TIMESTAMP(tranning_date)>UNIX_TIMESTAMP(NOW())
                        ORDER BY
                            UNIX_TIMESTAMP(tranning_date)-UNIX_TIMESTAMP(NOW())
                        LIMIT 1';
            return parent::one($_sql);
        }
        
        //获取二级目录
        public function getOneOffCourse(){
            $_sql = "SELECT * FROM offlinechildtitle WHERE courseId='$this->courseId'";
            return parent::all($_sql);
        }
        //
        public function getOffChildCourseTotal(){
            $_sql = "SELECT * FROM offlinechildtitle";
            return parent::total($_sql);
        }
        
        //
        public function showone(){
            $_sql = "SELECT * FROM offlinecourse WHERE id='$this->id'";
            return parent::one($_sql);
        }
        
        //课程进度
        public function progress(){
            $_sql = "SELECT 
                            COUNT(*) 
                        AS 
                            count,
                    (SELECT COUNT(*) FROM offlinechildtitle WHERE courseId='$this->courseId' AND isFinish=1) 
                    AS 
                        pro 
                    FROM 
                        offlinechildtitle 
                    WHERE 
                        courseId='$this->courseId'";
            return parent::one($_sql);
        }
        //设置课程完成
        public function setFinish(){
            $_sql = "UPDATE offlinechildtitle SET isFinish=1 WHERE id='$this->id'";
            return parent::aud($_sql);
        }
        
        //查找课程
        public function searchCourse(){
            $_sql = "SELECT 
                            *
                        FROM 
                            offlinecourse
                        WHERE 
                            name like '%$this->word%'
                        $this->limit";
            return parent::all($_sql);

        }

        
        
        //获取总记录数
        public function getOffCourseTotal(){
            $_sql = "SELECT * FROM offlinecourse";
            return parent::total($_sql);
        }

        //获取所有数据
        public function getAllOffCourseLimit(){
            $_sql = "SELECT * FROM offlinecourse ORDER BY rand() LIMIT 0,6";
            return parent::all($_sql);
        }
        
        public function getAllOffCourse(){
            $_sql = "SELECT * FROM offlinecourse ORDER BY pubdate DESC $this->limit";
            return parent::all($_sql);
        }
        //获取所有数据的条数
        public function getTotalCourse(){
            $_sql = "SELECT COUNT(*) FROM offlinecourse";
            return parent::total($_sql);
        }
        //
        public function getTotalLimitCourse(){
            $_sql = "SELECT COUNT(*) FROM offlinecourse WHERE name like '%$this->word%'";
            return parent::total($_sql);
        }
        public function deleteOffCourse(){
            $_sql = "DELETE FROM offlinecourse WHERE id IN($this->id)";
            return parent::aud($_sql);
        }

        public function updateOffCourse(){
             $_sql = "UPDATE 
                        offlinecourse 
                    SET 
                        name='$this->name',
                        pubdate=NOW(),
                        tranning_date=NOW(),
                        sponsor='$this->sponsor',
                        organizer='$this->organizer',
                        address='$this->address',
                        overview='$this->overview',
                        prerequisite='$this->prerequisite',
                        plan='$this->plan',
                        proDescription='$this->proDescription',
                        endRequisite='$this->endRequisite',
                        cost='$this->cost'

                    WHERE 
                        id='$this->id' 
                    LIMIT 1";
            return parent::aud($_sql);
        }

        public function updateToMenu(){
             $_sql = "UPDATE 
                        offlinechildtitle 
                    SET 
                        name='$this->name',
                        tranning_date='$this->tranning_date',
                        address='$this->address',
                        isFinish='$this->isFinish'
                    WHERE 
                        courseId='$this->courseId' 
                    LIMIT 1";
            return parent::aud($_sql);
        }

        public function addOffCourse(){
            $_sql = "INSERT INTO 
                        offlinecourse(
                            name,
                            pubdate,
                            tranning_date,
                            sponsor,
                            organizer,
                            address,
                            overview,
                            prerequisite,
                            plan,
                            proDescription,
                            endRequisite,
                            cost
                            )
                        VALUES(
                            '$this->name',
                             NOW(),
                            '$this->tranning_date',
                            '$this->sponsor',
                            '$this->organizer',
                            '$this->address',
                            '$this->overview',
                            '$this->prerequisite',
                            '$this->plan',
                            '$this->proDescription',
                            '$this->endRequisite',
                            1000
                            )";
            return parent::aud($_sql);
        }
        //onlinechildtitle
        public function addChildCourse(){
            $_sql = "INSERT INTO 
                        offlinechildtitle(
                            courseId,
                            name,
                            tranning_date,
                            address
                            )
                        VALUES(
                            '$this->courseId',
                            '$this->childname',
                             NOW(),
                            '$this->address'
                            )";
            return parent::aud($_sql);
        }

}
?>
