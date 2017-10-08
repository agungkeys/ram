<?php
	include_once("koneksi/conn.php");
	$idt 		= $_POST['txtid'];
	$idpk 		= $_POST['txtnoperintahkerja'];
	$np 		= $_POST['txtnamapemesanan'];
	$uk 		= $_POST['txtukuran'];
	$ts	 		= $_POST['txttanggalselesai'];
	$ket 		= $_POST['txtketerangan'];
	$idjc 		= $_POST['txtidjeniscetak'];
	$idjb 		= $_POST['txtidjenisbahan'];
	$dvs 		= $_POST['txtdivisi'];
	$qty 		= $_POST['txtqty'];
	$hg 		= $_POST['txtharga'];
	$adm 		= $_POST['txtadmin'];
	
	//$koneksi->debug=true;
	$datet = date("Y/m/d");
	move_uploaded_file($_FILES["txtnfile"]["tmp_name"],"upload_folder/".$_FILES["txtnfile"]["name"]);
	$save = "insert into detail_transaksi values('$idt','$idpk','$np','$datet','$ts','$idjc','$idjb','".$_FILES["txtnfile"]["name"]."','".$_FILES["txtnfile"]["size"]."','$uk','$ket','$dvs','','$qty','$hg','$adm')";
	$koneksi->Execute($save);
	$result = $koneksi->Affected_Rows();
	if($result == 1){
		header("refresh:1; url=transaksi_penjualan.php");
	}
?>