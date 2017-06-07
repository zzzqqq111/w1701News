<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!--

      新闻
      前端怎么做 ,需求

       过程化的历练
       m v c
       困难

         php的基本语法
             |
            mysql

             |

            ajax

             |

   php 过程化的方式
                javascript  事件流->事件委派
   可编辑的表格  1.  对比   ajax
                2.  php操作数据的流程  增删改查

    新闻发布系统    ->对数据增删改查


   1.  前台发起请求    input  type=file

   2.  后台处理请求    php

    -->
</head>
<body>
<?php
include  "../public/db.php";
 $id=$_GET["id"];
 $sql="select * from lists where id={$id}";
 $result=$db->query($sql);
$row=$result->fetch_assoc();
?>
   <h1>
        <?php echo $row["title"]?>
   </h1>
   <p>
       <?php echo $row["con"]?>
   </p>
</body>
</html>