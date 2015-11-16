<?php
	session_start();
	header("Content-type: text/plain;charset=utf8");

	$userid=$_SESSION["userid"];
	$name = $_POST["name"];

	require 'db_connect.php';

	$sql = "SELECT name FROM type WHERE name = '$name' and userid = '$userid'";	//SQL语句
	$result = mysql_query($sql);	//执行SQL语句
	$num = mysql_num_rows($result);	//统计执行结果影响的行数
	if($num)	//如果已经存在标签标签类型
	{
	echo "-1";
	}else
	{
	$sql_insert = "INSERT INTO type (userid,name) VALUES('$userid','$name')";
	$res_insert = mysql_query($sql_insert);
	if($res_insert)
	{
		echo "1";
	}else
	{
		echo "0";
	}
	}
?>