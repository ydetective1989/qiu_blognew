<?php include("config.php"); ?>
<?php include("head.php"); ?>
<?php if(isset($_COOKIE['user'])){
  if($_POST){
    $phone=$_POST['phone'];
    $name=$_COOKIE["user"];
    $check="SELECT * FROM user WHERE phone='$phone' ";
    $check=$db->getRow($check);
    if($check){
       echo "<script>alert('手机号已存在');history.go(-1);location.reload()</script>";
       return;
    }else{
    $arr = array("phone"=>$phone);
    $where = array("name" => $name);
    $db->update("user",$arr,$where);
   echo "<script>alert('修改成功');history.go(-1);location.reload()</script>";
}
}else{?>
  <form id="passwrod"  class="layui-form"  method="post">
    <div style="margin-top:250px;margin-left:70px">
      <fieldset >
     <div class="layui-form-item">
         <label class="layui-form-label">手机号</label>
         <div class="layui-input-inline">
           <input type="text" name="phone" id="phone" required lay-verify="required|phone" placeholder="请输入手机号" autocomplete="off" class="layui-input">
         </div>
     </div>
     <div class="layui-form-item">
       <div class="layui-input-block">
         <button class="layui-btn"  lay-submit lay-filter="formDemo" >立即提交</button>
         <button type="reset"  class="layui-btn layui-btn-primary">重置</button>

       </div>
     </div>
   </fieldset>
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
     })
   })
   </script>
<?php
  }
   }else{
  echo"还未登录" ;
  }
  ?>
