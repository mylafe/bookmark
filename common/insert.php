<?php
	session_start();
	header("Content-type: text/plain;charset=utf8");

	
	$title = $_POST["title"];
	$contents = $_POST["contents"];
	$qianfen = $_POST["qianfen"];

	require 'db_connect.php';

	// $sql = "SELECT title FROM biaoqian WHERE title = '$title' and userid = '$userid'";	//SQL语句
	// $result = mysql_query($sql);	//执行SQL语句
	// $num = mysql_num_rows($result);	//统计执行结果影响的行数
	// if($num)	//如果已经存在标签
	// {
	// echo "-1";
	// }else
	// {
	$sql_insert = "INSERT INTO biaoqian (typeid,title,contents,time) VALUES('$qianfen','$title','$contents',NOW())";
	$res_insert = mysql_query($sql_insert);
	if($res_insert)
	{
		echo "1";
	}else
	{
		echo "0";
	}
?>