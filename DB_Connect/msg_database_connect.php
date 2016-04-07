<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_Connect_MessageBoard = "";
$database_Connect_MessageBoard = "";
$username_Connect_MessageBoard = "";
$password_Connect_MessageBoard = "";
$Connect_MessageBoard = mysql_pconnect($hostname_Connect_MessageBoard, $username_Connect_MessageBoard, $password_Connect_MessageBoard) or trigger_error(mysql_error(),E_USER_ERROR); 
?>