<?php include ("config.php"); ?>
<?php
   if(isset($_COOKIE['user'])){
     $name=$_COOKIE['user'];
     if(isset($_GET['id'])){
       $id=$_GET['id'];
       $arr = array(
         'reading'=>0
       );
       $where = array(
         'id' => $id
       );
       $db->update('talk',$arr,$where);
       echo "1";
     }else{
       echo"文章不存在";
     }
   }else{
       echo"请登录";
     }
?>
