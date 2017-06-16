<?php
session_start();
header("Content-Type:text/html;charset=utf-8");
include "../public/db.php";
include "../public/select.php";
$mname=$_POST["mname"];
$mpass=$_POST["mpass"];
$mpass1=$_POST["mpass1"];
if(isset($_SESSION["agian"])){
    echo "<script>location.href='index.php'</script>";
    exit();
}
/*
 *
 * */
if(empty($mname)||empty($mpass)||empty($mpass1)||$mpass!=$mpass1){
    echo "<script>location.href='reg.php'</script>";
    exit();
}
if(checkname($db)=="false"){
    echo "<script>location.href='reg.php'</script>";
    exit();
}
$mpass=md5($mpass);

$sql="insert into member (`mname`,`mpass`) VALUES ('{$mname}','{$mpass}')";

$db->query($sql);

if($db->affected_rows>0){

    echo "<script>alert('注册成功');location.href='login.php'</script>";
}

