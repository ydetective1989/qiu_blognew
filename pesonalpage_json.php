<?php include("config.php"); ?>
<?php
if(isset($_COOKIE['user'])){
 $name =$_COOKIE['user'];
if($_GET['limit']){
  $num=$_GET['limit'];
}else{
  $num=10;
}
$query="SELECT * FROM editor WHERE username='$name'  ";
$total="SELECT count(*)  as total FROM editor WHERE username='$name' ";
$total= $db->getRow($total);
$total=$total['total'];
$query=$db->getPageRows($query,$num);
$arr = array();
$arr['code']=0;
$arr['msg']="";
$arr['count']=$total;
$arr['data']=$query['record'];
echo json_encode($arr,JSON_UNESCAPED_UNICODE);
}else{
  echo"还未登录";
}
 ?>
