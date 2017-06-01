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
  include  "../public/db.php";
  include "../public/tree.php";
  $id=$_GET["id"];
  $sql="select * from category where id=".$id;
  $result=$db->query($sql);

  $row=$result->fetch_assoc();




?>
<form action="editCategoryCon.php">
    所属分类:<select name="pid" id="">
        <option value="0">一级分类</option>
        <?php
        $obj=new tree();
        $obj->getTree(0,0,"┗",$db,"category",$id);
        echo $obj->str;

        ?>
    </select><br>
    分类名字: <input type="text" name="catname" value="<?php echo $row['catname']?>"><br>
    <input type="hidden" name="id" value="<?php echo $id?>">
    <input type="submit" value="修改">
</form>
</body>
</html>