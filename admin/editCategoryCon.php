<?php
include  "../public/db.php";
$id=$_GET["id"];
$pid=$_GET["pid"];
$catname=$_GET["catname"];

$sql="update category set pid={$pid},catname='{$catname}' where id=".$id;


$db->query($sql);
if($db->affected_rows>0){
    echo "<script>alert('修改成功!');location.href='editCategory.php?id={$id}'</script>";
}
?>