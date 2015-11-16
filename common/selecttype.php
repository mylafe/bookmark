<?php
	session_start();
	header("Content-type: text/plain;charset=utf8");

	require 'db_connect.php';

	//$sql = "SELECT id,title,contents,title FROM biaoqian WHERE typeid='$typeid';";	//SQL语句
	
	//$sql = "SELECT id,title,contents,title FROM biaoqian WHERE typeid='$typeid';";

	//$sql = "SELECT b.id,b.typeid,b.title,b.contents,b.title,t.id,t.name FROM biaoqian b,type t WHERE b.typeid=t.id and u.userid='$_userid' AND u.password='$_password';";

	$result = mysql_query($sql);	//执行SQL语句
	$num = mysql_num_rows($result);	//统计执行结果影响的行数
	if($num)
	{
	echo "1";
	}else
	{
	echo "0";
	}
?>