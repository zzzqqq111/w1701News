<?php
  include "header.php";
?>
<style>
    .category{
        width:1000px;
        margin:auto;
        overflow: hidden;
    }
    .categoryList{

        width:230px;height:230px;
        border:1px solid #ccc;
        text-align: center;
        line-height: 230px;
        float: left;
        margin:5px 9px;
    }
</style>


<div class="category">
    <?php

      //具有同样逻辑的页面  不是指同样样式的页面
      include "../public/db.php";
      $id=$_GET["id"];
      $sql="select * from category where pid=".$id;

      $result=$db->query($sql);
      while ($row=$result->fetch_assoc()) {
          ?>
          <a href="list.php?cid=<?php echo $row['id']?>" class="categoryList" style="background-image:url(../admin/<?php echo $row['catimg']?>);background-size: cover">

             <?php
               echo $row["catname"]
             ?>
          </a>

          <?php
      }
    ?>

</div>
</body>
</html>
