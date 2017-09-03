<?php
    class videoAction extends Action{

        public function __construct(&$_tpl){
            parent::__construct($_tpl, new videoModel());
        }
        public function action(){
            switch($_GET['action']){
                case 'add':
                    $this->add();
                    break;
                case 'show':
                    $this->show();
                    break;
                case 'search':
                    $this->search();
                    break;
                case 'deletes':
                    $this->deletes();
                    break;
            }
        }

        private function add(){
            
            $_lists= $this->getNav(); 
            $this->_tpl->assign("nav",$_lists);
            $this->_tpl->assign("title",'新增课程视频');
        }
        private function show(){
            $_model = new onCourseModel();
            if(isset($_GET['id'])){
                $_id= $_GET['id'];
            }else{
//                 $_id= $_model->getLaterOnCourse()->id;
                   $_id=6;
            }
            $_model->courseId = $_id;
            parent::page($_model->getAllOnChildCourseTotal());
            if(!!$_object= $_model->getAllOnChildCourse()){
               foreach($_object as $_value){
                   $this->_model->sectionId = $_value->id;
                   $_videolist = $this->_model->getVideo();
                   $_value->videolist = $_videolist;
                   $_value->count = $this->_model->getVideoCount();
               }
               $this->_tpl->assign('ChildCourse',$_object);
            }
            $_list = '';
            if(!!$_object = $_model->getAllOnCourse()){
                foreach($_object as $_value){
                    if($_value->id == $_id){
                        $_list .= '<option value="'.$_value->id.'" selected="selected">'.$_value->name.'</option>'; 
                    }else{
                        $_list .= '<option value="'.$_value->id.'">'.$_value->name.'</option>'; 
                    }
                    
                }
            }
            $this->_tpl->assign('list',$_list);
            $this->_tpl->assign('title','视频查看');
        }

        private function search(){
            $this->_model->word = $_POST['word'];
            if(!!$_object = $this->_model->searchVideo()){
               $this->_tpl->assign('video',$_object);
            }
        }
        
        private function deletes(){
            $_id = $_GET['id'];
            $_str = '';
            $_arr = array();
            foreach($_id as $_value){
                $_str .=$_value.',';
            }
            $_str = substr($_str, 0,-1);
            $this->_model->id = $_str;
            if($this->_model->deleteVideo()){
                $_arr['success'] = 1;
                $_arr['url'] = PREV_URL;
                echo json_encode($_arr);
                exit();
            }
        }
        private function getNav(){
            $_model = new onCourseModel();
            $_lists = null;
            $_object = $_model->getNavCourse();
            Tool::subStr($_object, 'name', 17, "UTF-8");
            foreach($_object as $_value){
                
                $_lists .= '<optgroup label='.$_value->name.'>';
                $_model->courseId= $_value->id;
                if(!!$_childnav = $_model->getOneOnCourse()){
                    foreach($_childnav as $_val){
                        $_lists .= '<option value='.$_val->id.'>'.$_val->name.'</option>';
                    }
                }
                $_lists .= '</optgroup>';
            }
            return $_lists;
        }
        private function getPost(){
            $this->_model->sectionId = $_POST['sectionId'];
            $this->_model->videoName = $_POST['videoName'];
            $this->_model->videoUrl = $_POST['path'];
            $this->_model->time = $_POST['time'];
        }
    }
?>
