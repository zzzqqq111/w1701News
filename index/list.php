<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="../static/js/mui.min.js"></script>
    <script src="../static/js/jquery.min.js"></script>
    <script type="text/javascript" src="../static/js/iscroll.js"></script>
    <link href="../static/css/mui.min.css" rel="stylesheet"/>
    <script>
        $(function(){
            $(".back").click(function(){
                history.go(-1);
            })
        })
    </script>

</head>
<body>
<?php

     include "../public/db.php";
     $id=$_GET["cid"];
     $sql="select category.catname as name,lists.imgurl as imgurl,lists.title,lists.id as lid from category ,lists where category.id={$id} and category.id=lists.cid";

    $result=$db->query($sql);

    $array=array();
    while ($row=$result->fetch_assoc()){
        $array[]=$row;
    }

?>
<header class="mui-bar mui-bar-nav">
    <a class="mui-icon mui-icon-left-nav mui-pull-left back"></a>
    <h1 class="mui-title">
            <?php
               echo $array[0]["name"]
            ?>
    </h1>
</header>
<div class="mui-content">
    <ul class="mui-table-view">
        <?php
          foreach ($array as $v) {
              ?>
              <li class="mui-table-view-cell mui-media">
                  <a href="show.php?id=<?php echo $v['lid']?>">
                      <img class="mui-media-object mui-pull-right" src="../admin/<?php echo $v['imgurl']?>">
                      <div class="mui-media-body">
                          <?php
                            echo $v["title"]
                          ?>
                          <p class="mui-ellipsis">能和心爱的人一起睡觉，是件幸福的事情；可是，打呼噜怎么办？</p>
                      </div>
                  </a>
              </li>
              <?php
          }
        ?>
    </ul>
</div>
</body>
</html>