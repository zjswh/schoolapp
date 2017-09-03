<?php
    class offChildCourseAction extends Action{

        public function __construct(&$_tpl){
            parent::__construct($_tpl, new offCourseModel());
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
                case 'finish':
                    $this->finish();
                    break;
                case 'showall':
                    $this->showall();
                    break;
            }
        }
        private function show(){
            parent::page($this->_model->getOffChildCourseTotal());
            $this->_tpl->assign('show',true);
            $this->_tpl->assign('title',$_GET['title']);
            $this->_model->courseId = $_GET['id'];
            if(!!$_object = $this->_model->getOneOffCourse()){
                foreach ($_object as $_value){
                    if($_value->isFinish == 1){
                        $_value->isFinish = "<font color='red'>已结束</font>";
                    }else{
                        $_value->isFinish = "<font color='green'>未开始</font>   | <a href='offChildCourse.php?action=finish&id=".$_value->id."'>设置结束</a>";
                    }
                }
                $this->_tpl->assign('AllOffChildCourse',$_object);
            }
        }
        private function finish(){
            $this->_model->id = $_GET['id'];
            if($this->_model->setFinish()){
                Tool::alertLocation('设置成功！',PREV_URL);
            }else{
                Tool::alertBack('已设置了完成选项，不需要再次设置！');
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
                Tool::alertLocation('修改成功！','offChildCourse.php?action=show&id='.$_POST['courseId']);
            }else{
                Tool::alertBack("警告：修改失败！");
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
