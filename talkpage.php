<?php include("config.php"); ?>
<?php
if(isset($_GET['id'])){
   $id=$_GET['id'];
 }
 ?>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <title>邱氏博客</title>
  <script type="text/javascript" src="jquery-3.2.1.min.js" >
  </script>
  <link rel="stylesheet" href="css\layui.css">
   <script type="text/javascript" src="layui.js" >
  </script>
  </head>
  <body>
  <?php
  $query="SELECT * FROM talk where  hide=1 AND pid='$id' ";
  $db->keyid = "id";
  $rows  = $db->getPageRows($query,6);
  $list  = $rows["record"];
  $page  = $rows["pages"];
  if($list){
    foreach($list AS $row){
      echo'
  <div class="layui-collapse">
    <div class="layui-colla-item">
      <h2 class="layui-colla-title">'.$row['name'].'的评论</h2>
   <div class="layui-colla-content layui-show">'.$row['text'].'</div>
    </div>
  </div>';
  }
   echo '<div class="layui-laypage" >'.$page.'<br><br><br></div>';//
  }else{
    echo'没有评论';
  }
  ?>
  <script>
  //注意：折叠面板 依赖 element 模块，否则无法进行功能性操作
  layui.use('element', function(){
    var element = layui.element;

    //…
  });
  </script>
</body>
</html>
