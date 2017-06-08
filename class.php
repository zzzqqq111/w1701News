<?php

class person{
     protected $name="zhangsan";
     public $age=12;
     public $sex="man";

     public function say(){
      echo $this->name;
     }
}


class stu extends person{

    public function say1(){
        echo $this->name;
    }
}


$obj=new stu();

$obj->name;
