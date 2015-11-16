<?php
	$lifeTime = 30 * 24 * 3600;  // 保存一个月 
	session_set_cookie_params($lifeTime); 
	session_start();
	header("Content-type: text/plain;charset=utf8");

	$userid = $_POST["userid"];
	$password = $_POST["password"];

	require "db_connect.php";
	
	$password=sha1($password);

	$sql = "SELECT userid,password,username FROM user_info WHERE userid='$userid' AND password='$password';";
	//echo $sql;
    $result=mysql_query($sql);

    $_SESSION["userid"]="-1";
	while($arr=mysql_fetch_assoc($result)){		
		$_SESSION["userid"]=$arr["userid"];
		$_SESSION["password"]=$arr["password"];
		$_SESSION["username"]=$arr["username"];
	}

	if($_SESSION["userid"]!="-1")
	    echo 1;
	else
		echo 0;
	?>