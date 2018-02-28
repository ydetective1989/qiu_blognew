<?php include("config.php"); ?>
<?php include("head.php"); ?>
<script>
 layui.user('table',function(){
   var table = layui.table;
 });
</script>

<?php
   if(isset($_COOKIE['user'])){
     $name=$_COOKIE['user'];
      $read="SELECT * FROM talk WHERE name='$name' AND hide=1 AND reading=1";
      $read=$db->getPageRows($read,5);
      $list=$read['record'];
      $page=$read['pages']; ?>
      <table class="layui-table"  lay-filter="demo">
        <?php
      if($list){
        foreach($list as $row){?>
          <div class="layui-collapse" lay-accordion="">
          <div class="layui-colla-item">
               <h2 class="layui-colla-title">来自<?php echo $row['talkname']; ?>的评论</h2>

        <div class="layui-colla-content ">  <?php echo $row['text']; ?></div>
      <a onclick="readed(<?php echo $row['id']; ?>)" class="layui-btn layui-btn-mini" lay-event="edit">标记为已读</a>
      </th>
      <?php } ?>
      </table>

      <script>
  function readed(id){
        $.ajax({
          type: "GET",
          async: false,
          url: "readed.php",
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
      layui.use(['element', 'layer'], function(){
      var element = layui.element;
      var layer = layui.layer;
      //监听折叠
      element.on('collapse(test)', function(data){
        layer.msg('展开状态：'+ data.show);
      });
      });
      </script>
      <?php
      echo '<div class="layui-laypage">'.$page.'</div>' ;
    }else{
      echo"暂无评论";
    }
    }else{
    echo "请登录";
    }?>
