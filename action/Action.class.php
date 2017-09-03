<?php
    class Action{
        protected $_tpl;
        protected $_model;
        protected function __construct(&$_tpl,&$_model=null){
            $this->_tpl = $_tpl;
            $this->_model = $_model;
        }
        protected function page($_date,$_pagesize=PAGE_SIZE){
            $_page = new Page($_date,$_pagesize);
            $this->_model->limit = $_page->limit;
            $this->_tpl->assign('page',$_page->showPage());
            $this->_tpl->assign('num',($_page->page-1)*$_pagesize);
        }
    }
?>
