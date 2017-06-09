<?php
 include "header.php";
?>
<style>
      .listbox{
          width:1000px;
          margin:auto;

      }
      .listbox .list{
          width:100%;height:100px;
          border:1px solid #ccc;
          margin-bottom: 5px;
      }
    .list a{
        display: block;
        width:100%;height:100%;
        text-decoration: none;
    }
    .img{
        float:left;
        width:20%;
        height:100%;
    }
    .title{
        box-sizing: border-box;
        float: left;
        width:80%;
        height:100%;
        padding-left:10px;
        position: relative;
    }
    .time{
        position: absolute;
        right:10px;
        bottom: 5px;
    }
</style>
 <ul class="listbox">

     <?php
        $cid=$_GET["cid"];
        include "../public/db.php";
        $sql="select id,title,listtime,imgurl from lists where cid={$cid}";


        $result=$db->query($sql);
        while($row=$result->fetch_assoc()) {
            ?>
            <li class="list">
                <a href="show.php?id=<?php echo $row['id']?>">
                    <div class="img"
                         style="background-image: url(../admin/<?php echo $row['imgurl'] ?>);background-size: cover;background-position: center">

                    </div>
                    <div class="title">
                        <h3>
                            <?php
                             echo $row["title"]
                            ?>
                        </h3>
                        <span class="time">
                        <?php
                          echo $row["listtime"]
                        ?>
                   </span>
                    </div>
                </a>
            </li>
            <?php
        }
     ?>
 </ul>
</body>
</html>