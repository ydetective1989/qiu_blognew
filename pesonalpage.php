<?php include("config.php"); ?>
<?php include('head.php'); ?>
<?php
if(isset($_COOKIE['user'])){
$name=$_COOKIE['user']; ?>
<table class="layui-table" lay-even="" lay-skin="line">
  <colgroup>
    <col width="150">
    <col width="150">
    <col width="200">
    <col width="200">
    <col width="200">
  </colgroup>
  <thead>
    <tr>
      <th>ID</th>
      <th>用户名</th>
      <th>标题</th>
      <th>博文</th>
      <th>操作</th>
    </tr>
  </thead>
  <?php
  $query="SELECT * FROM editor WHERE username='$name' AND hide=1  ";
  $query=$db->getPageRows($query,5);
  $list=$query['record'];
  $page=$query['pages'];
  foreach($list as $row){
    $id=$row['id'];
    $name=$row['username'];
    ?>
    <tbody>
    <tr>
    <td ><?php echo $row['id'];?></td>
    <td ><?php echo $row['username'];?></td>
    <td ><?php echo $row['title'];?></td>
    <td layui-elip ><?php echo $row['blogtext'];?></td>
  <td>
      <a href="talkpage.php?id=<?php echo $id ;?>" class="layui-btn layui-btn-primary layui-btn-mini" lay-event="detail">查看评论</a>
      <a href="blogupdate.php?id=<?php echo $id ;?>" class="layui-btn layui-btn-mini" lay-event="edit">编辑</a>
      <a  class="layui-btn layui-btn-danger layui-btn-mini" onclick="del(<?php echo $id ;?>)"  >删除</a>
    </td>
  </tr>
</tbody>
<?php   }

  ?>
    </table>
  <?php   echo'<div class="layui-laypage">'. $page.'</div>' ; ?>
  <script>
  layui.use("layer",function(){
var layer=layui.layer;
  });
    layer.msg("确定删除吗");

  </script>
  <script>
    function del(id){
          $.ajax({
            type: "GET",
            async: false,
            url: "blogdelete.php",
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

  <script>
  function del(id){
        $.ajax({
          type: "GET",
          async: false,
          url: "blogdelete.php",
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
    <?php
    }else{
    echo"还没登录";
    }?>
