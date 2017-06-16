<?php
$mid=$_POST["mid"];
$lid=$_POST["lid"];
$con=$_POST["con"];
include "../public/db.php";
$sql="insert into message (mid,lid,con) VALUES ($mid,$lid,'{$con}')";

$db->query($sql);
if($db->affected_rows>0){
    echo "ok";
}