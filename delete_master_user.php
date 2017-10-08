<?php
	$username = $_GET['us'];
	echo"<script>
		var woro = confirm(\"Apakah Anda Yakin Menghapus User $username\");
		if(woro){
			location.href=\"proses_delete_master_user.php?us=$username&proses=hapus\";
		}else{
			location.href=\"master_user.php\";
		}
	</script>";
?>