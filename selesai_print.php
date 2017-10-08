<?php
include_once("koneksi/conn.php");
$id = $_GET['us'];

$ubah = "update detail_transaksi 
		set divisi='SELESAI' where id_detail_transaksi = '$id'";
	$koneksi->Execute($ubah);
	$result = $koneksi->Affected_Rows();
	if($result == 1){
		header('location:dashboard_printing.php');
	}

?>