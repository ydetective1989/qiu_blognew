<?php include("blogmessage.php"); ?>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript" src="jquery-3.2.1.min.js" >
</script>
<script type="text/javascript" src="layui.js" >
</script>
<link rel="stylesheet" href="css\layui.css">
</head>
<body>
<div class="layui-layout layui-layout-admin">
  <div class="layui-header">
    <div class="layui-logo">邱伟开发的个人博客</div>
    <!-- 头部区域（可配合layui已有的水平导航） -->
    <ul class="layui-nav layui-layout-left">
      <li class="layui-nav-item"><a target="main" href="index.php">博客广场</a></li>
      <li class="layui-nav-item"><a target="main" href="editor.php">写博客</a></li>
      <li class="layui-nav-item">
        <a href="javascript:;">其它管理</a>
        <dl class="layui-nav-child">
          <dd><a target="main" href="pesonalpage.php">文章管理</a></dd>
          <dd><a target="main" href="talkadmin.php">评论管理</a></dd>
          <dd><a href="">授权管理</a></dd>
        </dl>
      </li>
    </ul>
    <ul class="layui-nav layui-layout-right">
      <li class="layui-nav-item">
        <a href="javascript:;">
          <img src="http://t.cn/RCzsdCq" class="layui-nav-img">
          <?php
          if(isset($_COOKIE['user'])){
            if($count){
            echo $_COOKIE['user'].'<span class="layui-badge-dot"></span>';
          }else{
              echo $_COOKIE['user'];
          }
          }else{
            echo "游客";
          }
          ?>
        </a>
        <dl class="layui-nav-child">
          <dd><a target="main" href="pesonal-admin.php">基本资料</a></dd>
          <?php
          if(isset($_COOKIE['user'])){
              if($count){?>
          <dd><a target="main" href="talknotice.php">最新消息<span class="layui-badge"><?php echo $count; ?></span></a></dd>
          <?php
        }else{?>
          <dd><a target="main" href="talknotice.php">最新消息</a></dd>
        <?php }
        }else{ ?>
            <dd><a target="main" href="talknotice.php">最新消息</a></dd>
          <?php  }?>
          <dd><a target="main" href="pesonal.php">安全设置</a></dd>
        </dl>
      </li>
      <?php
      if(isset($_COOKIE['user'])){ ?>
      <li class="layui-nav-item"><a href="loginout.php">退了</a></li>
    <?php }else{ ?>
      <li class="layui-nav-item"><a href="login.php">登录</a></li>
    <?php }?>
    </ul>
  </div>



  <div class="layui-body-left layui-bg-cyan">
    <!-- 内容主体区域 -->

          <iframe class="layui-col-md12" src="index.php" name="main" height="1500"   scrolling= "no" frameborder="0"></iframe>

  </div>

  <div class="layui-footer">
    <!-- 底部固定区域 -->
    © 大宝 - 版权所有 盗版必究
  </div>
</div>

<script>
//JavaScript代码区域
layui.use('element', function(){
  var element = layui.element;

});
</script>
</body>
</html>
