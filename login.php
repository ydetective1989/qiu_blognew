<?php include("config.php");?>
<?php include("head.php");?>
<?php
if(isset($_COOKIE['user'])){
  header("location:indexnew.php");
}else{
if($_POST){
$name=$_POST["user"];
$password=$_POST["password"];
$user="SELECT * FROM user where name='$name' AND hide=1";
$check=$db->getrow($user);
if($check){
      if($password!=$check['password']){
        echo"密码错误";
        echo"<a href='login.php'>点击跳转</a>";
        return;
      }else{
        echo"登录成功";
        setcookie("user","$name",time()+7200);
        echo '<script>parent.location.reload();</script>';
        return;
    }
}else{
  echo"帐号不存在或已被停用";
    echo"<a href='login.php'>点击跳转</a>";
}
}else{
  include('login.html');

}
}
?>
