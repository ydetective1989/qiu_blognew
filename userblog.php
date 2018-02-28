<?php include("config.php");?>
<?php if(isset($_COOKIE['user'])){
      $name=$_COOKIE['user'];
?>
<?php include("head.php"); ?>
<fieldset class="layui-elem-field layui-field-title" style="margin-top: 50px;">
  <legend>个人文章</legend><a href="editor.php"><button class="layui-btn"><i class="layui-icon"></i></button></a>
</fieldset>
<?php
$user="SELECT * FROM editor WHERE username='$name' AND hide=1";
$rows=$db->getpagerows($user,6);
$list  = $rows["record"];
$page  = $rows["pages"];
if($list){
  foreach($list as $rs){
    $id=$rs['id'];
  ?>
  <div class="layui-collapse" lay-accordion="">
    <div class="layui-colla-item">
    <?php echo'<h2 class="layui-colla-title">'.$rs['title'].'</h2>';
      echo'<div class="layui-colla-content ">'.$rs['blogtext'];?>
        <div class="layui-collapse " lay-accordion="">
          <div class="layui-colla-item">
            <h2 class="layui-colla-title" >评论</h2>
            <?php
             $talk="SELECT * FROM talk WHERE pid='$id'";
             $talklist = $db->getrows($talk);
            if($talklist){
              foreach($talklist as $rows){?>
                <?php echo'  <div class="layui-colla-content ">'.$rows['text'].'</div>';
              }
            }?>
          </div>
        </div>
      </div>
    </div>
  </div>
      <?php
      }
      echo"<div class="layui-laypage">". $page."</div>";
      }?>
  <script src="layui.js" charset="utf-8"></script>
<!-- 注意：如果你直接复制所有代码到本地，上述js路径需要改成你本地的 -->
<script>
layui.use(['element', 'layer'], function(){
  var element = layui.element;
  var layer = layui.layer;
  //监听折叠
  element.on('collapse(test)', function(data){
    layer.msg('展开状态：'+ data.show);
  });
});
</script>
</body>
</html>
<?php }else{
        echo'请登录';
        echo"<a href='login.php'>点击跳转</a>";
        return;
}?>
