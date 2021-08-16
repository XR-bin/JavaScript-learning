<?php

	header('content-type:text/html;charset="utf-8"');
  error_reporting(0);
  
  $arr1 = array('leo', 'momo', 'zhangsen');
  
  echo json_encode($arr1);
  
  // json_encode()       将数据结构转为JSON字符串
  // json_decode()       将JSON字符串转为数据结构
   
?>