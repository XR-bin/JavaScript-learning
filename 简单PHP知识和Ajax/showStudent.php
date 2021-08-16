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
  
  //设置表头
  echo "<table border='1'>";
  echo "<tr><th>学生学号</th><th>学生名字</th><th>语文成绩</th><th>数学成绩</th><th>英语成绩</th></tr>";
  
  // 第七步 处理结果
  while($row = mysql_fetch_assoc($res)){
    echo "<tr><td>{$row['id']}</td><td>{$row['name']}</td><td>{$row['Chinese']}</td><td>{$row['math']}</td><td>{$row['english']}</td></tr>";
  }
  
  echo "</table>";
  
  // 第八步 关闭数据库
  mysql_close($link);
?>