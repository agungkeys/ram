<?php
	$id = $_GET['us'];
	echo"<script>
		var woro = confirm(\"Apakah Anda Yakin Menghapus Jenis Cetak $id\");
		if(woro){
			location.href=\"proses_delete_master_jenis_cetak.php?us=$id&proses=hapus\";
		}else{
			location.href=\"master_jenis_cetak.php\";
		}
	</script>";
?>