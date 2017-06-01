<?php
header("content-type:text/html;charset=utf8");
session_start();
if(!isset($_SESSION["login"])){
    echo "<script>alert('请先登录');location.href='login.php'</script>";

    exit;
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


    <style>
        html,body{
            width:100%;height:100%;
        }
        body{
            padding:0;margin:0;
            overflow: hidden;
        }
        header{
            width:100%;height:20%;
            border-bottom: 2px solid #000;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 30px;

        }
        .box{
            width:100%;height:80%;
        }
        .box .left{
            float:left;
            width:20%;height:100%;
            border-right:2px solid #000;
            box-sizing: border-box;
        }
        .box .right{
            float:left;
            width:80%;height:100%;
        }
        iframe{
            width:100%;height:100%;
        }
    </style>
</head>
<body>
    <header>
        欢迎xxx来到新闻管理系统

        <span>
            <a href="logout.php">安全退出</a>
        </span>
    </header>
    <div class="box">
        <div class="left">
            <ul>
                    <li>
                        <a href="javascript:;">分类管理</a>
                        <ul>
                            <li>
                                <a href="addCategory.php" target="iframe">添加分类</a>
                            </li>

                            <li>
                                <a href="showCategory.php" target="iframe">查看分类</a>
                            </li>
                        </ul>
                    </li>
            </ul>
        </div>
        <div class="right">
            <iframe src="welcome.html" frameborder="0" name="iframe">

            </iframe>
        </div>
    </div>

</body>
</html>