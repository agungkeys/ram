<?php
	include_once("koneksi/conn.php");
	
	$id 		= $_POST['txtidjeniscetak'];
	$jc 		= $_POST['txtjeniscetak'];
	$ket		= $_POST['txtketerangan'];
	
	//$koneksi->debug=true;
	$save = "insert into jenis_cetak values('$id','$jc','$ket')";
	$koneksi->Execute($save);
	$result = $koneksi->Affected_Rows();
	if($result == 1){
		include"master_jenis_cetak.php";
	}
?>