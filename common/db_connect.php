<?php
//$con =  mysql_connect('115.29.96.71','shuqian_user','adminn123');
$con =  mysql_connect('localhost','root','123');
mysql_query("set names utf8");//注意编码方式
if (!$con) {
    die('Could not connect: ' . mysql_error());
}
$dbname = "shuqian";
mysql_select_db($dbname , $con);
?>