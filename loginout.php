<?php
if(isset($_COOKIE['user'])){
setcookie("user","",time()-7200);
    echo'<p>成功登出</p>
    <p><a href="indexnew.php">点击跳转</a></p>';
    return;
  }else{
    echo'<p>已登出</p>
    <p><a href="indexnew.phpnew">点击跳转</a></p>';
  }
