<?php include("config.php"); ?>
  <?php
  if($_POST){
//获取注册信息
  $name=$_POST["username"];
  $password=$_POST["password"];
  $email=$_POST["email"];
  $phone=$_POST["phone"];
  $sex=$_POST["sex"];
  $question=$_POST["question"];
  $qanswer=$_POST["qanswer"];

$user="SELECT * FROM user WHERE name='$name' OR email='$email' OR phone='$phone' ";
$user=$db->getrows($user);
if($user){
  foreach($user as $row){
    if($name==$row['name']){
      echo"用户名已被注册";
      return;
    }
    if($email==$row['email']){
      echo'邮箱已被注册';
      return;
    }
    if($phone==$row['phone']){
      echo'电话已被注册';
      return;
    }
  }
}else{
  $arr=array(
    "name"=>$name,
    "password"=>$password,
    "email"=>$email,
    "phone"=>$phone,
    "sex"=>$sex,
    "pwas"=>$qanswer,
    "pwqs"=>$question
  );
  $db->insert("user",$arr);
  echo"<a href='login.php'>点击跳转</a>";
  return;
  }
}else{
  include('register.html');
}
   ?>
