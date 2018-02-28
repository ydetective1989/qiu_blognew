<?php include("config.php");?>
  <?php
  if(isset($_COOKIE['user'])){
    $user=$_COOKIE['user'];
    $id=$_GET["id"];
    $name=$_GET["username"];
  $check="SELECT *FROM user WHERE  name='$user' AND talk=1 AND hide=1";
  $checked= $db->getrow($check);
  if($checked){
  if($_POST){
//获取注册信息
  $talk=$_POST["talk"];
//获取cookie，验证用户身份
$arr= array(
  "name"=>$name,
  "talkname" =>$user,
  "pid" => $id,
  "text" => $talk
);
$db -> insert("talk",$arr);
echo"提交成功";
echo'
<a href="javascript:" onclick="history.go(-2); ">点击跳转</a>';
exit;
//如果数据库为空 不能注册 也不能判断
//写入数据库
//还需要添加判断用户名是否重复
}else{
  include("talkeditor.html");
   }
 }else{
   echo"已被管理员禁止评论";
 }
 }else{
   echo"还未登录";
   echo"<a href='login.php'>点击跳转</a>";
   return;
 }?>
