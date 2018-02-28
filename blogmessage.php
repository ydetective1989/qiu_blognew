<?php include("config.php");?>
<?php include("head.php"); ?>
<?php
if(isset($_COOKIE['user'])){
  $name=$_COOKIE['user'];
$count="SELECT count(*) as total FROM talk WHERE name='$name' AND hide=1 AND reading=1";
$count=$db->getRow($count);
$count=$count['total'];

}
