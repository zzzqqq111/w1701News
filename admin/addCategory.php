<!doctype html>
<html lang="en">
<head>
    //淘宝购物  登陆  只需要登陆一次
       鞋  - 登陆
       衣服 - 登陆  b/s     协议 http

    //  无状态的协议   他只负责接收和响应用户的请求，不负责记录用户的状态  http

    // 接收  响应

    // 淘宝  ->登陆  ->鞋
    // 衣服  ->登陆 ->不需要登陆
    // 记录用户的状态  ->  http 冲突
    // 新的规则  cookie -> session  争议      可以写 4k   避免恶意的操作

    //  cookie 是怎么样保存信息的

        // http
        1.  服务器会给客户端保存在硬盘上一些指定的信息
        2.  客户端每一次向服务器发起请求的时候都会携带 cookie的值

        3.  服务器会接收每一次客户端发送过来的cookie值，然后来判断状态



       1. cookie

       带着钱->银行-> 100->证明：张三有1000张一毛的

       带着钱和证明回去了





    // session

        1.  带着钱->银行->100->存到银行->卡




    // http  完不成状态存储
    // 记录状态
    // cookie  记录用户的状态  存在客户端
    // session  记录用户的状态  信息存在服务器，客户端存储了一个口令  网络安全
    // 服务器给客户端的礼物


    // tcp/ip协议

    // http协议
    // baidu.com

    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php
 include "../public/db.php";
 $sql="select * from category";
 $result=$db->query($sql);
?>
<form action="addCategoryCon.php">
   所属分类： <select name="pid" id="">
               <option value="0">一级分类</option>
              <?php
                  include "../public/tree.php";
                  $obj=new tree();
                  $obj->getTree(0,0,"┗",$db,"category");
                  echo $obj->str;

              ?>


              </select><br>
   分类名称： <input type="text" name="catname"><br>
    <input type="submit" value="添加">
</form>
</body>
</html>