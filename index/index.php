<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .menu{
            width:800px;
            height:30px;
            margin:auto;
            display: flex;
            justify-content: space-around;
            align-items: center;
        }

    </style>
</head>
<body>
    <?php
      include "../public/db.php";
      $sql="select * from category where pid=0";
      $result=$db->query($sql);

    ?>
      <div class="menu">
          <a href="">

              首页
          </a>

          <?php
           while ($row=$result->fetch_assoc()) {
               ?>
               <a href="">

                   <?php
                     echo $row["catname"];
                   ?>
               </a>
               <?php
           }
          ?>


      </div>

    <div class="more">
       <div class="header">
           <span>行政管理</span>
           <a href="">更多</a>
       </div>
        <?php
          $sql="select * from lists where cid=5";
        $result=$db->query($sql);
        ?>
       <ul>
           <?php
             while ($row=$result->fetch_assoc()) {
                 ?>
                 <li>
                     <a href="show.php?id=<?php echo $row['id']?>">
<?php
 echo $row["title"]
?>
                     </a>
                 </li>
                 <?php
             }
         ?>
       </ul>
    </div>
</body>
</html>