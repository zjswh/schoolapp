<?php
    class videoModel extends Model{
        private $sectionName;           //章节名称
        private $sectionId;             //章节ID
        private $videoName;             //视频名称
        private $videoUrl;              //视频地址
        private $time;                   //视频时间
        private $word; 

        //拦截器(__set)
        public function __set($_key, $_value) {
            $this->$_key = $_value;
        }
        
        //拦截器(__get) 
        public function __get($_key) {
            return $this->$_key;
        }
        public function  getVideo(){
            $_sql = "SELECT * FROM video WHERE sectionId='$this->sectionId'";
            return parent::all($_sql);
        }
        public function  getVideoCount(){
            $_sql = "SELECT COUNT(*) FROM video WHERE sectionId='$this->sectionId'";
            return parent::total($_sql);
        }
        public function addVideo(){
            $_sql = "INSERT INTO 
                            video(
                                    sectionId,
                                    name,
                                    videoUrl,
                                    time
                                )
                        VALUES(
                                    '$this->sectionId',
                                    '$this->name',
                                    '$this->videoUrl',
                                    '00:20:10'
                            )";
            return parent::aud($_sql);
        }
        
        public function deleteVideo(){
            $_sql = "DELETE FROM video WHERE id='$this->id'";
            return parent::aud($_sql);
        }
        public function updateVideo(){
            $_sql = "UPDATE 
                        video 
                    SET 
                        sectionId='$this->sectionId',
                        name='$this->name',
                        videoUrl='$this->videoUrl',
                        time='$this->time'
                    WHERE 
                        id='$this->id' 
                    LIMIT 1";
            return parent::aud($_sql);
        }

        public function searchVideo(){
            $_sql = "SELECT * FROM video WHERE name LIKE '%$this->word%'";
            return parent::all($_sql);
        }
    }
?>
