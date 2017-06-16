
<?php
  include "../public/db.php";
 $cid=$_GET["cid"];
 $title=$_GET["title"];
 $con=$_GET["con"];
 $imgurl=$_GET["imgurl"];
 $keywords=$_GET["keywords"];
 $posid=implode(",",$_GET["posid"]);




  $sql="insert into lists (title,con,cid,imgurl,posid,keywords) VALUES ('{$title}','{$con}',$cid,'{$imgurl}','{$posid}','{$keywords}')";
  $db->query($sql);
  if($db->affected_rows>0){
      echo "<script>alert('添加成功');location.href='addConCon.php?cid={$cid}'</script>";
  }
?>