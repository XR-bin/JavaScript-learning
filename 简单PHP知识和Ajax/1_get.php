<?php

	header('content-type:text/html;charset="utf-8"');
  
  /* 
    $_GET全局数组
    储存过来的get发送过来的数组
  */
  $username = $_GET["username"];
  $age = $_GET["age"];
  $password = $_GET["password"];
  
  echo "get方式    你的名字：{$username}, 年龄：{$age}, 密码：{$password}"
?>