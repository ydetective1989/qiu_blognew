<?php include('config.php'); ?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript" src="jquery-3.2.1.min.js" >
</script>
<script type="text/javascript" src="layui.js" >
</script>
<link rel="stylesheet" href="css\layui.css">

</script>
</head>
<body >
    <div class="layui-side layui-bg-black">
      <div class="layui-side-scroll">
        <!-- 左侧导航区域（可配合layui已有的垂直导航） -->
        <ul class="layui-nav layui-nav-tree"  lay-filter="test">
          <li class="layui-nav-item layui-nav-itemed">
            <a target="pesonal"  href="pesonalpage_password.php">修改密码</a>
          </li>
          <li class="layui-nav-item">
            <a target="pesonal"  href="pesonalpage_main.php">修改密码保护</a>
          </li>
          <li class="layui-nav-item"><a target="pesonal"  href="pesonalpage_phone.php">修改注册手机</a></li>
          <li class="layui-nav-item"><a target="pesonal"  href="pesonalpage_email.php">修改注册邮箱</a></li>
        </ul>
      </div>
    </div>

    <div class="layui-body" style="margin-left:180px"  >
      <!-- 内容主体区域 -->
      <iframe class="layui-col-md12"  name="pesonal" height="1500"  scrolling= "no" frameborder="0"></iframe>
    </div>

    <div class="layui-footer">
      <!-- 底部固定区域 -->
      © layui.com - 底部固定区域
    </div>
  </div>
  <script src="../src/layui.js"></script>
  <script>
  //JavaScript代码区域
  layui.use('element', function(){
    var element = layui.element;

  });
  </script>

</body>
</html>
