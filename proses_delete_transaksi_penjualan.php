<?php
  include_once("koneksi/conn.php");  

	$iddt =$_REQUEST['us'];
	
	
	// sending query
	mysql_query("DELETE FROM detail_transaksi WHERE id_detail_transaksi = '$iddt'")
	or die(mysql_error());  	
	
	header("Location: transaksi_penjualan.php");
?> 