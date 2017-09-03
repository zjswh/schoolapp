<?php
    class onCourseAction extends Action{

        public function __construct(&$_tpl){
            parent::__construct($_tpl, new onCourseModel());
        }

        public function action(){
            switch($_GET['action']){
                case 'add':
                    $this->addCourse();
                    break;
                case 'update':
                    $this->updateCourse();
                    break;
                case 'delete':
                    $this->deleteCourse();
                    break;
                case 'deletes':
                    $this->deleteCourses();
                    break;
                case 'show':
                    $this->show();
                    break;
            }
        }
        private function show(){
            parent::page($this->_model->getTotalOnCourse());
            $this->_tpl->assign('show',true);
            $this->_tpl->assign('title','课程查看');
            if(!!$_object = $this->_model->getAllOnCourse()){
                foreach($_object as $_value){
                   $_value->completename = $_value->name;
                }
               Tool::subStr($_object, 'name', 15, 'UTF-8');
               $this->_tpl->assign('AllOnCourse',$_object);
            }
        }

        private function addCourse(){
            $this->_tpl->assign('add',true);
            $this->_tpl->assign('title','新增课程');
            $_addId = $this->_model->nexteId();
            $this->getPost();
            if($this->_model->addOffCourse()){
                Tool::alertLocation(null,'offChildCourse.php?action=show&id='.$_addId);
            }else{
                Tool::alertBack("警告：创建失败！");
            }
        }

        

        private function updateCourse(){
            $this->_tpl->assign('update',true);
            $this->_model->id = $_GET['id'];
            $this->getPost();
            if($this->_model->updateOffCourse()){
                Tool::alertLocation('修改成功！','offCourse.php?action=show');
            }else{
                Tool::alertBack('警告：修改失败！');
            }
        }

        private function deleteCourse(){
            $this->_model->id = $_GET['id'];
            if($this->_model->deleteOnCourse()){
                Tool::alertLocation('删除成功！','onlineCourse.php?action=show');
            }
        }
        
        private function deleteCourses(){
            $_id = $_GET['id'];
            $_str = '';
            $_arr = array();
            foreach($_id as $_value){
                $_str .=$_value.',';
            }
            $_str = substr($_str, 0,-1);
            $this->_model->id = $_str;
            if($this->_model->deleteOnCourse()){
                $_arr['success'] = 1;
                echo json_encode($_arr);
                exit();
            }
        }
        private function getPost(){
            $this->_model->name = $_POST['name'];
            $this->_model->tranning_date = $_POST['tranning_date'];
            $this->_model->sponsor = $_POST['sponsor'];
            $this->_model->organizer = $_POST['organizer'];
            $this->_model->address = $_POST['address'];
            $this->_model->overview = $_POST['overview'];
            $this->_model->prerequisite = $_POST['prerequisite'];
            $this->_model->plan = $_POST['plan'];
            $this->_model->proDescription = $_POST['proDescription'];
            $this->_model->endRequisite = $_POST['endRequisite'];
            $this->_model->cost = $_POST['cost'];
            
        }

    }
?>
