<?php
	include_once("koneksi/conn.php");
	$id 		= $_POST['txtidjeniscetak'];
	$jc 		= $_POST['txtjeniscetak'];
	$ket		= $_POST['txtketerangan'];
	
	$ubah = "update jenis_cetak 
		set id_jenis_cetak='$id',
		jenis_cetak='$jc',
		keterangan='$ket'
	where id_jenis_cetak = '$id'";
	$koneksi->Execute($ubah);
	$result = $koneksi->Affected_Rows();
	if($result == 1){
		include"master_jenis_cetak.php";
	}
?>