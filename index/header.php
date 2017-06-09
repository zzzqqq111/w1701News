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
            padding:0;margin:0;
        }
        header{
            width:100%;height:100px;
            background:#eee;
        }
        nav{
            width:100%;background:#037DCE;
            height:40px;position: relative;
            z-index: 100;
        }
        ul,li{
            padding:0;margin:0;list-style: none;
        }
        .box{
            width:1000px;margin:auto;
            height:100%;
        }
        a{
            text-decoration: none;
            color:#000;
        }
        .opt{
            padding:0 10px;float: left;
            position: relative;
            line-height: 40px;
        }
        .son {
            background:#ccc;
            left:0;top:40px;
            line-height: 20px;
            display: none;
            position: absolute;
        }
        .son .sonlist{
            padding:5px;
        }
    </style>
    <script src="../static/js/jquery.min.js"></script>
    <script>
        $(function(){
            $(".opt").hover(function(){
                // $(this).next(".son").stop(true);
                $(this).find(".son").slideDown(200);
            },function(){
                //$(this).next(".son").stop(true);
                $(this).find(".son").slideUp(200);
            })
        })
    </script>
</head>
<body>

<header>
</header>
<nav>
    <ul class="box">
        <li class="opt">
            <a href="index.php">首页</a>
        </li>
        <?php
        /*
         *     频道页  分类页  逻辑是一样
         *     列表页
         *     详情页  内容页
         * */
        include "../public/db.php";

        $sql="select * from category where pid=0 and isshow=0";
        $result=$db->query($sql);
        while($row=$result->fetch_assoc()) {
            ?>
            <li class="opt">
                <a href="category.php?id=<?php echo $row['id']?>"><?php  echo $row["catname"]?></a>
                <ul class="son">
                    <?php
                    $sql="select * from category where pid=".$row["id"]."  and isshow=0";
                    $result1=$db->query($sql);
                    while($row1=$result1->fetch_assoc()) {
                        ?>
                        <li class="sonlist">
                            <a href="list.php?cid=<?php echo $row1['id']?>">
                                <?php
                                echo $row1["catname"]
                                ?>
                            </a>
                        </li>
                        <?php
                    }
                    ?>
                </ul>
            </li>
            <?php
        }
        ?>
    </ul>
</nav>