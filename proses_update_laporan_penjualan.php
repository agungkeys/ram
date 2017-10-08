<?php
	include_once("koneksi/conn.php");
	$idt 		= $_POST['txtid'];
	$tot 		= $_POST['txttotalbayar'];
	$sdbayar	= $_POST['txtsudahbayar'];
	$kurang 	= $_POST['txtkurang'];
	
	$masuk = $sdbayar + $kurang;
	
	$ubah = "update transaksi 
		set bayar='$masuk' where id_transaksi = '$idt'";
	$koneksi->Execute($ubah);
	$result = $koneksi->Affected_Rows();
	if($result == 1){
		header('location:laporan_penjualan.php');
	}
?>