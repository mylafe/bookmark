<?php
$id = ($_REQUEST['id']);

include 'db_connect.php';
$bookmarkId = $_GET["bookmarkId"];

$sql = "UPDATE `biaoqian` SET  `isdelete` =  '1' where id =".$bookmarkId;
//$sql = "delete from $tableName where id=".$bookmarkId.";

@mysql_query($sql);
echo json_encode(array('success'=>true));
?>