<?php
session_start();
if(!isset($_SESSION["memberlogin"])){
    echo "<script>alert('请登陆');location.href='login.php'</script>";
    exit();
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
    <script src="../static/js/jquery.js"></script>
    <link rel="stylesheet" href="../static/css/mui.min.css">
    <script>
        window.onload=function(){
            document.querySelector(".back").onclick=function () {
                history.back();
            }
        }
    </script>
</head>
<body>
<header class="mui-bar mui-bar-nav">
    <a class="mui-icon mui-icon-left-nav mui-pull-left back"></a>
    <h1 class="mui-title">
        留言
    </h1>
</header>

<!--
  谁的留言       session
  给哪篇文章写的    get
  时间
  内容
-->
<div class="mui-content">

    <textarea name="" id="" cols="30" rows="10"></textarea>

    <button id='login' class="mui-btn mui-btn-block mui-btn-primary" type="submit" style="position: fixed;bottom: 0" mid="<?php echo $_SESSION['mid']?>" lid="<?php echo $_GET['lid']?>">发布</button>
</div>
<script>
    $("button").click(function(){
        var mid=$(this).attr("mid");
        var lid=$(this).attr("lid");
        var con=$("textarea").val();
        $.ajax({
            url:"writeMessageCon.php",
            type:"post",
            data:{
                mid:mid,lid:lid,con:con
            },
            success:function(e){

                if(e=="ok"){
                    $("textarea").val("");
                    alert("留言成功");
                }
            }
        })
    })
</script>
</body>
</html>