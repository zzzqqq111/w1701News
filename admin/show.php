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
  $id=$_GET["id"];
?>
    <div class="opt">
        <a href="addConCon.php?cid=<?php echo $id ?>">添加内容</a>
    </div>
<?php
  include  "../public/db.php";
  $sql="select * from lists where cid=".$id;
  $result=$db->query($sql);
  if(mysqli_num_rows($result)>0) {
      ?>
      <table>
          <tr>
              <th>标题</th>
              <th>缩略图</th>
              <th>位置信息</th>
              <th>操作</th>
          </tr>
          <?php
           while($row=$result->fetch_assoc()) {
               ?>
               <tr>
                   <td>
                       <?php
                         echo $row["title"];
                       ?>
                   </td>
                   <td>

                       <img src="<?php
                       echo $row["imgurl"];
                       ?>" alt="" width="100">

                   </td>
                   <td>
                       <?php
                         echo $row["posid"];
                       ?>
                   </td>
                   <td>
                       <a href="delCon.php?id=<?php echo $row['id']?>&cid=<?php echo $row['cid']?>" >删除</a>
                       <a href="editCon.php?id=<?php echo $row['id']?>&cid=<?php echo $row['cid']?>">编辑</a>
                   </td>
               </tr>
               <?php
           }
          ?>
      </table>
      <?php
  }else {
      ?>
   没有任何内容
      <?php
  }
?>
</body>
</html>