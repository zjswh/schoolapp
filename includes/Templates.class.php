<?php

//模板类
class Templates {
	//我想通过一个字段来接受变量
	//但是又不知道有多少个变量要接受。
	//所以我们要动态的接受变量
	//可以通过数组来实现这个功能。
	private $_vars = array();
	//保存系统变量
	private $_config = array();
	
	//创建一个构造方法，来验证各个目录是否存在
	public function __construct() {
		if (!is_dir(TPL_DIR) || !is_dir(TPL_C_DIR)) {
			exit('ERROR：模板目录或编译目录或缓存目录不存在！请手工设置！');
		}
		//保存系统变量  
		$_sxe = simplexml_load_file(ROOT_PATH.'/config/profile.xml');
		$_tagLib = $_sxe->xpath('/root/taglib');
		foreach ($_tagLib as $_tag) {
			$this->_config["$_tag->name"] = $_tag->value;
		}
	}
	
	//assign()方法，用于注入变量
	public function assign($_var, $_value) {
		//$_var用于同步模板里的变量名  例如index.php是name 那么index.tpl就是{$name}
		//$_value值表示的是index.php里的$_name的值，就是 '李炎恢'
		if (isset($_var) && !empty($_var)) {
			//$this->_vars['name']
			$this->_vars[$_var] = $_value;
		} else {
			exit('ERROR：请设置模板变量');
		}
	}
	
	

	//display()方法
	public function display($_file) {
		//给include进来的tpl传一个模板操作的对象
		$_tpl = $this;
		//设置模板的路径
		$_tplFile = TPL_DIR.$_file;
		//判断模板是否存在
		if (!file_exists($_tplFile)) {
			exit('ERROR：模板文件不存在！');
		}
		//是否加入参数
		if(!empty($_SERVER['QUERY_STRING'])){
			$_file .= $_SERVER['QUERY_STRING'];
		}
		//编译文件
		$_parFile = TPL_C_DIR.md5($_file).$_file.'.php';
		
		//当编译文件不存在，或者模板文件修改过，则生成编译文件
		if (!file_exists($_parFile) || filemtime($_parFile) < filemtime($_tplFile)) {
			//引入模板解析类
			require_once ROOT_PATH.'/includes/Parser.class.php';
			$_parser = new Parser($_tplFile);   //模板文件
			$_parser->compile($_parFile);  //编译文件
		}
		//载入编译文件
		include $_parFile;
	}
	
	//创建create方法，用于header和footer这种模块模板解析使用，而不需要生成缓存文件
	public function create($_file) {
		//设置模板的路径
		$_tplFile = TPL_DIR.$_file;
		//判断模板是否存在
		if (!file_exists($_tplFile)) {
			exit('ERROR：模板文件不存在！');
		}
		//编译文件
		$_parFile = TPL_C_DIR.md5($_file).$_file.'.php';
		//当编译文件不存在，或者模板文件修改过，则生成编译文件
		if (!file_exists($_parFile) || filemtime($_parFile) < filemtime($_tplFile)) {
			//引入模板解析类
			require_once ROOT_PATH.'/includes/Parser.class.php';
			$_parser = new Parser($_tplFile);   //模板文件
			$_parser->compile($_parFile);  //编译文件
		}
		//载入编译文件
		include $_parFile;
	}
	
	
	
	
	
	
	
}
?>