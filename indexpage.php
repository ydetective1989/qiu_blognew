<?php include("config.php"); ?>
<?php include("head.php"); ?>
<?php
echo'<fieldset class="layui-elem-field layui-field-title" style="margin-top: 50px;">
<legend>广场随便逛逛</legend>
</fieldset>';
$query = " SELECT * FROM editor WHERE hide = 1 ORDER BY id DESC ";
$db->keyid = "id";
$rows  = $db->getPageRows($query,6);
$list  = $rows["record"];
$page  = $rows["pages"];
if($list){
foreach($list AS $row){
  $pid=$row['id'];
  $count="SELECT count(*) as count FROM talk WHERE pid='$pid' AND hide=1 ";
  $count=$db->getRow($count);
  $count=$count['count'];//评论总数
?>
<div class="layui-collapse" lay-accordion="">
<div class="layui-colla-item ">
<h2 class="layui-colla-title"><?php echo $row['title'] ;?></h2>
<div class="layui-colla-content "><?php echo $row['blogtext'];?></div>
<a href="talkinsert.php?id=<?php echo $row['id'].'&username='.$row['username'] ;?>" > <button class="layui-btn layui-btn-small"><i class="layui-icon"></i>评论</button></a>
<a href="talkpage.php?id=<?php echo $row['id'].'&username='.$row['username'];?>" > <button class="layui-btn  layui-btn-small"><?php echo $count ;?>查看评论</button></a>
<?php   $ilike="SELECT count(*) as total FROM goodpoint WHERE pid='$pid' AND point=1 ";
  $ilike=$db->getRow($ilike);
  $ilike=$ilike['total'];?>
 <button class="layui-btn layui-btn-small" onclick="ilike(<?php echo $row['id'];?>)"><i class="layui-icon">&#xe60c;<?php echo $ilike;?></i>点赞</button>
</div>
</div>

<?php } ?>
<div class="layui-laypage" ><?php echo $page ;?><br><br><br></div>
<?php }else{
 echo"还没有人发表文章呢";
}
?>
<script>
  function ilike(id){
        $.ajax({
          type: "GET",
          async: false,
          url: "ilike.php",
          data: "id="+id,
          success: function(ok){
              if(ok=="1"){
                   alert("操作成功！");
                   window.location.reload();
              }else{
                   alert(ok);
              }
            }
        });
      }
  </script>

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
