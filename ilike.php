<?php include("config.php"); ?>
<?php
if(isset($_COOKIE['user'])){
  $pointname=$_COOKIE['user'];
  if(isset($_GET['id'])){
    $pid=$_GET['id'];
    $check="SELECT * FROM goodpoint WHERE pointname='$pointname' AND pid='$pid' AND point=1";
    $check=$db->getRow($check);
    if($check){
      echo"已经赞过啦";
    }else{
    $arr=array(
      "pointname"=>$pointname,
      "pid"=>$pid
    );
    $db->insert('goodpoint',$arr);
    echo "1";
  }
  }else{
    echo"此文章已不存在";
  }
}else{
  echo"请登录";
} ?>
