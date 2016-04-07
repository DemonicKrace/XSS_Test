<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title></title>
</head>
<body>
	<h1>There is user list.</h1>
<?php
	require_once('../DB_Connect/msg_database_connect.php');//開啟MYSQL連線，連線至資料庫 
	session_start();
	mysql_query("SET NAMES 'UTF8'");
	mysql_select_db($database_Connect_MessageBoard, $Connect_MessageBoard);
	$query_Show_MeddageBoard = "SELECT * FROM messageboard_record";
	$query_result = mysql_query($query_Show_MeddageBoard, $Connect_MessageBoard) or die(mysql_error());
	$row_Show_MeddageBoard = mysql_fetch_assoc($query_result);
	$totalRows_Show_MeddageBoard = mysql_num_rows($query_result);
	if($totalRows_Show_MeddageBoard > 0){
		do{
//			echo $row_Show_MeddageBoard['id']." ";
//			echo $row_Show_MeddageBoard['time']." ";
			echo $row_Show_MeddageBoard['nick_name'].' <br>';
//			echo $row_Show_MeddageBoard['content']."\n";
		}while($row_Show_MeddageBoard=mysql_fetch_assoc($query_result));
	}
?>
</body>
</html>