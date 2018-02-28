<?php include('config.php'); ?>
<?php
if(isset($_COOKIE['user'])){
  $name=$_COOKIE['user'];
if(isset($_GET['id'])){
$id=$_GET['id'];
$check="SELECT * FROM editor WHERE  id='$id' AND username='$name' ";
$check=$db->getRow($check);
if($check){
if($_POST){
  $title=$_POST['title'];
  $blogtext=$_POST['blogtext'];
  $arr = array(
    "title" => $title,
    "blogtext" => $blogtext
  );
  $where = array(
    "id" => $id
  );
  $db -> update("editor",$arr,$where);
  echo "<script>alert('恢复成功');history.go(-1);location.reload()</script>";
}else{
  $mysql="SELECT * FROM editor WHERE id='$id' AND hide=1 ";
  $rows  = $db->getRows($mysql);
  if($rows){
  foreach($rows as $row){
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

   <div id="editor">
     <form class="layui-form" action="" method="post" id="registerform">
     <div class="layui-form-item">
       <label class="layui-form-label">文章标题</label>
       <div class="layui-input-block">
         <input type="text" name="title" required  lay-verify="required" value="<?php echo $row['title']; ?>" autocomplete="off" class="layui-input">
       </div>
     </div>
     <div>
       <textarea id="demo" name="blogtext"   style="display: none;"><?php echo $row['blogtext']; ?></textarea>

   <script>
   layui.use('layedit', function(){
   var layedit = layui.layedit;
   layedit.build('demo',{
     height:300,

   }
   ); //建立编辑器
   });
   </script>
     </div>

     <div class="layui-form-item">
       <div class="layui-input-block">
         <button id="send" class="layui-btn"  lay-submit lay-filter="formDemo" onclick="loadphp()" >立即提交</button>
         <button type="reset"  class="layui-btn layui-btn-primary">重置</button>
       </div>
     </div>
   </form>

   <script>
   layui.use(['form', 'jquery'], function() {
     var $ = layui.jquery;
     var form = layui.form();
     form.verify({
       regPwd: function(value) {
         //获取密码
         var pwd = $("#password").val();
         if(!new RegExp(pwd).test(value)) {
           return '两次输入的密码不一致';
         }
       }
     });
   });
   </script>
   </div>

 <?php }
 }else{
   echo"文章不存在";
 }
}//判断post

}else{
   echo"不是你的文章";
}
}else{
  echo"文章不存在";
}
}else{
 echo"还未登录";
 return;
}?>
