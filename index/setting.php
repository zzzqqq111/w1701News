<?php
 session_start();
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
    <script>
        window.onload=function () {
            var back=document.querySelector(".back");
            back.onclick=function(){
                history.back();
            }
        }
    </script>
</head>
<body>
<header class="mui-bar mui-bar-nav">
    <a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left back"></a>
    <h1 class="mui-title">设置</h1>
</header>

<div class="mui-content">
    <ul class="mui-table-view">
      <?php
        if(isset($_SESSION["memberlogin"])) {

            ?>
            <li class="mui-table-view-cell">
                <a class="mui-navigate-right" href="member.php">
                    个人中心
                </a>
            </li>

            <li class="mui-table-view-cell">
                <a class="mui-navigate-right" href="login.php">
                    上传头像
                </a>
            </li>
            <li class="mui-table-view-cell">
                <a class="mui-navigate-right" href="logout.php">
                    退出登陆
                </a>
            </li>

            <?php
        }else {
            ?>
            <li class="mui-table-view-cell">
                <a class="mui-navigate-right" href="login.php">
                    登陆
                </a>
            </li>
            <li class="mui-table-view-cell">
                <a class="mui-navigate-right" href="reg.php">
                    注册
                </a>
            </li>
            <?php
        }
        ?>
    </ul>
</div>

</body>
</html>