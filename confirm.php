<?php include('config.php'); ?>
<?php
if(isset($_COOKIE['confirm'])){
  $username=$_COOKIE['confirm'];
  if(isset($_POST['password'])){
    $password=$_POST['password'];
  $arr=array(
    'password'=>$password
  );
  $where=array(
    'name'=>$username
  );
  $db->update("user",$arr,$where);
  setcookie("confirm","",time()-7200);
  echo"修改成功";
  echo'<a href="login.php">点击登录</a>';
}else{
  include("confirmrepassword.html");
}
}else{
if($_POST){
$name=$_POST['username'];
$question=$_POST['question'];
$qanswer=$_POST['qanswer'];
$check="SELECT * FROM user WHERE name='$name' ";
$check=$db->getRow($check);
if($check){
    if($question!=$check['pwqs']){
      echo"密保问题不正确";
      echo'<a href="javascript:" onclick="self.location=document.referrer;">返回上一页并刷新</a>';
      return;
    }
    if($qanswer!=$check['pwas']){
      echo"密保答案不正确";
      echo'<a href="javascript:" onclick="self.location=document.referrer;">返回上一页并刷新</a>';
      return;
    }else{
      echo"密保验证成功，请在一分钟内修改密码，否则需重新验证";
      setcookie("confirm","$name",time()+60);
      echo'<a href="confirm.php">点击修改</a>';

    }
}else{
  echo"用户名不存在";
  echo'<a href="javascript:" onclick="self.location=document.referrer;">返回上一页并刷新</a>';
}
}else {
  include("confirm.html");
}
}

?>
