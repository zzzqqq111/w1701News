<?php
$id=$_GET["id"];
$cid=$_GET["cid"];
$title=$_GET["title"];
$con=$_GET["con"];
$imgurl=$_GET["imgurl"];
$keywords=$_GET["keywords"];
$posid=implode(",",$_GET["posid"]);

include "../public/db.php";

$sql="update lists set title='{$title}',con='{$con}',imgurl='{$imgurl}',posid='{$posid}',keywords='{$keywords}' where id={$id}";

if($db->query($sql)){
  echo "<script>alert('修改成功');location.href='show.php?id={$cid}'</script>";
}



