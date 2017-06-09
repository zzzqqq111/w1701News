<?php
 include  "header.php";
?>
<style>
    .con{
        width:1000px;
        margin:auto;
    }
</style>
   <div class="con">
    <?php
      $id=$_GET["id"];
      include  "../public/db.php";
      $sql="select con from lists where id={$id}";
      $result=$db->query($sql);
      $row=$result->fetch_assoc();

      echo $row["con"];
    ?>
   </div>
</body>
</html>