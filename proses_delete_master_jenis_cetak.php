<?php
  include_once("koneksi/conn.php");  

	$id =$_REQUEST['us'];
	
	
	// sending query
	mysql_query("DELETE FROM jenis_cetak WHERE id_jenis_cetak = '$id'")
	or die(mysql_error());  	
	
	header("Location: master_jenis_cetak.php");
?> 