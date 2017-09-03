<?php
    //数据库配置文件
    define('DB_HOST','localhost');                  //主机IP
    define('DB_USER', 'root');                      //服务器账号
    define('DB_PASS', '123456');                    //密码
    define('DB_NAME', 'schoolapp');                 //数据库名称

    
    //模板配置信息
    define('TPL_DIR',ROOT_PATH.'/templates/');      //模板文件目录
    define('TPL_C_DIR',ROOT_PATH.'/templates_c/');  //编译文件目录

    define('PAGE_SIZE',10);                          //显示分页
    define('UPDIR','/uploads/');

    define('PREV_URL',@$_SERVER['HTTP_REFERER']);   //上一条地址
    define('ACTIVE_TIME',24*60*60);

?>
