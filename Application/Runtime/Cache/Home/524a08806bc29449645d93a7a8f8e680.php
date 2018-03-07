<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>
        柬索-欢迎注册
    </title>
    <link rel="stylesheet" type="text/css" href="/shopmall/Public/css/bootstrap.min.css">
    <link rel="stylesheet" href="/shopmall/Public/css/style1.css">
</head>
<body>
<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
       <ul class="nav nav-pills">
      <li role="presentation"><a href="<?php echo U('Index/index');?>">主页</a></li>
      <li role="presentation"><a href="<?php echo U('Login/login');?>">登录</a></li>
      <li role="presentation" class="active"><a href="<?php echo U('Login/register');?>">注册</a></li>
      <li role="presentation"><a href="<?php echo U('Login/logout');?>">注销</a></li>
    </ul>
  </div>
</nav>

<div id="pic">
<img id="show" src="/shopmall/Public/image/login.jpg">
<div id="id1">
    <div id="banner">
    
    <strong>欢迎注册</strong>
</div>
    <form action="/shopmall/index.php/Home/Login/register.html" method="post">
        <div class="input-group">
            <span class="input-group-addon" id="basic-addon1">
                <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
            </span>
          <input type="text" name="username" class="form-control" placeholder="用户名" aria-describedby="basic-addon1">
        </div>
        <div class="input-group">
            <span class="input-group-addon" id="basic-addon1">
                <span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>
            </span>
            <input type="email" name="email" class="form-control" placeholder="邮箱" />
        </div>
        <div class="input-group">
            <span class="input-group-addon" id="basic-addon1">
                <span class="glyphicon glyphicon-lock" aria-hidden="true"></span>
            </span>
          <input type="password" name="password" class="form-control" placeholder="密码" />
        </div>
        <div class="input-group">
            <span class="input-group-addon" id="basic-addon1">
                <span class="glyphicon glyphicon-lock" aria-hidden="true"></span>
            </span>
          <input type="password" name="repassword" class="form-control" placeholder="确认密码" />
        </div>
            <div class="form-group has-feedback">
                <input type="text" name="verify" class="form-control" placeholder="验证码" style="width:200px;" />
                <span class="glyphicon glyphicon-qrcode form-control-feedback" style="right:120px;"></span>
                <img class="verify" src="<?php echo U(verify);?>" alt="验证码" onClick="this.src=this.src+'?'+Math.random()" />
            </div>
            <div class="row">
                <div class="col-xs-8">
                    <div class="checkbox icheck">
                        <label>
                            <input type="checkbox" name="agree" value="1"> 我同意 <a href="#">网站安全协议</a>
                        </label>
                    </div>
                </div><!-- /.col -->
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">点击注册</button>
                </div><!-- /.col -->
            </div>
        </form>
        <a href="login.html" class="text-center">我已经注册了账户</a>
    </div>
</div>
    <script src="/shopmall/Public/js/jquery-1.11.3.min.js"></script>
    <script src="/shopmall/Public/js/bootstrap.min.js"></script>
    <script type="text/javascript">
    
        var id=document.getElementById("input1");
        function sub()
        {
            if(input2.value!="qwe")
                id.innerText="用户名不存在";
        }

    </script>
</body>
</html>