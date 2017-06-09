<?php

$id=$_GET["id"];

include  "../public/db.php";
$sql="update lists set imgurl='' where id={$id}";

$db->query($sql);

if($db->affected_rows>0){
    echo "ok";
}