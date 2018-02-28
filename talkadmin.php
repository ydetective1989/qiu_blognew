<?php include("config.php"); ?>
<?php include('head.php'); ?>
<?php
if(isset($_COOKIE['user'])){
$name=$_COOKIE['user']; ?>
<table class="layui-table"  lay-filter="demo">
  <thead>
    <tr>
      <th lay-data="{ width:60, sort: true, fixed: true}">ID</th>
      <th lay-data="{ width:200}">评论用户</th>
      <th lay-data="{ width:300, sort: true}">评论</th>
      <th lay-data="{width:220, align:'center', toolbar: '#barDemo'}">操作</th>
    </tr>
  </thead>
  <?php
  $query="SELECT * FROM talk WHERE name='$name' AND hide=1  ";
  $query=$db->getPageRows($query,5);
  $list=$query['record'];
  $page=$query['pages'];
  foreach($list as $row){
    ?>
    <tr>
    <th ><?php echo $row['id'];?></th>
    <th ><?php echo $row['talkname'];?></th>
    <th ><?php echo $row['text'];?></th>
    <th>
          <a onclick="del(<?php echo $row['id']; ?>)" class="layui-btn layui-btn-danger layui-btn-mini"  >删除</a>
    </th>
    </tr>
<?php   }
  ?>
    </table>
  <?php  echo '<div class="layui-laypage">'. $page.'</div>' ; ?>

  <script>
  function del(id){
        $.ajax({
          type: "GET",
          async: true,
          url: "talkdelete.php",
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
    layui.use('table', function(){
      var table = layui.table;
      //监听表格复选框选择
      table.on('checkbox(demo)', function(obj){
        console.log(obj)
      });
      //监听工具条
      table.on('tool(demo)', function(obj){
        var data = obj.data;
        if(obj.event === 'detail'){
          layer.msg('ID：'+ data.id + ' 的查看操作');
        } else if(obj.event === 'del'){
          layer.confirm('真的删除行么', function(index){
            obj.del();
            layer.close(index);
          });
        } else if(obj.event === 'edit'){
          layer.alert('编辑行：<br>'+ JSON.stringify(data))
        }
      });

      var $ = layui.$, active = {
        getCheckData: function(){ //获取选中数据
          var checkStatus = table.checkStatus('idTest')
          ,data = checkStatus.data;
          layer.alert(JSON.stringify(data));
        }
        ,getCheckLength: function(){ //获取选中数目
          var checkStatus = table.checkStatus('idTest')
          ,data = checkStatus.data;
          layer.msg('选中了：'+ data.length + ' 个');
        }
        ,isAll: function(){ //验证是否全选
          var checkStatus = table.checkStatus('idTest');
          layer.msg(checkStatus.isAll ? '全选': '未全选')
        }
      };

      $('.demoTable .layui-btn').on('click', function(){
        var type = $(this).data('type');
        active[type] ? active[type].call(this) : '';
      });
    });
    </script>
    <?php
    }else{
    echo"还没登录";
    }?>
    </body>
    </html>
