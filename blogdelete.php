<?php include('config.php') ;?>
<?php
if(isset($_COOKIE['user'])){
  $name=$_COOKIE['user'];
if(isset($_GET['id'])){
$id=$_GET['id'];
$check="SELECT * FROM editor WHERE id = $id  AND username='$name'  ";
$check=$db->getRow($check);
if($check){
$delete="SELECT * FROM editor WHERE id = $id AND hide = 1  ";
$query= $db->getrow($delete);
if($query){
$arr = array(
     "hide" => 0
);
$where = array(
  "id" => $id
);
$db->update("editor",$arr,$where);

$talkarr = array(
     "hide" => 0
);
$talkwhere = array(
  "pid" => $id
);
$db->update("talk",$talkarr,$talkwhere);
echo "1";

}else{
  $arr = array(
       "hide" => 1
  );
  $where = array(
    "id" => $id
  );
  $db->update("editor",$arr,$where);

  $talkarr = array(
    "hide" => 1
  );
  $talkwhere = array(
    "pid" => $id
  );
  $db->update("talk",$talkarr,$talkwhere);
  echo "<script>alert('恢复成功');history.go(-1);location.reload()</script>";
}
}else{
  echo "<script>alert('文章不存在');history.go(-1);location.reload()</script>";
}
}else{
echo "<script>alert('文章已删除');history.go(-1);location.reload()</script>";
}
}else{
  echo"请登录";
  echo'<a href="login.php">点击登录</a>';
}

?>
