<?php include("config.php"); ?>
<?php include("head.php"); ?>
<?php if(isset($_COOKIE['user'])){
  if($_POST){
    $pwqs=$_POST['question'];
    $pwas=$_POST['qanswer'];
    $name=$_COOKIE["user"];
    $arr = array(
      'pwas'=>$pwas,
      'pwqs'=>$pwqs
    );
    $where=array(
      'name'=>$name
    );
   $db->update("user",$arr,$where);
   echo "<script>alert('修改成功');history.go(-1);location.reload()</script>";
  }else{?>
<form  id="qanswer" class="layui-form" method="post">
  <div style="margin-top:250px;margin-left:70px">
    <fieldset >
     <div class="layui-form-item">
     <label class="layui-form-label">密保问题</label>
     <div class="layui-input-block">
       <select name="question" lay-verify="required">
         <option value=""></option>
         <option value="1">我第一次坐飞机是去哪里？</option>
         <option value="2">我父亲的生日？</option>
         <option value="3">我母亲的生日？</option>
         <option value="4">我养的第一只宠物叫什么？</option>
         <option value="5">我小学的学校叫什么名字？</option>
         <option value="6">我最喜欢的城市？</option>
       </select>
         <input type="text" name="qanswer" required  lay-verify="required" placeholder="请输入问题答案" autocomplete="off" class="layui-input">
     </div>
      <div class="layui-form-item">
        <div class="layui-input-block">
          <button class="layui-btn"  lay-submit lay-filter="formDemo" >立即提交</button>
          <button type="reset"  class="layui-btn layui-btn-primary">重置</button>
        </div>
</div>
</div>
</div>
</fieldset>
</div>
</form>

    <script>
    layui.use(['form', 'jquery'], function() {
      var $ = layui.jquery;
      var form = layui.form();
          })
    </script>
    </form>
  <?php }
     }else{
    echo"请登录";
  }?>
