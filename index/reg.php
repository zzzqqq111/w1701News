<?php
session_start();
if(isset($_SESSION["agian"])){
    echo "<script>location.href='index.php'</script>";
    exit();
}
?>
<!DOCTYPE html>
<html class="ui-page-login">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
    <title></title>
    <link href="../static/css/mui.min.css" rel="stylesheet" />
    <link href="../static/css/style.css" rel="stylesheet" />
    <script src="../static/js/jquery.js"></script>
    <script src="../static/js/jquery.validate.js"></script>
    <script src="../static/js/jquery.metadata.js"></script>
    <style>
        .area {
            margin: 20px auto 0px auto;
        }

        .mui-input-group {
            margin-top: 10px;
        }

        .mui-input-group:first-child {
            margin-top: 20px;
        }

        .mui-input-group label {
            width: 22%;
        }

        .mui-input-row label~input,
        .mui-input-row label~select,
        .mui-input-row label~textarea {
            width: 78%;
        }

        .mui-checkbox input[type=checkbox],
        .mui-radio input[type=radio] {
            top: 6px;
        }

        .mui-content-padded {
            margin-top: 25px;
        }

        .mui-btn {
            padding: 10px;
        }

        .link-area {
            display: block;
            margin-top: 25px;
            text-align: center;
        }

        .spliter {
            color: #bbb;
            padding: 0px 8px;
        }

        .oauth-area {
            position: absolute;
            bottom: 20px;
            left: 0px;
            text-align: center;
            width: 100%;
            padding: 0px;
            margin: 0px;
        }

        .oauth-area .oauth-btn {
            display: inline-block;
            width: 50px;
            height: 50px;
            background-size: 30px 30px;
            background-position: center center;
            background-repeat: no-repeat;
            margin: 0px 20px;
            /*-webkit-filter: grayscale(100%); */
            border: solid 1px #ddd;
            border-radius: 25px;
        }

        .oauth-area .oauth-btn:active {
            border: solid 1px #aaa;
        }

        .oauth-area .oauth-btn.disabled {
            background-color: #ddd;
        }
    </style>
    <script>

       $(function(){
           $("#login-form").validate({
                rules:{
                    mname:{
                        required:true,
                        minlength:6,
                        remote:{
                            url:"checkname.php",
                            type:"post",
                            dataType:"json",
                            data:{
                                mname:function(){
                                    return $("#account").val()
                                }
                            }
                        }
                    },
                    mpass:{
                        required:true,
                        minlength:6,
                    },
                    mpass1:{
                        required:true,
                        minlength:6,
                        equalTo:"#password"

                    }
                },
                messages:{
                    mname: {
                        required: "必填",
                        minlength:"不能少于6位",
                        remote:"用户名已存在"
                    },
                    mpass:{
                        required:"密码必填",
                        minlength:"密码不能少于6位",
                    },
                    mpass1:{
                        required:"密码必填",
                        minlength:"密码不能少于6位",
                        equalTo:"两次密码要一致"
                    }
                }
           })
       })

    </script>
    <style>
        .mui-input-row{
            position: relative;
        }
        label[generated].error{
            position: absolute;
            right:0px;
            width:200px;
            color:red;
            text-align: right;

        }
    </style>
</head>

<body>
<header class="mui-bar mui-bar-nav">
    <a class="mui-icon mui-icon-home mui-pull-left" href="index.php"></a>
    <h1 class="mui-title">注册</h1>
</header>
<div class="mui-content">
    <form id='login-form' class="mui-input-group" action="addReg.php" name="abc" method="post">
        <div class="mui-input-row">
            <label>账号</label>
            <input id='account' type="text" class="mui-input-clear mui-input" placeholder="请输入账号" name="mname">
        </div>
        <div class="mui-input-row">
            <label>密码</label>
            <input id='password' type="password" class="mui-input-clear mui-input" placeholder="请输入密码" name="mpass">
        </div>
        <div class="mui-input-row">
            <label>确认密码</label>
            <input id='password1' type="password" class="mui-input-clear mui-input" placeholder="再次输入密码" name="mpass1">
        </div>
        <div class="mui-input-row">
            <label>验证码</label>
            <input id='password2' type="password" class="mui-input-clear mui-input" placeholder="请输入密码">
        </div>
        <div class="mui-content-padded">
            <button id='login' class="mui-btn mui-btn-block mui-btn-primary" type="submit">注册</button>
            <div class="link-area"><a id='reg' href="login.php">已有账号，直接登录</a> <span class="spliter">|</span> <a id='forgetPassword'>忘记密码</a>
            </div>
        </div>
    </form>

    <div class="mui-content-padded oauth-area">

    </div>
</div>

</body>

</html>