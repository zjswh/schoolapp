<?php
//上传文件类
class FileUpload {
	private $error;
    private $max_size;
    private $type;
    private $typeArr = array('image/jpeg','image/pjpeg','image/png','image/x-png','image/gif','video/avi','video/mp4');
    private $path;
    private $today;
    private $linkToday;
    private $name;
    private $fileType;          //文件类型
    private $tmp;
    private $linkPath;
    private $LinkType;          //类型的绝对路径

	//构造方法，初始化
	public function __construct($_file,$_max_size) {
		$this->error = $_FILES[$_file]['error'];
        $this->max_size = $_max_size/1024;
        $this->type = $_FILES[$_file]['type'];
        $this->path = ROOT_PATH.UPDIR;
        $this->checkType();
        $this->linkToday = date('Ymd').'/';
        $this->LinkType = $this->path.$this->fileType;
        $this->today = $this->LinkType.$this->linkToday;
        $this->name = $_FILES[$_file]['name'];
        $this->tmp = $_FILES[$_file]['tmp_name'];
        $this->checkError();
        $this->checkDir();
        $this->setName(); 
        $this->checkTmp();
	}

    public function getLinkPath(){
        $_path = $_SERVER['SCRIPT_NAME'];
        $_dir = dirname(dirname($_path));
        if ($_dir == '\\') $_dir = '/schoolApp';
        $this->linkPath = $_dir.$this->linkPath;
        return $this->linkPath;
    }

    private function checkTmp(){
        if(isset($this->tmp)){
            if(!move_uploaded_file($this->tmp, $this->setName())){
                Tool::alertBack('警告：上传失败！');
            }
        }else{
            Tool::alertBack('警告：临时文件不存在！');
        }
    }
    private function setName(){
        $arr = explode('.', $this->name);
        $_postfix = $arr[count($arr)-1];
        $_newname = date('YmdHis').mt_rand(100,1000).'.'.$_postfix;
        $this->linkPath = UPDIR.$this->fileType.$this->linkToday.$_newname;
        return $this->today.$_newname;
    }

    private function checkDir(){
        if(!is_dir($this->path) || !is_writable($this->path)){
            if(!mkdir($this->path)){
                Tool::alertBack('警告：主目录创建失败！');
            }
        }
        if(!is_dir($this->LinkType) || !is_writable($this->LinkType)){
            if(!mkdir($this->LinkType)){
                Tool::alertBack('警告：类型目录创建失败！');
            }
        }
        if(!is_dir($this->today) || !is_writable($this->today)){
           
            if(!mkdir($this->today)){
                Tool::alertBack('警告：子目录创建失败！');
            }
        }
        

    }

    private function checkType(){
        if(!in_array($this->type,$this->typeArr)){
            Tool::alertBack('警告：上传类型错误！');
        }else{
            if(preg_match('/image/',$this->type)){
               $this->fileType = 'image/'; 
            }
            if(preg_match('/video/',$this->type)){
               $this->fileType = 'video/'; 
            }
            
        }
    }

    private function checkError(){
        if(!empty($this->error)){
            switch($this->error){
                case 1:
                    Tool::alertBack('警告：上传值超过了约定最大值！');
                    break;
                case 2:
                    Tool::alertBack('警告：上传值超过了'.$this->max_size.'KB!');
                    break;
                case 3:
                    Tool::alertBack('警告：只有部分文件被上传！');
                    break;
                case 4:
                    Tool::alertBack('警告：没有任何文件被上传！');
                    break;
                default:
                    Tool::alertBack('未知错误');
            }
        }
        
    }

}
?>