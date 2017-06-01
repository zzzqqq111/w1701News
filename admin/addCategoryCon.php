<?php
include "../public/db.php";
$pid=$_GET["pid"];
$catname=$_GET["catname"];
$sql="insert into category (catname,pid) VALUES ('{$catname}',{$pid})";
$db->query($sql);
if($db->affected_rows>0){
    echo "<script>alert('success!');location.href='addCategory.php'</script>";
}
