<?php
include "../public/db.php";
$id=$_GET["id"];
$cid=$_GET["cid"];
$sql="delete from lists where id=".$id;
$db->query($sql);
if($db->affected_rows>0){
    echo "<script>alert('删除成功');location.href='show.php?id={$cid}'</script>";

}