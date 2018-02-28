<?php include("config.php"); ?>
<?php include("head.php"); ?>
<?php
if(isset($_COOKIE['user'])){
  $name=$_COOKIE['user'];
$check="SELECT name FROM user WHERE name='$name' AND hide=1";
$check=$db->getRow($check);
if($check){
$pesonal="SELECT * FROM user WHERE name='$name'";
$pesonal=$db->getRow($pesonal);
  $username=$pesonal['name'];
  $sex=$pesonal['sex'];
  $phone=$pesonal['phone'];
  $email=$pesonal['email'];
  ?>
  <table class="layui-table" lay-even="" lay-skin="nob">
  <colgroup>
    <col width="150">
    <col width="150">
    <col width="200">
    <col>
  </colgroup>
  <thead>
    <tr>
      <th>姓名</th>
      <th>性别</th>
      <th>email</th>
      <th>电话</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td><?php echo $username;?></td>
      <td><?php echo $sex ;?></td>
      <td><?php echo $email ;?></td>
      <td><?php echo $phone ;?></td>
    </tr>
</tbody>
</table>
<?php
}else{
  echo"此帐号已被封停";
}
}else{
  echo"请登录";
}
?>
