<?php
session_start();
$mid=$_SESSION["mid"];
$mphoto=$_GET["mphoto"];
include  "../public/db.php";
$sql="update member set mphoto='{$mphoto}' where mid={$mid}";

$db->query($sql);
if($db->affected_rows>0){
    echo "ok";
}