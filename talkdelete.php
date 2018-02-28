<?php include('config.php') ;?>
<?php
    if(isset($_COOKIE['user'])){
    $name=$_COOKIE['user'];
    if(isset($_GET['id'])){
    $id=$_GET['id'];
    $delete="SELECT * FROM talk WHERE id = $id AND hide = 1  AND name='$name' ";
    $check=$db->getRow($delete);
    if($check){
    $arr = array(
         "hide" => 0
    );
    $where = array(
      "id" => $id
    );
    $db->update("talk",$arr,$where);
      echo "1";
    }else{
      echo "<script>alert('此文章不是您的');history.go(-1);location.reload()</script>";
    }
    }else{
      echo "<script>alert('此文章不存在');history.go(-1);location.reload()</script>";
    }
    }else{
      echo"请登录";
      echo'<a href="login.php">点击登录</a>';
    }
    ?>
