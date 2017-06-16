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
    <script src="../static/js/jquery.min.js"></script>
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
  $id=$_GET["id"];
  $_SESSION["url"]="show.php?id={$id}";
  include "../public/db.php";
  $result=$db->query("select * from lists where id={$id}");
  $row=$result->fetch_assoc();
?>
<header class="mui-bar mui-bar-nav">
    <a class="mui-icon mui-icon-left-nav mui-pull-left back"></a>
    <h1 class="mui-title">
        <?php
          echo $row["title"]
        ?>
    </h1>
</header>
<div class="mui-content">

    <p>
        <?php
          echo $row["con"];
        ?>
    </p>

</div>

相关的新闻:
<ul class="mui-table-view">
    <?php
     $key=$row["keywords"];
     $id=$row["id"];
     $sql="select * from lists where keywords like '%{$key}%' and not id={$id} limit 0,3";
     $result=$db->query($sql);
     while ($row=$result->fetch_assoc()) {
         ?>
         <li class="mui-table-view-cell">
             <a href="show.php?id=<?php echo $row['id']?>" class="mui-navigate-right">
                <?php
                  echo $row["title"]
                ?>
             </a>
         </li>
         <?php
     }
    ?>
</ul>

留言:<br>

<ul class="mui-table-view message">
    <?php
     $sql="select * from message where lid={$id}";
     $result=$db->query($sql);
        while ($info=$result->fetch_assoc()) {
            ?>
            <li class="mui-table-view-cell" style="position: relative">
                <div class="con">
                    <?php
                     echo $info["con"]
                    ?>
                </div>
                <div class="showBtn">
                    点击展开
                </div>

            </li>

            <?php
        }
    ?>


</ul>


<nav class="mui-bar mui-bar-tab">
    <a class="mui-tab-item mui-active" href="writeMessage.php?lid=<?php echo $id?>">
        <span class="mui-icon mui-icon-compose"></span>
    </a>
</nav>
<style>
    .showBtn{
        width:100%;height:30px;
        text-align: center;
        line-height: 30px;
        background:linear-gradient(rgba(255,255,255,0) 0%,rgba(255,255,255,.8) 10%);
        display: none;
        position: absolute;
        bottom: 0;
        cursor: pointer;
        color:red;
    }
</style>
<script>

    $(".message li").each(function(index,obj){
       if($(obj).outerHeight()>100){
           $(obj).css("height",100);
           $(obj).find(".showBtn").css("display","block");
       }
    })
    var flag=true;
    $(".message").delegate(".showBtn","click",function(){
        if(flag) {
            $(this).parent("li").css("height", "auto");
            $(this).html("收起来");
            flag=false
        }else{
            $(this).parent("li").css("height", "100");
            $(this).html("展开");
            flag=true;
        }

    })
</script>



</body>
</html>