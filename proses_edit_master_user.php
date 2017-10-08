<?php
	include_once("koneksi/conn.php");
	$username 		= $_POST['txtusername'];
	$password 		= $_POST['txtpassword'];
	$nama		= $_POST['txtnama'];
	$level 	= $_POST['txtlevel'];
	
	$ubah = "update user 
		set username='$username',
		password='$password',
		nama='$nama',
		level='$level'
	where username = '$username'";
	$koneksi->Execute($ubah);
	$result = $koneksi->Affected_Rows();
	if($result == 1){
		header('location:master_user.php');
	}
?>