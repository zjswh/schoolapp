<?php
class orderAction extends Action{
    
    public function __construct(&$_tpl){
        parent::__construct($_tpl, new orderModel());
    }
    
    public function action(){
        switch($_GET['action']){
            case 'showone':
                $this->showone();
                break;
            case 'show':
                $this->show();
                break;
            case 'delete':
                $this->delete();
                break;
        }
    }
    private function show(){
        parent::page($this->_model->getTotalCourse());
        $this->_tpl->assign('show',true);
        $this->_tpl->assign('title','预约查看');
        if(!!$_object = $this->_model->getAllCourse()){
            $this->_tpl->assign('AllCourse',$_object);
        }
        
    }
    
    private function showone(){
        if(isset($_GET['id'])){
            $this->_tpl->assign('show',true);
            $this->_model->id = $_GET['id'];
            parent::page($this->_model->showTotalOrderUser());
            $this->_tpl->assign('id',$_GET['id']);
            if(!!$_object = $this->_model->showOrderUser()){
                $this->_tpl->assign('AllUser',$_object);
            }
            if(!!$_object = $this->_model->getMeetManage()){
                $this->_tpl->assign('meetManage',$_object);
            }
        }
    }
    private function delete(){
        if(isset($_GET['id'])){
            $this->_model->id = $_GET['id'];
            if($this->_model->deleteUser()){
                Tool::alertLocation('删除成功！', PREV_URL);
            }else{
                Tool::alertBack('删除失败！');
            }
        }
    }
    private function update(){
        $this->_tpl->assign('update',true);
    }
}
?>
