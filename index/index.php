<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <!--  php  -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
    <title></title>
    <script src="../static/js/mui.min.js"></script>
    <script src="../static/js/jquery.min.js"></script>
    <script type="text/javascript" src="../static/js/iscroll.js"></script>
    <link href="../static/css/mui.min.css" rel="stylesheet"/>
    <style>
        html,body{
            width:100%;height:100%;overflow: hidden;
        }
    </style>
    <script type="text/javascript" charset="utf-8">
        mui.init();
    </script>
    <style>

        .nav{
            width:100%;height:44px;
            line-height: 44px;
            overflow: hidden;
        }

        .nav a{
            padding:0 15px;
            float: left;
        }
        .load{
            display: none;
            text-align: center;
        }
    </style>
    <script>
        $(function(){
            var widths=0;
            $(".navbox a").each(function(index,obj){
                widths+=$(obj).outerWidth()
            })
            $(".navbox").css("width",widths);
            var left=0;
            mui(".mui-content").on("dragstart",".navbox",function(e){
                left=parseInt($(".navbox").css("marginLeft"))?parseInt($(".navbox").css("marginLeft")):0;

            })
            mui(".mui-content").on("drag",".navbox",function(e){
                /*
                e.detail.
                    deltaX
                :
                25
                deltaY
                    :
                    0
                direction
                    :
                    "right"
                    */
                var lefts=left+e.detail.deltaX;
                 //console.log($(window).width());
                if(lefts>0){
                    lefts=0;
                }
                if(lefts<$(window).width()-widths){
                    lefts=$(window).width()-widths
                }
               $(".navbox").css("marginLeft",lefts)
            })







            document.addEventListener('touchmove', function (e) { e.preventDefault(); }, false);


        })


        /*
          上传的图片的尺寸  2000w   400
                           500    10

        */



        $(window).load(function(){
            $(".container").css("top",function(){
                return $(".mui-slider").outerHeight()+88;
            })

            myScroll = new IScroll('.container',{ scrollbars: true,bounce:true});


            var  flag=true;
            var num=0;
            console.log(myScroll)
            myScroll.on("scrollStart",function(){

                if(!flag){
                    return;
                }

                //  加载相关的新闻
              if(myScroll.y==0&&myScroll.distX<0){
                  flag=false;

                     $(".load").css("display","block");

                     //模拟网络延时
                  $.ajax({
                      url:"relative.php",
                      dataType:"json",
                      data:{keywords:$(".mui-table-view-cell:eq(0)").attr("relative"),num:num},
                      success:function(e){
                          num++
                            for(var i=0;i<e.length;i++){

                                var li=$("<li class='mui-table-view-cell mui-media' relative='"+e[i].keywords+"'>");
                                li.html(` <a href="show.php?id=${e[i].id}">
                    <img class="mui-media-object mui-pull-right" src="../admin/${e[i].imgurl}">
                    <div class="mui-media-body">
                      ${e[i].title}
                        <p class="mui-ellipsis">能和心爱的人一起睡觉，是件幸福的事情；可是，打呼噜怎么办？</p>
                    </div>
                </a>`);
                                $(".load").after(li);

                            }





                          $(".load").css("display","none");
                          myScroll.refresh();
                          flag=true;


                      }


                  })

              }


                if(myScroll.y==myScroll.maxScrollY&&myScroll.distX>=0){
                    flag=true;
                    console.log("底部");
                }
            })
        })
    </script>
    <style>

        .container{
            width:100%;bottom: 50px;
            left:0;right:0;
            position: absolute;
            z-index:10;
            overflow: hidden;
            border:1px solid #000;
        }
        .mui-table-view{
            position: absolute;

        }
    </style>
</head>
<body>
<header class="mui-bar mui-bar-nav">
    <h1 class="mui-title">xx新闻</h1>
    <?php

      if(isset($_SESSION["memberlogin"])) {
          ?>
          欢迎 <?php echo $_SESSION["mname"]?>
          <?php
           if($_SESSION["mphoto"]) {
               ?>

               <a class="mui-icon mui-pull-right" href="member.php" style="background: url(<?php echo $_SESSION["mphoto"]?>);background-size: cover;border-radius: 50%;top:0;bottom:0;position: absolute;right:10px;width:40px;height:44px;"></a>
               <?php
           }else {
               ?>
               <a class="mui-icon mui-icon-contact mui-pull-right" href="member.php"></a>
               <?php
           }
               ?>
          <?php
      }else {
          ?>
          <a class="mui-icon mui-icon-contact mui-pull-right" href="login.php"></a>
          <?php
      }
    ?>
</header>

<div class="mui-content">

    <nav class="nav">
        <?php
          include "../public/db.php";
          $sql="select * from category where isshow=0";
          $result=$db->query($sql);

        ?>
        <div class="navbox">
            <a href="index.php">
                首页推荐
            </a>
            <?php
            while ($row=$result->fetch_assoc()) {
                ?>
                <a href="list.php?cid=<?php echo  $row['id']?>">

                    <?php
                        echo $row["catname"];
                    ?>
                </a>
                <?php
            }
            ?>
        </div>
    </nav>


    <div class="mui-slider">
        <div class="mui-slider-group">

            <?php
              $sql="select * from lists where posid like '%2%'";
              $result=$db->query($sql);
              while ($row=$result->fetch_assoc()) {
                  ?>
                  <div class="mui-slider-item"><a href="show.php?id=<?php echo $row['id']?>"><img src="../admin/<?php echo $row['imgurl']?>"/></a></div>
                  <?php
              }
          ?>
        </div>
    </div>


    <div class="container">


       <ul class="mui-table-view">
           <div class="load">
               loading......
           </div>
        <?php
        $sql="select * from lists where posid like '%3%'";
        $result=$db->query($sql);
        while ($row=$result->fetch_assoc()) {
            ?>
            <li class="mui-table-view-cell mui-media" relative="<?php echo $row['keywords']?>">
                <a href="show.php?id=<?php echo $row['id']?>">
                    <img class="mui-media-object mui-pull-right" src="../admin/<?php echo $row['imgurl']?>">
                    <div class="mui-media-body">
                       <?php
                        echo $row["title"]
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
</div>

<nav class="mui-bar mui-bar-tab">
    <a class="mui-tab-item mui-active">
        <span class="mui-icon mui-icon-home"></span>
        <span class="mui-tab-label">首页</span>
    </a>
    <a class="mui-tab-item">
        <span class="mui-icon mui-icon-phone"></span>
        <span class="mui-tab-label">电话</span>
    </a>
    <a class="mui-tab-item">
        <span class="mui-icon mui-icon-email"></span>
        <span class="mui-tab-label">邮件</span>
    </a>
    <a class="mui-tab-item setting" href="setting.php" >
        <span class="mui-icon mui-icon-gear"></span>
        <span class="mui-tab-label">设置</span>

    </a>
</nav>
<script>

    /*
    *            touchstart
    *
    *            touchmove
    *
    *            touchend
    *
    *            mousedown
    *            mousemove
    *            mouseup
    *            click
    *
    *
    *
    *
    *
    *
    * */


    $(".setting").click(function(){
        location.href="setting.php";
    })
</script>
</body>
</html>