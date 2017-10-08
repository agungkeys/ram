<?php
  include_once("koneksi/conn.php");  

	$username =$_REQUEST['us'];
	
	
	// sending query
	mysql_query("DELETE FROM user WHERE username = '$username'")
	or die(mysql_error());  	
	
	header("Location: master_user.php");
?> 