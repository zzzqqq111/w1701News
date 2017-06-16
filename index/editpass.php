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
    <link rel="stylesheet" href="../static/css/mui.min.css">
    <script src="../static/js/jquery.js"></script>
</head>
<body>
<header class="mui-bar mui-bar-nav">
    <a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left back"></a>
    <h1 class="mui-title">修改密码</h1>
</header>
<div class="mui-content">
    <form id='login-form' class="mui-input-group" action="editPassCon.php" method="post">
        <div class="mui-input-row">
            <label>旧密码</label>
            <input  type="text" class="mui-input-clear mui-input" placeholder="请输入旧密码" name="oldpass">
        </div>
        <div class="mui-input-row">
            <label>新密码</label>
            <input type="text" class="mui-input-clear mui-input" placeholder="请输入新密码" name="mpass">
        </div>

        <div class="mui-input-row">
            <label>确认密码</label>
            <input type="text" class="mui-input-clear mui-input" placeholder="再次输入密码" name="mpass1">
        </div>
        <div class="mui-input-row">
        <button  class="mui-btn mui-btn-block mui-btn-primary" type="button">提交</button>
        </div>
    </form>
    <script>
        $("button").click(function(){
             var oldp=$("input[name=oldpass]").val();
             var mpass=$("input[name=mpass]").val();
             var mpass1=$("input[name=mpass1]").val();
             $.ajax({
                 url:"editPassCon.php",
                 type:"post",
                 data:{
                     oldp:oldp,mpass:mpass,mpass1:mpass1
                 },
                 success:function(e){
                    if(e=="ok"){
                        $("input[name=oldpass]").val("");
                        $("input[name=mpass]").val("");
                        $("input[name=mpass1]").val("");
                        alert("修改成功");

                        location.href="login.php";
                    }else if(e=="error"){
                        $("input[name=oldpass]").val("");
                        $("input[name=mpass]").val("");
                        $("input[name=mpass1]").val("");
                        alert("修改失败");

                    }
                 }
             })
        })


    </script>
</div>
</body>
</html>