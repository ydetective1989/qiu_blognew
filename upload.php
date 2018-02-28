<?php
header("Content-type:text/html;charset=utf-8");
date_default_timezone_set("Asia/Shanghai");
include "fileupload.class.php";

    $up = new fileupload();
    //设置属性（上传的位置、大小、类型、设置文件名是否要随机生成）
  

    //使用对象中的upload方法，上传文件，方法需要传一个上传表单的名字name：pic
    //如果成功返回true，失败返回false
if($_POST){
    if($up->upload("pic")){
        echo '<pre>';
        //获取上传成功后文件名字
        var_dump($up->getFileName());
        echo '</pre>';

    }else{
        echo '<pre>';
        //获取上传失败后的错误提示
        var_dump($up->getErrorMsg());
        echo '<pre/>';
    }
  }else{?>
    <form action="upload.php" method="post" enctype="multipart/form-data" >
    name:<input type="text" name="username" value="" /><br/>
    <input type="hidden" name="MAX_FILE_SIZE" value="1000000" />
    up pic:<input type="file" name="pic[]" value=""><br/>
    up pic:<input type="file" name="pic[]" value=""><br/>
    up pic:<input type="file" name="pic[]" value=""><br/>
    up pic:<input type="file" name="pic[]" value=""><br/>

    <input type="submit" value="upload" /><br/>
</form>
  <?php
}
?>
