<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
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
    <input type="submit" value="添加">
</form>
</body>
</html>