<?php
	$id = $_GET['us'];
	echo"<script>
		var woro = confirm(\"Apakah Anda Yakin Menghapus Nama Bahan? $id\");
		if(woro){
			location.href=\"proses_delete_jenis_bahan_panel.php?us=$id&proses=hapus\";
		}else{
			location.href=\"master_jenis_bahan.php\";
		}
	</script>";
?>