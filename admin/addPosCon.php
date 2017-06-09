<?php
include  "../public/db.php";
$posname=$_GET["posname"];

$sql="insert into position (posname) VALUES ('{$posname}')";
$db->query($sql);
if($db->affected_rows>0){
    echo "<script>alert('成功');location.href='addPos.php';</script>";
}