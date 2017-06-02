<?php


header("content-type:text/html;charset=utf-8");
/*
 *   1. 临时目录   baidu.com/aa/
 *
 *      // 1. 数据
 *         2. 两部分验证
 *            1.  前台验证  （给用户提供方便）
 *            2.  后台验证   (数据的安全)
 *
 *
 *
 *  */



  $type=array(
      "image/jpeg","image/png","image/gif"
  );
 if(is_uploaded_file($_FILES["file"]["tmp_name"])){

       //1.  是不是上传文件
       //2.  是不是指定的类型
       //3.  是不是指定的大小
     //if(in_array($_FILES["file"]["type"],$type)){

         $dir=date("y-m-d");
         if(!is_dir("./upload/".$dir)){
             mkdir("./upload/".$dir);
         }

         $name=time().$_FILES["file"]["name"];

         $fullpath="./upload/".$dir."/".$name;
         move_uploaded_file($_FILES["file"]["tmp_name"],$fullpath);
         echo "ok";
     //}else{
       //  echo "类型错误";
     //}

 }
?>