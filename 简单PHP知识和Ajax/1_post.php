<?php

	header('content-type:text/html;charset="utf-8"');
  
  /* 
    $_POST全局数组
    储存过来的post发送过来的数组
  */
  $username = $_POST["username"];
  $age = $_POST["age"];
  $password = $_POST["password"];
  
  echo "post方式    你的名字：{$username}, 年龄：{$age}, 密码：{$password}"
?>
