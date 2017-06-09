<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <script type="text/javascript" charset="utf-8" src="../static/editor/ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="../static/editor/ueditor.all.min.js"> </script>
    <!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
    <!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
    <script type="text/javascript" charset="utf-8" src="../static/editor/lang/zh-cn/zh-cn.js"></script>
    <script type="text/javascript" charset="utf-8" src="../static/js/upload.js"></script>

    <script>
        window.onload=function(){
            var closeBtn=document.querySelector(".closeBtn");
            closeBtn.onclick=function(){
                var ajax=new XMLHttpRequest();
                var id=this.id;
                ajax.open("get","editConDelImg.php?id="+id);
                ajax.onload=function(){
                   if(ajax.response=="ok"){
                       closeBtn.parentNode.parentNode.removeChild(closeBtn.parentNode);
                   }
                }
                ajax.send();
            }
        }
    </script>

</head>
<?php
$id=$_GET["id"];
$cid=$_GET["cid"];
include "../public/db.php";
$sql="select * from lists where id=".$id;

$result=$db->query($sql);
$row=$result->fetch_assoc();
?>
<body>
<form action="editConCon.php">
    标题: <input type="text" name="title" value="<?php echo $row['title']?>"><br>
      <div con='<?php echo $row['con']?>'class="con"> </div>
    内容:  <script id="editor" type="text/plain" style="width:500px;height:300px;" name="con" ></script>
    <input type="hidden" value="<?php echo $_GET['id']?>" name="id">
    <input type="hidden" value="<?php echo $_GET['cid']?>" name="cid">
    <input type="hidden" name="imgurl">
    预览图片:
    <div class="preview" style="position: relative;width:150px;">
        <img src="<?php echo $row['imgurl']?>" width=150 alt="">
        <div class="closeBtn" style="width:20px;height:20px;text-align: center;line-height: 20px;position: absolute;right:0;top:0; font-size: 20px" id="<?php echo $row['id']?>">
            X
        </div>
    </div>
    <div class="uploadbox"></div>
    <input type="submit" value="提交">
</form>
<script>
    var ue = UE.getEditor('editor');



    ue.addListener( 'ready', function( editor ) {

        setContent();
    } );



    function setContent(isAppendTo) {

        ue.execCommand('insertHtml', document.querySelector(".con").getAttribute("con"))

    }


    var obj = new upload();
    obj.size = 1024 * 1024 * 8.6;
    obj.selectBtnStyle.background = "red";
    obj.createView({
        parent: document.querySelector(".uploadbox")
    });
    obj.up("upload.php",function(data){
        document.querySelector("input[name=imgurl]").value=data;
    });

</script>
</body>
</html>