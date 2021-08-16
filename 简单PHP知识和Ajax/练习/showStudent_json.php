<?php
  header('content-type:text/html;charset="utf-8"');
  
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
    echo "链接失败";
    exit;   //终止后续代码执行
  }

  // 第三步  设置字符集
  mysql_set_charset("utf8");
  
  // 第四步 选择数据库
  mysql_select_db("mydb2");
  
  // 第五步 准备sql语句
  $sql = "SELECT * FROM student2";
  
  // 第六步 发送sql语句
  $res = mysql_query($sql);

  // 第七步 处理结果
  $arr = array();
  while($row = mysql_fetch_assoc($res)){
    array_push($arr, $row);
  }
  
  echo json_encode($arr);
  
  // 第八步 关闭数据库
  mysql_close($link);
?>
