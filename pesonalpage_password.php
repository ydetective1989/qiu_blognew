<?php include("head.php"); ?>
<?php if(isset($_COOKIE['user'])){
  if($_POST){
    $password=$_POST['password'];
    $name=$_COOKIE["user"];
    $arr = array("password"=>$password);
    $where = array("name" => $name);
    $db->update("user",$arr,$where);
   echo "<script>alert('修改成功');history.go(-1);location.reload()</script>";
}else{?>
  <div style="margin-top:250px;margin-left:70px">
    <fieldset >
    <form id="passwrod"  class="layui-form"  method="post">
       <div class="layui-form-item">
           <label class="layui-form-label">请输入密码</label>
           <div class="layui-input-inline">
             <input type="password" name="password" id="password" required lay-verify="required" placeholder="请输入密码" autocomplete="off" class="layui-input">
           </div>
           <label class="layui-form-label">请确认密码</label>
           <div class="layui-input-inline">
             <input type="password" name="confirm" required lay-verify="required|regPwd" placeholder="再次输入密码" autocomplete="off" class="layui-input">
           </div>
       </div>
       <div class="layui-form-item">
         <div class="layui-input-block">
           <button class="layui-btn"  lay-submit lay-filter="formDemo" >立即提交</button>
           <button type="reset"  class="layui-btn layui-btn-primary">重置</button>

         </div>
       </div>
     </form>
   </fieldset>
</div>
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
  echo"请登录";
}
