<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>留言板</title>
    <?php 	

		error_reporting(1); //關閉錯誤與警告提示
		require_once('../DB_Connect/msg_database_connect.php');//開啟MYSQL連線，連線至MessageBoard資料庫 
		if (!function_exists("GetSQLValueString")) {//轉換資料型態
			function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = ""){
			  if (PHP_VERSION < 6) {
				$theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
			  }
			
			  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);
			
			  switch ($theType) {
				case "text":
				  $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
				  break;    
				case "long":
				case "int":
				  $theValue = ($theValue != "") ? intval($theValue) : "NULL";
				  break;
				case "double":
				  $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
				  break;
				case "date":
				  $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
				  break;
				case "defined":
				  $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
				  break;
			  }
			  return $theValue;
			}
		}
	
	if(isset($_POST['name'])&&isset($_POST['comment'])){ //檢查是否為空值
//		$time="";
//		$time=date("Y-m-j H:i:s"); //留言時間
		/*echo  sprintf("INSERT INTO messageboard_record(id,nick_name,content,`time`) VALUES (%d,%s,%s,%s)",$id,$name,$comment,$time)."<br>"; //檢視查詢語句*/
		mysql_query("SET NAMES UTF8");
		mysql_select_db($database_Connect_MessageBoard, $Connect_MessageBoard);
		
		$query_insertSQL = sprintf("INSERT INTO messageboard_record (id, nick_name, content, `time`) VALUES (NULL, %s, %s, NULL)",		
							GetSQLValueString($_POST['name'], "text"),
						    GetSQLValueString($_POST['comment'], "text"));
						    //GetSQLValueString($time, "date")
		    			   //查詢語句
						   
		$query_result = mysql_query($query_insertSQL, $Connect_MessageBoard) or die(mysql_error()); //執行查詢
		header("Location:xss_msg_board.php" );
	}
	?>
</head>
<body bgcolor="white">
<center>
<font size=5 color=red face="Adobe 宋体 Std L"><strong>留言板</strong></font>
<br>
<table align=center border=0><tr><td>
<textarea name="board" rows="20" cols="80" disabled="true">
<?php 
	mysql_query("SET NAMES 'UTF8'");
	mysql_select_db($database_Connect_MessageBoard, $Connect_MessageBoard); //匯入留言板資料
	$query_Show_MeddageBoard = "SELECT * FROM messageboard_record";
	$Show_MeddageBoard = mysql_query($query_Show_MeddageBoard, $Connect_MessageBoard) or die(mysql_error());
	$row_Show_MeddageBoard = mysql_fetch_assoc($Show_MeddageBoard);
	$totalRows_Show_MeddageBoard = mysql_num_rows($Show_MeddageBoard);
	if($totalRows_Show_MeddageBoard > 0){
		do{
			echo $row_Show_MeddageBoard['id'].". ";
			echo $row_Show_MeddageBoard['time']." ";
			echo $row_Show_MeddageBoard['nick_name'].": ";
			echo $row_Show_MeddageBoard['content']."\n";
		}while($row_Show_MeddageBoard=mysql_fetch_assoc($Show_MeddageBoard));
	}
?>
</textarea>

    <form name="board_sign" method="post" onSubmit="return check();">
    <script type="text/javascript">
        function check(){
            var name=document.getElementById('t1').value;
            var content = document.getElementById('ta1').length;
            if(name==""||content==0){
                alert("暱稱或留言內容不可為空!");
                return false;
            }
        }
    </script>
  
    <font color=red face="標楷體" size="+2" style="background:#CFF">暱稱:</font> 
    <input type="text" name="name" size="30" value="輸入暱稱..." id="t1"><br>
    <font color=red face="標楷體" size="+2" style="background:#CFF">留言內容:</font><br>

    <textarea maxlength="300" name="comment" rows="5" cols="45" onKeyUp="return isMaxLen(this)" id="ta1">輸入內容...</textarea>
	<script type="text/javascript"> 
		function isMaxLen(e){ //限制內容輸入長度
			var nMaxLen=e.getAttribute? parseInt(e.getAttribute("maxlength")):""; 
			if(e.getAttribute && e.value.length> nMaxLen){ 
				e.value=e.value.substring(0,nMaxLen) 
			} 
		}
	</script>    
    <input type="submit" value="送出" align="texttop">
    <input type="reset" value="清除">
</form>
</td></tr></table></center>
</body>
</html>
