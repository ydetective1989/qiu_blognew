<?php include("config.php"); ?>
<?php
if(isset($_GET['id'])){
  $id=$_GET['id'];
  $arr = array(
    'reading'=>0
  );
  $where = array(
    'id' => $id
  );
  $db->update('talk',$arr,$where);
  echo "<script>alert('标记成功');location.reload()</script>";
}else{
   echo"请提交正确";
 }
?>
