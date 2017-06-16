<?php
session_start();
$url=($_SERVER["PHP_SELF"]);
$pos=strrpos($url,"/");

$index=md5(substr($url,0,$pos));

if(isset($_SESSION[$index])){
    echo "<script>alert('已登录');location.href='main.php'</script>";
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="checkLogin.php" method="post">
     用户名: <input type="text" name="uname"><br>
     密码: <input type="password" name="upass"><br>
       <input type="submit" value="提交">
</form>
</body>
</html>