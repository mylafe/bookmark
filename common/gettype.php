<?php
session_start();
header("Content-type: text/plain;charset=utf8");



require "db_connect.php";
$userid = $_SESSION['userid'];

//$sql = "SELECT id,userid,title,contents,time FROM biaoqian;";
$sql ="SELECT * FROM  `type` where userid='$userid' LIMIT 0 , 10;";
$data=mysql_query($sql);

$results = array();
while ($row = mysql_fetch_assoc($data)) {
$results[] = $row;
}
 
// 将数组转成json格式
echo json_encode($results);
?>