<?php
  header("content-type:text/html;charset=utf-8");
  session_start();

$url=($_SERVER["PHP_SELF"]);
$pos=strrpos($url,"/");

$index=md5(substr($url,0,$pos));
  include "../public/db.php";
  $uname=$_POST["uname"];
  $upass=md5($_POST["upass"]);

  $sql="select * from user";
  $result=$db->query($sql);

  while ($row=$result->fetch_assoc()){
        if($row["uname"]==$uname){
            if($row["upass"]==$upass){

                $_SESSION[$index]="yes";
                $_SESSION["uname"]=$uname;
                $_SESSION["uid"]=$row["uid"];

                echo "<script>alert('登录成功');location.href='main.php'</script>";
                exit;
            }
        }
  }

echo "<script>alert('登录失败');location.href='login.php'</script>";

?>