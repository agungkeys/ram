<?php
	$iddt = $_GET['us'];
	echo"<script>
		var woro = confirm(\"Apakah Anda Yakin Menghapus Pembelian $iddt\");
		if(woro){
			location.href=\"proses_delete_transaksi_penjualan.php?us=$iddt&proses=hapus\";
		}else{
			location.href=\"transaksi_penjualan.php\";
		}
	</script>";
?>