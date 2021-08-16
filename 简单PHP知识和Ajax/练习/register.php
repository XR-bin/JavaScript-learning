<?php
  header('content-type:text/html;charset="utf-8"');
  
  $username = $_POST['username'];
  $password = $_POST['password'];
  $addTime = $_POST['addTime'];
  
  if(!$username){
    $responeData['code'] = 1;
    $responeData['message'] = "用户名不能为空";
    echo json_encode($responeData);
    exit;   //终止后续代码执行
  }
  
  if(!$password){
    $responeData['code'] = 2;
    $responeData['message'] = "密码不能为空";
    echo json_encode($responeData);
    exit;   //终止后续代码执行
  }
  
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
    $responeData['code'] = 3;
    $responeData['message'] = "数据库链接失败";
    echo json_encode($responeData);
    exit;   //终止后续代码执行
  }
  
  // 第三步  设置字符集
  mysql_set_charset("utf8");
  
  // 第四步 选择数据库
  mysql_select_db("mydb2");
  
  
  /*****************************验证用户是否重名*****************************/
  // 第五步 准备sql语句
  $sql = "SELECT * FROM users WHERE username='{$username}'";
  
  // 第六步 发送sql语句
  $res = mysql_query($sql);
  
  // 第七步 处理结果
  $row = mysql_fetch_assoc($res);
  
  if($row){
    $responeData['code'] = 4;
    $responeData['message'] = "用户名已存在";
    echo json_encode($responeData);
    exit;   //终止后续代码执行
  }
  
  /*****************************添加用户*****************************/
  //md5加密
  $str = md5(md5(md5($password)."xxx")."yyy");
  // 第五步 准备sql语句
  $sql = "INSERT INTO users(username,password,addTime) VALUES('{$username}','{$str}',{$addTime})";
  
  // 第六步 发送sql语句
  $res = mysql_query($sql);
  
  if(!$res){
    $responeData['code'] = 5;
    $responeData['message'] = "数据添加失败";
    echo json_encode($responeData);
  }
  else{
    $responeData['code'] = 0;
    $responeData['message'] = "数据添加成功";
    echo json_encode($responeData);
  }
  
  // 第八步 关闭数据库
  mysql_close($link);
?>