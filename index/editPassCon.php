<?php
session_start();
if(!isset($_SESSION["memberlogin"])){

    echo "<script>alert('请登陆');location.href='login.php'</script>";
    exit();
}

$mid=$_SESSION["mid"];
$oldp=$_POST["oldp"];
$mpass=$_POST["mpass"];
$mpass1=$_POST["mpass1"];
if($oldp==$mpass){
    foreach ($_SESSION as $k=>$v){
        unset($_SESSION[$k]);
    }
    echo "ok";
    exit();
}
include "../public/db.php";
$sql="select mpass from member where mid={$mid}";

$result=$db->query($sql);
$info=$result->fetch_assoc();

if(md5($oldp)==$info["mpass"]){
    $mpass=md5($mpass);
    $sql="update member set mpass='{$mpass}' where mid={$mid}";
    $db->query($sql);
    if($db->affected_rows>0){

        foreach ($_SESSION as $k=>$v){
            unset($_SESSION[$k]);
        }

        echo "ok";
    }

}else{
   echo "error";
}

