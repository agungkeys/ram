<?php
include_once "adodb/adodb.inc.php";
$koneksi = NewADOConnection("mysql");
$koneksi->Connect("localhost", "root", "","ram");

	if(! $koneksi){
	echo "GAGAL";
	}
global $koneksi;
define('ROWS_PER_PAGE', 5);
?>