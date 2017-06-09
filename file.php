<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script>

         /*
         *  类
         *
         *          1. 前台的ajax的另外的用法
         *
         *          2.  处理文件 php的一大功能
         *
         *              处理数据库
         *
         *
         *
         *          php 后台语言 入手
         *
         *          新闻发布系统 不仅是上课的案例，项目
         *
         *          接触项目
         *
         *         从前台-》后台-》数据
         *
         *
         *    前台的上传的类
         *
         *     无刷新上传   ajax
         *
         *
         *     //  1.  界面
         *
         *             a.  选择文件的接口
         *             b.  上传的按钮
         *             c.  预览的图像
         *             d.  进度
         *             e.  提示消息
         *             f.  删除
         *
         *
         *         一、  html +css 预先写好
           *
           *       二、  js动态创建
             *
             *
         *
         *     2.
         *
         *
         * */
      </script>
   <script src="upload.js"></script>
    <style>
        .file{
            width:150px;height:40px;
            border-radius: 5px;

            line-height: 40px;
            cursor: pointer;
            position: relative;
        }
        .file .select{
            display: block;width:100%;height:100%;
            background: #ccc;
            text-align: center;
        }
        .file .upload{
            background: orange;
            text-align: center;
            display: block;width:100%;height:100%;
        }
        .file input{
            position: absolute;
            width:100%;height:100%;
            left:0;top:0;
            opacity: 0;
        }

        .box{
            width:500px;overflow: hidden;border:1px solid #ccc;

        }
        .box .list{
            float: left;
            margin:5px;
            border:1px solid #ccc;
            width:150px;height:150px;
            position: relative;
        }
        .list img{
            width:100%;height:100%;

        }
        .list  .progress{
            width:100%;height:20px;
            position: absolute;left:0;
            bottom: 0;text-align: center;line-height: 20px;
            border-top:1px solid #ccc;
            opacity: 0.7;
        }
        .list .progress .back{
            width:100%;height:100%;
            background: red;
        }
        .error{
            width:100px;height:30px;
            position: absolute;
            left:0;top:0;right:0;bottom: 0;margin: auto;
            text-align: center;
            line-height: 30px;
            background: #ccc;
            opacity: .8;
            font-size: 14px;
            display: none;
        }
        .remove{
            width:20px;height:20px;
            position: absolute;
            right:0;top:0;
            text-align: center;
            line-height: 20px;
            display: none;
        }
        .list:hover .remove{
            display: block;
        }
    </style>
    <script>

    </script>


</head>
<body>

<!--  <div class="file">
     <span class="select">+</span>
     <div class="box">
         <div class="list">
             <img src="1.JPG" alt="">
             <div class="progress">
                 <div class="back">
                     55%
                 </div>
             </div>
             <div class="error">
                 超出指定的大小
             </div>
             <div class="remove">
                 -
             </div>
         </div>
         
     </div>
     <input type="file" accept="image/jpeg,image/gif">
      <span class="upload">上传文件</span>


  </div>-->



</body>
</html>