<?php
class bbsAction extends Action{
    
    public function __construct(&$_tpl){
        parent::__construct($_tpl, new bbsModel());
    }
    
    public function action(){
        switch($_GET['action']){
            case 'delete':
                $this->deleteBBS();
                break;
            case 'deletecomment':
                $this->deleteComment();
                break;
            case 'show':
                $this->show();
                break;
            case 'search':
                $this->search();
                break;
        }
    }
    private function show(){
        if(!isset($_GET['id'])){
            $this->_model->id = $this->_model->getLaterBbs()->id;
        }else{
            $this->_model->id= $_GET['id'];
        }
        $_img = '';
        parent::page($this->_model->getOffBbs());
        if(!!$_object = $this->_model->getAllBbs()){
           $this->_tpl->assign('AllBbs',$_object);
        }
        $_object = $this->_model->getOneBbs();
        $_imglist = $_object[0]->imglist;
        if(!empty($_imglist)){
            $_imglist = explode(';', $_imglist);
            foreach($_imglist as $_value){
                $_img .= '<img src="../'.$_value.'" width="150px" height="150px;">';
            }
            $this->_tpl->assign('imglist',$_img);
        }
        $_object = Tool::subStr($_object, 'title', 6, 'UTF-8');
        $this->_tpl->assign('showone',$_object);
        if(!!$_object = $this->_model->showComment()){
            foreach($_object as $_value){
                
                $this->_model->username = $_value->username;
                $_value->img = $this->_model->getUserInfo()->imgurl;
            }
            $this->_tpl->assign('AllComment',$_object);
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
    
    private function deleteBBS(){
        $this->_model->id = $_GET['id'];
        if($this->_model->deleteBbs()){
            Tool::alertLocation('删除成功！',PREV_URL);
        }else{
            Tool::alertBack("警告：删除失败！");
        }
    }
    
    private function deleteComment(){
        $this->_model->id = $_GET['id'];
        if($this->_model->deleteComment()){
            Tool::alertLocation('删除成功！',PREV_URL);
        }else{
            Tool::alertBack("警告：删除失败！");
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
