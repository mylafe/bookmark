<?php
$userid = $_POST["userid"];
$password = $_POST["password"];
$username = $_POST["username"];

$password=sha1($password);

require 'db_connect.php';

$sql = "select userid from user_info where userid = '$userid'";	//SQL语句
$result = mysql_query($sql);	//执行SQL语句
$num = mysql_num_rows($result);	//统计执行结果影响的行数
if($num)	//如果已经存在该用户
{
echo "-1";
}else	//不存在当前注册用户名称
{
$sql_insert = "insert into user_info (userid,password,username) values('$userid','$password','$username')";
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