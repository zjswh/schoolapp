<?php
    class offCourseAction extends Action{

        public function __construct(&$_tpl){
            parent::__construct($_tpl, new offCourseModel());
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
                case 'search':
                    $this->search();
                    break;
                case 'show':
                    $this->show();
                    break;
            }
        }
        private function show(){
            parent::page($this->_model->getTotalCourse());
            $this->_tpl->assign('show',true);
            $this->_tpl->assign('title','课程查看');
            if(!!$_object = $this->_model->getAllOffCourse()){
                foreach($_object as $_value){
                    $this->_model->courseId = $_value->id;
                    $_one = $this->_model->progress();
                    if($_one->count){
                        $_value->pro= ceil(100*$_one->pro/$_one->count);
                    }else{
                        $_value->pro = 0;
                    }
                    $_value->completename = $_value->name;
                }
                Tool::subStr($_object, 'name', 10, 'UTF-8');
                $this->_tpl->assign('AllOffCourse',$_object);
            }
        }
        private function addCourse(){
            $this->_tpl->assign('add',true);
            $this->_tpl->assign('title','新增课程');
            if(isset($_POST['send'])){
                $this->_model->name = $_POST['name'];
                $this->_model->tranning_date = $_POST['tranning_date'];
                $this->_model->sponsor = $_POST['sponsor'];
                $this->_model->organizer = $_POST['organizer'];
                $this->_model->address = $_POST['address'];
                if($this->_model->addOffCourse()){
                    Tool::alertOpenerClose('添加成功', 'offlineCourse.php?action=show');
                }else{
                    Tool::alertBack("警告：创建失败！");
                }
            }
        }
        private function updateCourse(){
            $this->_tpl->assign('update',true);
            if($_GET['id']){
                $this->_model->id = $_GET['id'];
                $_one = $this->_model->showone();
                $this->_tpl->assign('id',$_GET['id']);
                $this->_tpl->assign('name',$_one->name);
                $this->_tpl->assign('tranning_date',$_one->tranning_date);
                $this->_tpl->assign('address',$_one->address);
                $this->_tpl->assign('sponsor',$_one->sponsor);
                $this->_tpl->assign('organizer',$_one->organizer);
            }
            
            
            if(isset($_POST['send'])){
                $this->_model->id = $_POST['id']; 
                $this->_model->name = $_POST['name'];
                $this->_model->tranning_date = $_POST['tranning_date'];
                $this->_model->sponsor = $_POST['sponsor'];
                $this->_model->organizer = $_POST['organizer'];
                $this->_model->address = $_POST['address'];
                if($this->_model->updateOffCourse()){
                    Tool::alertOpenerClose('修改成功', 'offlineCourse.php?action=show');
                }else{
                    Tool::alertBack("警告：修改失败！");
                }
            }
        }
        private function search(){
            if(empty($_GET['word'])){
                Tool::alertBack('请输入关键字');
            }
            $this->_model->word = $_GET['word'];
            $this->_tpl->assign('search',true);
            
            parent::page($this->_model->getTotalLimitCourse());
            if(!!$_object = $this->_model->searchCourse()){
                foreach($_object as $_value){
                    $this->_model->courseId = $_value->id;
                    $_one = $this->_model->progress();
                    if($_one->count){
                        $_value->pro= floor(100*$_one->pro/$_one->count);
                    }else{
                        $_value->pro = 0;
                    }
                    
                }
                $this->_tpl->assign('result',$_object);
            }
        }

        

        private function deleteCourse(){
            if(isset($_GET['id'])){
                $this->_model->id = $_GET['id'];
                if($this->_model->deleteOffCourse()){
                    Tool::alertLocation('删除成功！','offlineCourse.php?action=show');
                }else{
                    Tool::alertBack('警告：删除失败！');
                }
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
            if($this->_model->deleteOffCourse()){
                $_arr['success'] = 1;
                echo json_encode($_arr);
                exit();
            }
        }
        private function getPost(){
            if (Validate::checkNull($_POST['name'])) Tool::alertBack('警告：用户名不得为空！');
            if (Validate::checkNull($_POST['tranning_date'])) Tool::alertBack('警告：培训时间不得为空！');
            if (Validate::checkNull($_POST['sponsor'])) Tool::alertBack('警告：主办方不得为空！');
            if (Validate::checkNull($_POST['organizer'])) Tool::alertBack('警告：承办方不得为空！');
            if (Validate::checkNull($_POST['address'])) Tool::alertBack('警告：地点不得为空！');
            if (Validate::checkNull($_POST['overview'])) Tool::alertBack('警告：课程概述不得为空！');
            if (Validate::checkNull($_POST['prerequisite'])) Tool::alertBack('警告：先修条件不得为空！');
            if (Validate::checkNull($_POST['plan'])) Tool::alertBack('警告：学习计划不得为空！');
            if (Validate::checkNull($_POST['proDescription'])) Tool::alertBack('警告：实战项目说明不得为空！');
            if (Validate::checkNull($_POST['endRequisite'])) Tool::alertBack('警告：结业要求不得为空！');
            if (Validate::checkNull($_POST['cost'])) Tool::alertBack('警告：费用不得为空！');
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
