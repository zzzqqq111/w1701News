<?php
  header("content-type:text/html;charset=utf-8");
  session_start();
  foreach ($_SESSION as $k=>$v){
      unset($_SESSION[$k]);
  }
  echo "<script>alert('退出成功');location.href='login.php';</script>";
?>