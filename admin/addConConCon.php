
<?php
  include "../public/db.php";
 $cid=$_GET["cid"];
 $title=$_GET["title"];
 $con=$_GET["con"];
  $sql="insert into lists (title,con,cid) VALUES ('{$title}','{$con}',$cid)";
  $db->query($sql);
  if($db->affected_rows>0){
      echo "<script>alert('添加成功');location.href='addConCon.php?cid={$cid}'</script>";
  }
?>