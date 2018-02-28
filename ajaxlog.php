<?php include("config.php");?>
<?php
if($_POST){
$name=$_POST["name"];
$password=$_POST["password"];
$check = "SELECT * FROM user where name='$name' AND hide=1";
$check = $db->getrow($check);
if($check){
      if($password!=$check['password']){
        echo"密码错误";
        return;
      }else{
        setcookie("user","$name",time()+7200);
        echo"登录成功";
        return;
    }
}else{
  echo"帐号不存在或已被停用";
  return;
}

}
?>
