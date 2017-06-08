<?php
class upload{
   public $type="image/jpeg,image/png,image/gif";
   public $size;
   public $root="upload";
   public $fullpath="";

   function __construct(){
       $this->size=1024*1024*10;
   }

    //1.  接收数据
   private function accept($attr="file"){
       $this->data=$_FILES[$attr];
   }
   //2.  验证
   private function check(){

       if(is_uploaded_file($this->data["tmp_name"])){

           if(strrchr($this->type,$this->data["type"])&&$this->data["size"]<$this->size){
               return true;
           }

       }


       return false;
   }
   //3.  定义路径

    private function customUrl(){
        //1. 根目录是否存在
        if(!is_dir($this->root)){
           mkdir($this->root);
        }
        //2.  创建分类目录
        $path=$this->root."/".date("y-m-d");
        if(!is_dir($path)){
            mkdir($path);
        }
        //3 创建文件的随机名字

        $name=md5(time().mt_rand(0,10000)).$this->data["name"];

        //4. 整合完整的路径

        $this->fullpath=$path."/".$name;

    }

    //4.  移动文件

    private  function moveFile(){
        move_uploaded_file($this->data["tmp_name"],$this->fullpath);
    }

   public function move(){
       $this->accept();
       if($this->check()) {
           $this->customUrl();
           $this->moveFile();
       }else{
           echo "error";
       }
   }
}




$obj=new upload();
$obj->move();


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