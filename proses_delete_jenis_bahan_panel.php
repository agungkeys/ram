<?php
  include_once("koneksi/conn.php");  

	$id =$_REQUEST['us'];
	
	
	// sending query
	mysql_query("DELETE FROM jenis_bahan WHERE id_jenis_bahan = '$id'")
	or die(mysql_error());  	
	
	header("Location: master_jenis_bahan.php");
?> 