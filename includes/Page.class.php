<?php
    //分页类
    class Page{
        private $total;                 //总记录
        private $pageSize;              //每页个数
        private $pageNum;               //总页数
        private $page;                  //当前页数
        private $limit;                 //limit语句
        private $list;                  //显示的分页内容
        private $pagelist;              //数字的分页
        private $bothpage;              //只能显示当前页的前后页的数量

        public function __construct($_total,$_pageSize){
            $this->total = $_total?$_total:1;
            $this->pageSize = $_pageSize;
            $this->pageNum =ceil($_total/$_pageSize);
            $this->page = $this->setPage();
            $this->limit = 'LIMIT '.($this->setPage()-1)*$this->pageSize.','.$_pageSize;
            $this->setUrl();
            $this->bothpage = 2;
        }
        //拦截器
        public function __get($_key){
            return $this->$_key;
        }

        public function setPage(){
            if(!empty($_GET['page'])){
                if($_GET['page']>0){
                    if($_GET['page']<$this->pageNum){
                        return  $_GET['page'];
                    }else{
                        return $this->pageNum;
                    }
                }else{
                    return 1;
                }
            }else{
                return 1;
            }
            
            
        }
        private function pageList(){
            for($i=$this->bothpage;$i>=1;$i--){
                if(($this->page-$i)<1){
                    continue;
                }
                $this->pagelist .= '<li><a href="'.$this->setUrl().'&page='.($this->page-$i).'">'.($this->page-$i).'</a></li>';
            }
            $this->pagelist .= '<li class="active"><a href="'.$this->setUrl().'&page='.$this->page.'">'.$this->page.'</a></li>';
            for($i=1;$i<=$this->bothpage;$i++){
                if(($this->page+$i)>$this->pageNum){
                    break;
                }
                $this->pagelist .= '<li><a href="'.$this->setUrl().'&page='.($this->page+$i).'">'.($this->page+$i).'</a></li>';
                

            }
            return $this->pagelist;
        }
        private function setUrl(){
            $_url = $_SERVER['REQUEST_URI'];
            $_par = parse_url($_url);
            if(isset($_par['query'])){
                parse_str($_par['query'],$_query);
                unset($_query['page']);
                $_url = $_par['path'].'?'.http_build_query($_query);
            }
            return $_url;
        }
        //首页
        private function first(){
            if($this->page>$this->bothpage+1){
                return '<li><a href="'.$this->setUrl().'">1</a></li><li><a>...</a></li>';
            }
            
        }
        private function prev(){
            if(empty($this->page)){
                return '<li><a href="'.$this->setUrl().'">上一页</a>';
            }else{
                if($this->page == 1){
                    return '<li><a href="'.$this->setUrl().'&page=1" class="disabled">上一页</a></li>';
                }else{
                    return '<li><a href="'.$this->setUrl().'&page='.($this->page-1).'">上一页</a></li>';
                }
            }
            
            
        }
        private function next(){
            if(empty($this->page)){
                return '<li><a href="'.$this->setUrl().'&page=2">下一页</a></li>';
            }else{
                if($this->page == $this->pageNum){
                    return '<li><a href="'.$this->setUrl().'&page='.$this->pageNum.'" class="disabled">下一页</a></li>';
                }else{
                    return '<li><a href="'.$this->setUrl().'&page='.($this->page+1).'">下一页</a></li>';
                }   
            }
                     
        }
        private function last(){
            if(($this->pageNum-$this->page)>$this->bothpage)
            return '<li><a>...</a></li><li><a href="'.$this->setUrl().'&page='.$this->pageNum.'">'.$this->pageNum.'</a></li>';
        }

        //
        public function showPage(){
            $this->list .= $this->prev();
            $this->list .= $this->first();
            $this->list .= $this->pagelist();
            $this->list .= $this->last();
            $this->list .= $this->next();
            
            return $this->list;        
        }
    }
?>
