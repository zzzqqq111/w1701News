<?php
var_dump($_FILES["file"]);

exit;




/*类的方法*/
$type=array(
    "image/jpeg",
    "image/png",
    "image/gif"
);

$size=1024*1024*10;
//1.  看我们要处理的这个文件是不是用户上传的文件
if(is_uploaded_file($_FILES["file"]["tmp_name"])){
    //2.  判断的是文件类型或者是大小
    // 时间
    if(in_array($_FILES["file"]["type"],$type)&&$_FILES["file"]["size"]<$size){

        $dir="upload";

        if(!is_dir($dir)){
            mkdir($dir);
        }

        $path=date("y-m-d");

        if(!is_dir($dir."/".$path)){
            mkdir($dir."/".$path);
        }

        $name=md5(time().mt_rand(0,10000)).$_FILES["file"]["name"];

        $fullpath=$dir."/".$path."/".$name;


        move_uploaded_file($_FILES["file"]["tmp_name"],$fullpath);
        echo "ok";
    }else{
        echo "error";
    }


}
?>