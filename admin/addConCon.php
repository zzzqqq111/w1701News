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
<form action="addConConCon.php">
    标题: <input type="text" name="title"><br>
    内容: <textarea name="con" id="" cols="30" rows="10"></textarea><br>
    <input type="hidden" value="<?php echo $_GET['cid']?>" name="cid">
    <input type="submit" value="提交">
</form>
</body>
</html>