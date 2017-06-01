<?php
/*
 *  递归函数
 *       一个函数在指定的条件下调用自己
 * */
  function fn($num=3){
      if($num<1){
          return;
      }else{
          fn(--$num);
      }
      echo $num;
  }
 //1.
/* function fn(3){
if(3<1){
    return;
}else{
    fn(2);
}
echo $num;  2     钱包
}


2.

function fn(2){
if(2<1){
    return;
}else{
    fn(1);
}
echo $num;  1    金币
}

3.

function fn(1){
if(1<1){
    return;
}else{
    fn(0);      美女帅哥
}
echo $num;    0
}

4.



*/



/*
 *   顶层分类    pid
 *   层级
 *   标识
 *   $db
 *   $table
 *
 *      3天   前端的页面
 *      自己喜欢的新闻类的网站    首页   列表页   内容页   留言评价
 *                             登陆   注册
 *
 *
 *     github
 *      新闻类app
 *
 *
 * */
class tree{
    public  $str="";
    function getTree($pid,$step,$flag,$db,$table,$currentid=null){

            $currentPid=null;
            if($currentid){
               $sql="select pid from ".$table." where id=".$currentid;

                $result=$db->query($sql);
                $row=$result->fetch_assoc();
                $currentPid=$row["pid"];
            }
            $step+=1;
            $sql="select * from ".$table." where pid=".$pid;
            $result=$db->query($sql);

            while ($row=$result->fetch_assoc()) {
                //  1. 编程类    2.管理类
                $id=$row["id"];
                $catname=$row["catname"];
                $str=str_repeat($flag,$step);
                if($id==$currentPid) {
                    $this->str .= "<option value='{$id}' selected>{$str}{$catname}</option>";
                }else{
                    $this->str .= "<option value='{$id}' >{$str}{$catname}</option>";
                }

               $this->getTree($id,$step,$flag,$db,$table,$currentid);

            }

    }


    function getTree1($pid,$step,$flag,$db,$table){
        $step+=1;
        $sql="select * from ".$table." where pid=".$pid;
        $result=$db->query($sql);
        $this->str.="<ul>";
        while ($row=$result->fetch_assoc()) {
            //  1. 编程类    2.管理类
            $id=$row["id"];
            $catname=$row["catname"];
            //$str=str_repeat($flag,$step);
            $this->str.="<li> <span>{$catname}</span>  <a href='delCategory.php?id={$id}'>删除</a> <a href='editCategory.php?id={$id}'>编辑</a>";

            $this->getTree1($id,$step,$flag,$db,$table);

        }
        $this->str.="</li></ul>";

    }


    function del($id,$db,$table){
        $sql="select * from ".$table ." where pid=".$id;

        $result=$db->query($sql);

        if($result->fetch_assoc()){
          echo "<script>alert('有子分类不能删除');location.href='showCategory.php';</script>";

        }else{

            $sql="delete from ".$table ." where id=".$id;
            $db->query($sql);

            if($db->affected_rows>0){
                echo "<script>alert('删除成功');location.href='showCategory.php';</script>";
            }

        }

    }

}


