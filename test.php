<?php include('config.php'); ?>
<?php include('head.php'); ?>
<?php
$count="SELECT count(*) AS count FROM talk WHERE hide=1 and id!=32 ";
$count=$db->getRow($count);
$count=$count['count'];//取出数据总条数

$num=5; //设定每页显示多少条数据

$pages=ceil($count/$num);//算总页数 并向上取值
if(isset($_GET['page']) ){
  $page=intval($_GET['page']);
}else{
  $page=1;
}
$apage=($page-1)*$num;

$pagerows="SELECT * FROM talk LIMIT $apage,$num";
$pagerows=$db->getRows($pagerows);
foreach($pagerows as $row){
  echo $row['id'].'</br>';
  echo $row['name'].'</br>';
  echo $row['text'].'</br>';
}
$pageup=$page-1;
$pagedown=$page+1;
echo $firstpage=($page<=1)?"<b>[首页]</b>":'[<a href="test.php?page=1">首页</a>]'; ?>
<?php echo $up=($page<=1)?"上一页":'  <a href="test.php?page='. $pageup.' ">上一页</a>'; ?>
<?php for($i=1;$i<=$pages;$i++){
  echo $pagenum=($page!=$i)?'<a href="test.php?page='.$i.'">'.$i.'</a>': '<b>'.$i.'</b>';
}
?>
<?php echo $up=($page>=$pages)?"下一页":'  <a href="test.php?page='. $pagedown.'">下一页</a>'; ?>

<?php   echo $lastpage=($page>=$pages)?"<b>[末页]</b>":'<a href="test.php?page='.$pages.'">[末页]</a>'; ?>
<form action="" method="get">
  <input type="text"  name="page" class="layui-input-inline">
  <input type="submit" value="跳转">
</form>
