<?php
include 'db_connect.php';

$tableName = "biaoqian";
if(!empty($_REQUEST["tableName"]))
    $tableName = $_REQUEST["tableName"];
$dict=array();
$result =  mysql_query("SELECT  column_name FROM Information_schema.columns ".
"WHERE TABLE_SCHEMA='$dbname' and TABLE_NAME='$tableName' ", $con);
;

while($arr = mysql_fetch_array($result)){
   	$dict[]=$arr["column_name"];
}

$values = array();
foreach ($dict as $value) {
	$values[] =$_REQUEST[$value];
}
$set = array();
for($i=0;$i<count($dict);$i++){
	if($dict[$i]!="id"){
		$set[] = "$dict[$i] = '$values[$i]'";
	}else{
		$where = " where id = '$values[$i]'";
	}
}
$set2 = "set ".implode(",",$set);


$sql = "update $tableName $set2 $where";
@mysql_query($sql);

$row = array();
for($i=0;$i<count($dict);$i++){
	$row[$dict[$i]] = $values[$i];
}
echo json_encode($row);

?>