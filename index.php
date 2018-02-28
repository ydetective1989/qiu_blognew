<?php include("config.php"); ?>
<?php include('head.php');   ?>
<title>个人博客</title>
</head>
<body>
<div class="layui-container-left">
<div class="layui-row layui-bg-cyan" id="main">
  <div id="main-left">
    <div id="pic-left">头像</div><!--首页左侧头像 可修改-->
    <div id="inf-left">
       <?php
      if (isset($_COOKIE["user"])){
        $name=$_COOKIE['user'];
        $count="SELECT COUNT(*) AS COUNT FROM editor WHERE username='$name' AND hide=1 ";
        $count=$db->getRow($count);
        $total=$count['COUNT'];
        echo $_COOKIE["user"] . "的博客!<br />";
        echo "已发表了".$total . "篇文章<br />";
      }
      else{
        echo "欢迎您访客<br />";
      }
      ?>
    </div><!--首页左侧简介 可修改-->
  </div>

  <div id="main-right">
        <iframe class="layui-col-md12" src="indexpage.php" name="test"  height=1000  scrolling= "no" frameborder="0"></iframe>
  </div>

</div>
</div>
</body>
</html>
