<?php include("config.php");?>
<?php include("head.php");?>
<?php
session_start();
if(isset($_SESSION['name'])){
  echo"已登录".$_SESSION['name'];
  echo '<a href="sessionout.php">登出</a>';
}else{
if($_POST){
$name=$_POST["user"];
$password=$_POST["password"];
$user="SELECT * FROM user where name='$name' AND hide=1";
$check=$db->getrow($user);
if($check){
      if($password!=$check['password']){
        echo"密码错误";
        echo"<a href='session.php'>点击跳转</a>";
        return;
      }else{
        echo"登录成功";
        $_SESSION['name']=$name;
        echo '<script>parent.location.reload();</script>';
        return;
    }
}else{
  echo"帐号不存在或已被停用";
    echo"<a href='session.php'>点击跳转</a>";
}
}else{?>
  <html >
  <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <script type="text/javascript" src="jquery-3.2.1.min.js" >
  </script>
  <script type="text/javascript" src="layui.js" >
  </script>
  <link rel="stylesheet" href="css\layui.css">
  </head>
  <style>
  body{
    margin-left: 450px;
    margin-top: 220px;
    padding: 0px;
    border: 0px;
    width: auto;
    height: auto;
  }
  #logbox{
    position:relative;
    width: 400px;
    height: 200px;
    top: 250px;
    left: 500px;
    border: solid;
  }
  legend{
    color:#a53e91;
    font-size: 20px;
    font-family: "黑体"；
  }
  fieldset{
    width: 400px;
    height: 260px;
    border: 1px solid #d5d5d5;
  }
  </style>
  <body>
    <fieldset><form  class="layui-form" action="session.php" method="post">
      <legend>个人登录</legend>
      <div class="layui-form-item">
          <label class="layui-form-label">用户名</label>
          <div class="layui-input-inline">
            <input type="text" name="user" required  lay-verify="required" placeholder="请输入用户名" autocomplete="off" class="layui-input">
          </div>
      </div>
        <div class="layui-form-item">
          <label class="layui-form-label">密码</label>
          <div class="layui-input-inline">
            <input type="password" name="password" required lay-verify="required" placeholder="请输入密码" autocomplete="off" class="layui-input">
          </div>
        </div>
        <div class="layui-form-item">
          <div class="layui-input-block">
            <button class="layui-btn" lay-submit lay-filter="formDemo">立即提交</button>
            <a href="register.php">注册帐号</a>
            <a href="confirm.php">忘记密码</a>
          </div>
        </div>
    </form>
  </fieldset>
  <script>
  layui.use(['form', 'jquery'], function() {

  })
  </script>

  </body>
  </html>


<?php
}
}
?>

<?php

// store session data

?>
