
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title></title>
    <script type="text/javascript" src="../js/jquery.js"></script>
    <!-- <script type="text/javascript" src="js/user.js"></script> -->
</head>
<body>
<form method="post" action="user.php">
    <label> 昵称：<input type="text" id="nickname" name="word" /></label>
    <label> 头像：<input type="text" id="imgurl" /></label>
    <label> 持久化登录：<input type="text" id="token" /></label>
    <label> 所在院校：<input type="text" id="academy" /></label>
    <label> 真实名字：<input type="text" id="truename" /></label>
    <label> 手机：<input type="text" id="phone" /></label>
    <label> 邮箱：<input type="text" id="email" /></label>
    <input type="submit" value="搜索" id="send" />
</form>
    {if $obj}
    {foreach $obj(key,value)}
        <div>{@value->nickname}</div>
    {/foreach}
    {/if}
    <input type="button" value="一条" id="showone" />
    <input type="button" value="多条" id="showall" />
</body>
</html>