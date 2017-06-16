<?php
 session_start();
header("content-type:text/html;charset=utf-8");
if(isset($_SESSION["agian"])){
    echo "<script>location.href='index.php'</script>";
    exit();
}

include "../public/db.php";
 include "../public/select.php";
 $mname=$_POST["mname"];
 $mpass=$_POST["mpass"];


 $arr=select($db);

 foreach ($arr as $v){
     if($v["mname"]==$mname){
         if($v["mpass"]==md5($mpass)){
            $_SESSION["memberlogin"]="yes";
            $_SESSION["agian"]="yes";
            $_SESSION["mname"]=$mname;
            $_SESSION["mid"]=$v["mid"];
            $_SESSION["mphoto"]=$v["mphoto"];
            if(isset($_SESSION["url"])){
                $url=$_SESSION["url"];
            }else{
                $url="index.php";
            }
             echo "<script>alert('登陆成功');location.href='{$url}'</script>";
             exit();
         }
     }
 }
echo "<script>alert('登陆失败');location.href='login.php'</script>";



