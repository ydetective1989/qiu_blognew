<?php include("config.php");?>
  <?php
  if(isset($_COOKIE['user'])){
    $user=$_COOKIE['user'];
  $check="SELECT *FROM user WHERE  name='$user' AND editor=1 AND hide=1";
  $check= $db->getrow($check);
  if($check){
  if($_POST){
//获取注册信息
  $title=$_POST["title"];
  $blogtext=nl2br($_POST["blogtext"]);
  $blogtext=html_entity_decode($blogtext);
//获取cookie，验证用户身份
$arr= array(
  "username" => $user,
  "title" => $title,
  "blogtext"=> $blogtext
);
$db -> insert("editor",$arr);
header("location:userblog.php");//提交后跳转到userblog.php页面，避免用户后退刷新反复提交
}else{
  include("editor.html");
   }
 }else{
   echo"已被禁止发帖";
 }
 }else{
   echo"还未登录";
   echo"<a href='login.php'>点击跳转</a>";
   return;
 }?>
