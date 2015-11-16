<?php
session_start();
header("Content-type: text/plain;charset=utf8");



require "db_connect.php";

$TypeID = $_GET["typeId"];
//$sql = "SELECT id,userid,title,contents,time FROM biaoqian;";
$sql = "SELECT * FROM  `biaoqian` where `typeid` = ".$TypeID." AND `isdelete` = 0 ORDER BY  `biaoqian`.`time` DESC LIMIT 0 , 10 ;";
$data=mysql_query($sql);

$results = array();
while ($row = mysql_fetch_assoc($data)) {
$results[] = $row;
}
 
// 将数组转成json格式
echo json_encode($results);
?>