<?php
    class onChildCourseAction extends Action{

        public function __construct(&$_tpl){
            parent::__construct($_tpl, new onCourseModel());
        }

        public function action(){
            switch($_GET['action']){
                case 'add':
                    $this->addChildCourse();
                    break;
                case 'update':
                    $this->updateChildCourse();
                    break;
                case 'delete':
                    $this->deleteChildCourse();
                    break;
                case 'show':
                    $this->show();
                    break;
                case 'showall':
                    $this->showall();
                    break;
            }
        }
        private function show(){
            $this->_model->courseId = $_POST['id'];
            if(!!$_object = $this->_model->getAllOnChildCourse()){
               Tool::arrayToJson($_object);
            }
        }
        private function addChildCourse(){
            $this->_tpl->assign('add',true);
            $this->getPost();
            if($this->_model->addChildCourse()){
                Tool::alertLocation('新增成功！','offChildCourse.php?action=show&id='.$_POST['courseId']);
            }else{
                Tool::alertBack("警告：新增失败！");
            }
        }


        private function updateCourse(){
            $this->_tpl->assign('update',true);
            $this->_model->id = $_GET['id'];
            $this->getPost();
            if($this->_model->updateOffCourse()){
                Tool::alertLocation('新增成功！','offChildCourse.php?action=show&id='.$_POST['courseId']);
            }else{
                Tool::alertBack("警告：新增失败！");
            }
        }

        private function deleteUser(){
            $this->_model->id = $_POST['id'];
            if($this->_model->deleteUser()){
                Tool::alertLocation('新增成功！','offChildCourse.php?action=show&id='.$_POST['courseId']);
            }else{
                Tool::alertBack("警告：新增失败！");
            }
        }

        private function getPost(){
            $this->_model->courseId = $_POST['courseId'];
            $this->_model->childname = $_POST['childname'];
            $this->_model->tranning_date = $_POST['tranning_date'];
            $this->_model->address = $_POST['address'];
            
        }

    }
?>
