<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="../static/js/jquery.min.js"></script>
    <script>
      $(function(){
          $("li span").click(function(){
                $(this).nextAll("ul").toggle();
          })
      })
    </script>
</head>
<body>
  <?php
  include "../public/db.php";
  include "../public/tree.php";
  $obj=new tree();
  $obj->getTree1(0,0,"┗",$db,"category");
  echo $obj->str;
  ?>
</body>
</html>