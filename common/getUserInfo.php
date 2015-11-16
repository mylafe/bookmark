<?php
session_start();
header("Content-type: text/plain;charset=utf8");
$data = array(
	"userid"=>$_SESSION["userid"],
	"username"=>$_SESSION["username"]
	);
echo json_encode($data);
?>