<?php
  session_start();

  foreach ($_SESSION as $k=>$v){
      unset($_SESSION[$k]);
  }

  echo "<script>alert('退出成功');location.href='index.php';</script>";
