<?php include("head.php"); ?>
<?php
if(isset($_COOKIE['user'])){
?>
<script>
layui.use('element',function(){
  var element = layui.element;
})
</script>

<div  class="layui-container">
  <div class="layui-row">
    <div class="layui-col-md3 layui-bg-red">
      <ul class="layui-nav layui-nav-tree layui-nav-side" lay-filter="">
        <li class="layui-nav-item"><a target="test" href="pesonal.php">网站设置</a></li>
        <li class="layui-nav-item layui-this"><a target="test" href="pesonalpage.php">文章管理</a></li>
        <li class="layui-nav-item"><a target="test" href="talkadmin.php">评论管理</a></li>
        <li class="layui-nav-item">
          <a href="javascript:;">解决方案</a>
          <dl class="layui-nav-child"> <!-- 二级菜单 -->
            <dd><a href="">移动模块</a></dd>
            <dd><a href="">后台模版</a></dd>
            <dd><a href="">电商平台</a></dd>
          </dl>
        </li>
        <li class="layui-nav-item"><a href="">社区</a></li>
      </ul>
    </div>
    <div class="layui-col-md9 layui-col-md-offset1">
      <iframe class="layui-col-md12" name="test"  height=1000  scrolling= "no" frameborder="0"></iframe>
    </div>
  </div>
</div>
</body>
</html>
<?php
}else{
echo"还未登录";
echo'<a href="login.php">点击登录</a>';
}?>
