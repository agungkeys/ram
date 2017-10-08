<?php
@session_start();
include_once("koneksi/conn.php");
$username = $_POST['username'];
$password = $_POST['password'];
// query untuk mendapatkan record dari username
$query = "SELECT * FROM user WHERE username = '$username'";
$hasil = mysql_query($query);
$data = mysql_fetch_array($hasil);
// cek kesesuaian password
if ($password == $data['password'])
{
    // menyimpan username dan level ke dalam session
    $_SESSION['level'] = $data['level'];
    $_SESSION['username'] = $data['username'];
	$_SESSION['nama'] = $data['nama'];
	
	if($_SESSION['level']=="Admin"){
	header("refresh:1; url=transaksi_penjualan.php");
	}if($_SESSION['level']=="Kasir"){
	header("refresh:1; url=transaksi_penjualan.php");
	}if($_SESSION['level']=="Design"){
	header("refresh:1; url=dashboard_design.php");
	}if($_SESSION['level']=="Printing"){
	header("refresh:1; url=dashboard_printing.php");
	}else if($_SESSION['level']==""){
	header("refresh:1; url=index.html");
	}
	
	
}
else 
include"index.html";

?>
