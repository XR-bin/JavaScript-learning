<?php

	header('content-type:text/html;charset="utf-8"');
	
	
	/* 
		【注】PHP代码兼容HTML和CSS所有代码
		
		PHP输出函数，如果语句中有标签会自动解析
		
		【注】PHP语法是非常严格的，每一条语句后面都必须加分号
	*/
	echo "<h1>Hello World</h1>";
	echo("<h1>Hello World</h1>");
	
	print_r("<h1>Hello World</h1>");
	
	// var_dump有点类似js的console.log
	var_dump(100);
	var_dump("100");
	
	/* 
		php声明变量通过$符号声明
		php是弱引用类型语言：给变量赋值什么数据，就是什么数据类型
		
		php字符串拼接的时候，用的不是加号，而是 .
		php在进行字符串拼接的时候：占位符的方式进行拼接{变量/表达式}
	*/
   
	$username = "钢铁侠";
	$age = 18;
	
	echo "我是".$username."，今年".$age."岁<br/>";
	echo "我是{$username}，今年{$age}岁<br/>";
?>
