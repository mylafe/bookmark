<?php
session_start();
$password = $_REQUEST["password"];

  require 'db_connect.php';
  $userid = $_SESSION['userid'];
  $sql = "update user_info set password = sha1('$password') where userid='$userid'"; //SQL语句
  $result = mysql_query($sql);  //执行SQL语句
/*
C语言非0即真
*/
    if($result)
    {
      echo "1";
    }else
    {
      echo "0";
    }
  
?>