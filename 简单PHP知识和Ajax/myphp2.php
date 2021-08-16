<?php

	header('content-type:text/html;charset="utf-8"');
  
  $isYes = true;
  // if...else 语句
  if($isYes){
    echo '是';
  } else {
    echo '否';
  }
  
  // Switch语句
  switch(2){
    case 1: echo '1'; break;
    case 2: echo '2'; break;
    default : break;
  }
  
  echo '<br/>';
  
  // for语句
  for($i=0; $i<5; $i++){
    echo "下标".$i."<br/>";
  } 
  
  // 函数写法
  function hello(){
    print "Hello World <br/>";
  }
  
  hello();
  
  /*
    1、索引数组     下标是数字叫做索引数组
    2、关联数组     下标是字符串叫做关联数组    （类似ECMA6的map类型）
    3、全局数组
        $_GET   接收通过get提交过来的所有数据
        $_POST  接收通过post提交过来的所有的数据
  */
  // 索引数组
  $cars = array("111", "222", "333");
  // count()获取数组长度
  for($i=0; $i<count($cars); $i++){
    echo "下标：{$i},数据：{$cars[$i]}<br/>";
  }
  
  // 关联数组/键值数组
  $arr = array("张三"=>"打渔的", "李四"=>"种地的", "王五"=>"教书的");
  // var_dump($arr);
  foreach($arr as $key => $value){
    echo "下标：{$key},数据：{$value}<br/>";
  }
  
  // 二维数组
  $arr = array(
    array('name'=>'xiaobai', 'english'=>100, 'math'=>50),
    array('name'=>'xiaohong', 'english'=>70, 'math'=>60),
    array('name'=>'xiaobin', 'english'=>80, 'math'=>100)
  );
  
  echo $arr[1]['math'];
  
?>