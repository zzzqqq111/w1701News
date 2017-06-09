<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="../static/js/upload.js"></script>
</head>
<body>
<?php
 include "../public/db.php";
 $sql="select * from category";
 $result=$db->query($sql);
?>
<form action="addCategoryCon.php">
   所属分类： <select name="pid" id="">
               <option value="0">一级分类</option>
              <?php
                  include "../public/tree.php";
                  $obj=new tree();
                  $obj->getTree(0,0,"┗",$db,"category");
                  echo $obj->str;

              ?>


              </select><br>
   分类名称： <input type="text" name="catname"><br>
   是否在显示：
    显示：<input type="radio" name="isshow" value="0" checked>
    不显示：<input type="radio" name="isshow" value="1">
    <input type="hidden" name="catimg">
    <br>
       <div class="uploadbox"></div>
    <input type="submit" value="添加">
</form>
<script>
    var obj=new upload();
    obj.size=1024*1024*12;
    obj.createView({
        parent:document.querySelector(".uploadbox")
    })
    obj.up("upCatImg.php",function(e){
        document.querySelector("input[name=catimg]").value=e;
    });
</script>
</body>
</html>