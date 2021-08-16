<?php
  header('content-type:text/html;charset="utf-8"');
  
  $name = $_POST['name'];
  $Chinese = $_POST['Chinese'];
  $math = $_POST['math'];
  $english = $_POST['english'];
  
  /*
    php数据库互动的天龙八步秘籍
  */
   
  // 第一步  链接数据库
  /* 
    参数1   链接数据库的IP/域名
    参数2   用户名
    参数3   用户密码
  */
  $link = mysql_connect("localhost", "root", "123456789");
  
  // 第二步  判断是否链接成功
  if(!$link){
    $responeData['code'] = 1;
    $responeData['message'] = "数据库链接失败";
    echo json_encode($responeData);
    exit;   //终止后续代码执行
  }
  
  // 第三步  设置字符集
  mysql_set_charset("utf8");
  
  // 第四步 选择数据库
  mysql_select_db("mydb2");
  
  // 第五步 准备sql语句
  $sql = "INSERT INTO student2(name,Chinese,math,english) VALUES('{$name}',{$Chinese},{$math},{$english})";
  
  // 第六步 发送sql语句
  $res = mysql_query($sql);
  
  if(!$res){
    $responeData['code'] = 2;
    $responeData['message'] = "数据添加失败";
    echo json_encode($responeData);
  }
  else{
    $responeData['code'] = 0;
    $responeData['message'] = "数据添加成功";
    echo json_encode($responeData);
  }
  
  // 第七步 处理结果
  
  // 第八步 关闭数据库
  mysql_close($link);
?>
