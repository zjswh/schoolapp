<?php
    require "../init.inc.php";
    
    switch($_GET['action']){
        case "showone":
            showone();
            break;
        case 'completeUSer':
            completeUSer();
            break;
        case 'showBbs':
            showBbs();
            break;
        case 'showComment':
            showComment();
            break;
        case 'deleteBbs':
            deleteBbs();
            break;
        case 'deleteComment':
            deleteComment();
            break;
    }

    function showone(){ 
        $_model = new UserModel();
        $_model->id = $_GET['id'];
        if(!!$_object = $_model->getOneUser()){
            $_arr = array('data'=>$_object);
            echo json_encode($_arr);
        }
    }
    function completeUSer(){
        $_arr = array();
        $_user = Validate::getUser($_arr);
        $_academy = $_GET['academy'];
        $_truename= $_GET['truename'];
        $_phone= $_GET['phone'];
        $_email= $_GET['email'];
        $_model = new Model();
        $_sql = "UPDATE user SET 
                        academy='$_academy', 
                        truename='$_truename',
                        phone='$_phone',
                        email='$_email'
                    WHERE nickname='$_user'";
        $_arr['success'] = $_model->aud($_sql) ? 1:0;
        echo json_encode($_arr);
    }
    
    function showBbs(){
        $_arr = array();
        $_user = Validate::getUser($_arr);
        $_model = new Model();
        $_sql = "SELECT * FROM bbs WHERE username='$_user' ORDER BY date";
        $_arr['data'] = Validate::checkObject($_model->all($_sql));
        echo json_encode($_arr);
    }
    
    function deleteBbs(){
        $_arr = array();
        $_user = Validate::getUser($_arr);
        $_id = $_GET['id'];
        $_model = new Model();
        $_sql = "DELETE FROM bbs WHERE id='$_id' AND username='$_user'";
        $_arr['success'] = $_model->aud($_sql) ? 1:0;
        echo json_encode($_arr);
    }
    
    function showComment(){
        $_arr = array();
        $_user = Validate::getUser($_arr);
        $_model = new Model();
        $_sql = "SELECT * FROM comment WHERE username='$_user' ORDER BY date";
        $_arr['data'] = Validate::checkObject($_model->all($_sql));
        echo json_encode($_arr);
    }
    
    function deleteComment(){
        $_arr = array();
        $_user = Validate::getUser($_arr);
        $_id = $_GET['id'];
        $_model = new Model();
        $_sql = "DELETE FROM comment WHERE username='$_user' AND id='$_id'";
        $_arr['success'] = $_model->aud($_sql) ? 1:0;
        echo json_encode($_arr);
    }
?>

