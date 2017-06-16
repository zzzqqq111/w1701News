<?php
sleep(2);
include "../public/db.php";
  $keywords=$_GET["keywords"];
  $num=$_GET["num"]*10;

  /*
   *  1000
   *
   *
   *
   *
   *
   *
   *
   * */

  $sql="select * from lists where keywords like '%{$keywords}%' limit {$num},10";
  $result=$db->query($sql);
  $array=array();

  while ($row=$result->fetch_assoc()){
      $array[]=$row;
  }

  echo json_encode($array);

?>