<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="../static/css/mui.min.css">
    <script src="../static/js/jquery.js"></script>
    <script src="../static/js/upload.js"></script>
    <!--功能不同-->
</head>
<body>
<header class="mui-bar mui-bar-nav">
    <a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left back"></a>
    <h1 class="mui-title">上传头像</h1>
</header>
<div class="mui-content">
    <div class="uploadbox">

        <input type="hidden" name="imgurl">
    </div>
    <button id='login' class="mui-btn mui-btn-block mui-btn-primary" type="submit">提交</button>
</div>

<script>
    var obj = new upload();
    obj.size = 1024 * 1024 * 8.6;
    obj.selectBtnStyle.background = "red";
    obj.createView({
        parent: document.querySelector(".uploadbox")
    });
    obj.up("upload.php",function(data){
        document.querySelector("input[name=imgurl]").value=data;
    });

    $("button").click(function(){
        $.ajax({
            url:"uploadPhotoCon.php",
            data:{mphoto:$("input[type=hidden]").val()},
            success:function(e){
                    if(e=="ok"){
                        alert("头像存储成功");
                    }
            }
        })
    })

</script>
</body>
</html>