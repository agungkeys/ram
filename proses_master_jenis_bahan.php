<?php
	include_once("koneksi/conn.php");
	
	$id 		= $_POST['txtidjenisbahan'];
	$jb 		= $_POST['txtjenisbahan'];
	$ket		= $_POST['txtketerangan'];
	
	//$koneksi->debug=true;
	$save = "insert into jenis_bahan values('$id','$jb','$ket')";
	$koneksi->Execute($save);
	$result = $koneksi->Affected_Rows();
	if($result == 1){
		include"master_jenis_bahan.php";
	}
?>