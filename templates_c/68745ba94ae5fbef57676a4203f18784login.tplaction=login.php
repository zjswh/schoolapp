<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Responsive Bootstrap Advance Admin Template</title>
        <link href="../css/bootstrap.css" rel="stylesheet" />
        <link href="../css/font-awesome.css" rel="stylesheet" />
    </head>
    <body style="background-color: #E2E2E2;">
        <div class="container">
            <div class="row text-center " style="padding-top:100px;">
                <div class="col-md-12">
                    <img src="../img/login.png" style="width:250px;" />
                </div>
            </div>
            <div class="row ">
                <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
                    <div class="panel-body">
                        <form role="form" action="login.php?action=login" method="post">
                            <hr />
                            <h3>管理员登录</h3>
                            <br />
                            <div class="form-group input-group">
                                <span class="input-group-addon"><i class="fa fa-tag"  ></i></span>
                                <input type="text" class="form-control" placeholder="用户名"  name="username" />
                            </div>
                            <div class="form-group input-group">
                                <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
                                <input type="password" class="form-control"  placeholder="密码" name="password" />
                            </div>
                            <div class="form-group">
                                <label class="checkbox-inline">
                                    <input type="checkbox" />
                                    记住密码 </label>
                                <span class="pull-right"> <a href="index.html" >忘记密码 ? </a> </span>
                            </div>
                            <input type="submit" class="form-control btn btn-primary" value="登录" name="send" />
                            <hr />
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
