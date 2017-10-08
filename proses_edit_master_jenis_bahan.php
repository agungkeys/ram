<?php
	include_once("koneksi/conn.php");
	$id 		= $_POST['txtidjenisbahan'];
	$jb 		= $_POST['txtjenisbahan'];
	$ket		= $_POST['txtketerangan'];
	
	$ubah = "update jenis_bahan 
		set id_jenis_bahan='$id',
		nama_bahan='$jb',
		keterangan='$ket'
	where id_jenis_bahan = '$id'";
	$koneksi->Execute($ubah);
	$result = $koneksi->Affected_Rows();
	if($result == 1){
		include"master_jenis_bahan.php";
	}
?>