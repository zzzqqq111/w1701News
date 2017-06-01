<?php
include "../public/db.php";
include "../public/tree.php";
$id=$_GET["id"];
$obj= new tree();
$obj->del($id,$db,"category");