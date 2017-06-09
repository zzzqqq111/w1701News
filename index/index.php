<?php
 include "header.php";
?>
<style>
    .wheelview{
        width:1000px;margin:auto;
        border:1px solid #ccc;
        height:200px;
        overflow: hidden;

    }

    .wheelbox{
        width:300%;height:100%;
        transition: margin 2s ease;
    }
    .wheelbox .wheellist{
        width:33.333%;height:100%;
        float: left;
    }
</style>

  <div class="wheelview">
      <div class="wheelbox">
          <?php
             $sql="select * from lists where posid=2 limit 0,3";
             $result=$db->query($sql);
             while ($info=$result->fetch_assoc()) {
                 ?>
                 <a class="wheellist"
                    style="background-image: url(../admin/<?php echo $info['imgurl']?>);background-size: cover;background-position: center" href="show.php?id=<?php echo $info['id']?>">

                 </a>
                 <?php
             }
          ?>
      </div>
  </div>

<script>

    var wheelbox=document.querySelector(".wheelbox");

    var num=0;

    setInterval(function(){
        num++;
        if(num>2){
            num=0;
        }
        console.log(1);
        wheelbox.style.marginLeft=-num*1000+"px";

    },3000)

</script>
</body>
</html>