<?php

	//create messageboard_record table
	/*
	require_once('../DB_Connect/hacker_db_connect.php'); 

	mysql_query("SET NAMES UTF8");

	mysql_select_db($database_Connect_MessageBoard, $Connect_MessageBoard);
	
	
	$query_insertSQL = 
		'CREATE TABLE IF NOT EXISTS messageboard_record (
		id INT(10) NULL AUTO_INCREMENT PRIMARY KEY,
		nick_name VARCHAR(300) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NOT NULL,
		content LONGTEXT CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NOT NULL,
		time TIMESTAMP DEFAULT CURRENT_TIMESTAMP)';
					   
	$query_result = mysql_query($query_insertSQL, $Connect_MessageBoard) or die(mysql_error());
	*/


	//create user_cookie table
	/*
	require_once('../DB_Connect/msg_database_connect.php'); 

	mysql_query("SET NAMES UTF8");

	mysql_select_db($database_Connect_MessageBoard, $Connect_MessageBoard);
	
	
	$query_insertSQL = 
		'CREATE TABLE IF NOT EXISTS user_cookie (
			id INT(10) NULL AUTO_INCREMENT PRIMARY KEY,
			ip VARCHAR(30) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci',
			cookie LONGTEXT CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NOT NULL,
			time TIMESTAMP DEFAULT CURRENT_TIMESTAMP)';
					   
	$query_result = mysql_query($query_insertSQL, $Connect_MessageBoard) or die(mysql_error());
	*/

?>