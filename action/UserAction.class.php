<?php
    class UserAction extends Action{

        public function __construct(&$_tpl){
            parent::__construct($_tpl, new UserModel());
        }
        public function action(){
            switch(@$_GET['action']){
                case 'show':
                    $this->show();
                    break;
                case 'delete':
                    $this->deleteUser();
                    break;
                case 'deletes':
                    $this->deleteUsers();
                    break;
                case 'search':
                    $this->search();
                    break;
                case 'login':
                    $this->login();
                    break;
            }
           
        }

        private function login(){
            $this->_model->username = $_POST['username'];
            if(!!$this->_model->login()){
                $_SESSION['username'] = $_POST['username'];
                Tool::alertLocation('登录成功','index.php');
            }else{
                Tool::alertBack('账号密码错误，请重试。');
            }
        }

        private function show(){
            parent::page($this->_model->getUserTotal());
            $this->_tpl->assign('show',true);
            $this->_tpl->assign('title','用户信息');
            if(!!$_object = $this->_model->getAllUser()){
                $this->_tpl->assign('AllUser',$_object);
            }
        }
        private function search(){
            $this->_tpl->assign('search',true);
            $this->_model->word = $_GET['word'];
            parent::page($this->_model->getUserLimitTotal());
            if(!!$_object = $this->_model->search()){
                $this->_tpl->assign('result',$_object);
            }
           
        }
        private function deleteUser(){
            $this->_model->id = $_GET['id'];
            if($this->_model->deleteUser()){
                Tool::alertLocation('删除成功！','user.php?action=show');
            }
        }
        private function deleteUsers(){
            $_id = $_GET['id'];
            $_str = '';
            $_arr = array();
            foreach($_id as $_value){
                $_str .=$_value.',';
            }
            $_str = substr($_str, 0,-1);
            $this->_model->id = $_str;
            if($this->_model->deleteUser()){
                $_arr['success'] = 1;
                echo json_encode($_arr);
                exit();
            }
        }

    }
?>
