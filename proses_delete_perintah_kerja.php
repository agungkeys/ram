<?php
  include_once("koneksi/conn.php");  

	$id =$_REQUEST['us'];
	
	
	// sending query
	mysql_query("DELETE FROM transaksi WHERE id_transaksi = '$id'")
	or die(mysql_error());  
	
	// sending query
	mysql_query("DELETE FROM detail_transaksi WHERE id_transaksi = '$id'")
	or die(mysql_error()); 	
	
	header("Location: laporan_penjualan.php");
?> 