<?php
	include_once("koneksi/conn.php");
	$idt 		= $_POST['txtid'];
	
	//$koneksi->debug=true;
	move_uploaded_file($_FILES["txtfiledesign"]["tmp_name"],"upload_folder/".$_FILES["txtfiledesign"]["name"]);
	$save = 
	"update detail_transaksi set 
	nama_file ='".$_FILES["txtfiledesign"]["name"]."', 
	size_file='".$_FILES["txtfiledesign"]["size"]."', 
	divisi='Printing'
	where id_detail_transaksi = '$idt'";
	 
	 
	$koneksi->Execute($save);
	$result = $koneksi->Affected_Rows();
	if($result == 1){
		header("refresh:1; url=dashboard_design.php");
	}
?>