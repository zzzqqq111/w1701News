<?php
function checkname($db){
    $mname=$_POST["mname"];
    $sql="select mname from member";
    $result=$db->query($sql);
    while ($row=$result->fetch_assoc()){
        if($row["mname"]==$mname){
            return "false";
            exit();
        }
    }

    return "true";
}

function select($db){
    $mname=$_POST["mname"];
    $sql="select * from member";
    $result=$db->query($sql);
    $array=array();
    while ($row=$result->fetch_assoc()){
       $array[]=$row;
    }

    return $array;

}
