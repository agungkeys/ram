<?php
	$id = $_GET['us'];
	echo"<script>
		var woro = confirm(\"Apakah Anda Yakin Menghapus Nota $id\");
		if(woro){
			location.href=\"proses_delete_perintah_kerja.php?us=$id&proses=hapus\";
		}else{
			location.href=\"laporan_penjualan.php\";
		}
	</script>";
?>
