<?php
include "../public/db.php";
$pid=$_GET["pid"];
$catname=$_GET["catname"];
$isshow=$_GET["isshow"];
$catimg=$_GET["catimg"];
$sql="insert into category (catname,pid,isshow,catimg) VALUES ('{$catname}',{$pid},{$isshow},'{$catimg}')";
$db->query($sql);
if($db->affected_rows>0){
    echo "<script>alert('success!');location.href='addCategory.php'</script>";
}
