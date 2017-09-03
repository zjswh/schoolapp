<?php
class newlistAction extends Action{
    
    public function __construct(&$_tpl){
        parent::__construct($_tpl, new newlistModel());
    }
    
    public function action(){
        switch($_GET['action']){
            case 'delete':
                $this->deleteNewlist();
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
            $this->_model->id = $this->_model->getLaterNewlist()->id;
        }else{
            $this->_model->id= $_GET['id'];
        }
        $_img = '';
        parent::page($this->_model->getOffNewlist());
        if(!!$_object = $this->_model->getAllNewlist()){
            $this->_tpl->assign('AllNewlist',$_object);
        }
        $_object = $this->_model->getOneNewlist();
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
        $this->_tpl->assign('title','资讯查看');
    }
    
    private function deleteNewlist(){
        $this->_model->id = $_GET['id'];
        if($this->_model->deletenewlist()){
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
