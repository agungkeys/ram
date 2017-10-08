<?php
	include_once("koneksi/conn.php");
	error_reporting(0);
	include"cek.php";
	include"waktu.php";
	
	$name=$_SESSION['nama'];
	$lvl=$_SESSION['level'];
	//cek level user
	if($lvl!="Admin"&"Kasir"){
	die("<script>
	function goBack() {
		window.history.back()
	}
	</script>Anda bukan admin <button onclick='goBack()'>Kembali</button>");
	}
	
	$header="transaksi_penjualan";
	
	$today = date("Ymd");
	
	$idt 		= $_POST['txtid'];
	$iddt		= $_POST['txtiddt'];
	$nc			= $_POST['txtnamacustomer'];
	$telpc 		= $_POST['txttelpcustomer'];
	$ppn 		= $_POST['txtppn'];
	$byr		= $_POST['txtbayar'];
	$totbyr		= $_POST['txttotbayar'];
	$namakasir	= $_POST['kasir'];
	if($ppn == "Ya"){
	$ppnnya = $totbyr*10/100;
	$ketppn ="10%";	
	}
	if($ppn == "Tidak"){
	$ppnnya = 0;
	$ketppn ="0%";
	}
	$totalharusbayar= $totbyr+$ppnnya;
	$kembalian = $byr - $totalharusbayar;
	
	if($totalharusbayar > $byr)
	{
		$tulisan1 ="DP";
		$tulisan2 ="Kurang";
	}else{
		$tulisan1 ="Bayar";
		$tulisan2 ="Kembalian";
	}
	      

	echo"<div style='display:none;'>";
	$koneksi->debug=true;
	$datep = date("Y/m/d");
	$save = "INSERT INTO transaksi VALUES('$idt','$nc','$telpc','$namakasir','$ppn','$byr','$totbyr','','','$datep')";
	$koneksi->Execute($save);
	
	$updatestatus = "UPDATE detail_transaksi SET status='CONFIRM' WHERE id_transaksi = '$idt'";
	$koneksi->Execute($updatestatus);
	
	echo"</div>";
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<!-- Viewport metatags -->
<meta name="HandheldFriendly" content="true" />
<meta name="MobileOptimized" content="320" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

<!-- iOS webapp metatags -->
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta name="apple-mobile-web-app-status-bar-style" content="black" />

<!-- iOS webapp icons -->
<link rel="apple-touch-icon" href="touch-icon-iphone.html" />
<link rel="apple-touch-icon" sizes="72x72" href="touch-icon-ipad.html" />
<link rel="apple-touch-icon" sizes="114x114" href="touch-icon-retina.html" />

<!-- CSS Reset -->
<link rel="stylesheet" type="text/css" href="css/reset.css" media="screen" />
<!--  Fluid Grid System -->
<link rel="stylesheet" type="text/css" href="css/fluid.css" media="screen" />
<!-- Theme Stylesheet -->
<link rel="stylesheet" type="text/css" href="css/dandelion.theme.css" media="screen" />
<!--  Main Stylesheet -->
<link rel="stylesheet" type="text/css" href="css/dandelion.css" media="screen" />
<!-- Demo Stylesheet -->
<link rel="stylesheet" type="text/css" href="css/demo.css" media="screen" />

<!-- jQuery JavaScript File -->
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>

<!-- jQuery-UI JavaScript Files -->
<script type="text/javascript" src="jui/js/jquery-ui-1.8.20.min.js"></script>
<script type="text/javascript" src="jui/js/jquery.ui.timepicker.min.js"></script>
<script type="text/javascript" src="jui/js/jquery.ui.touch-punch.min.js"></script>
<link rel="stylesheet" type="text/css" href="jui/css/jquery.ui.all.css" media="screen" />

<!-- Plugin Files -->

<!-- FileInput Plugin -->
<script type="text/javascript" src="js/jquery.fileinput.js"></script>
<!-- Placeholder Plugin -->
<script type="text/javascript" src="js/jquery.placeholder.js"></script>
<!-- Mousewheel Plugin -->
<script type="text/javascript" src="js/jquery.mousewheel.min.js"></script>
<!-- Scrollbar Plugin -->
<script type="text/javascript" src="js/jquery.tinyscrollbar.min.js"></script>
<!-- Tooltips Plugin -->
<script type="text/javascript" src="plugins/tipsy/jquery.tipsy-min.js"></script>
<link rel="stylesheet" href="plugins/tipsy/tipsy.css" />

<!-- DataTables Plugin -->
<script type="text/javascript" src="plugins/datatables/jquery.dataTables.min.js"></script>

<!-- Demo JavaScript Files -->
<script type="text/javascript" src="js/demo/demo.tables.js"></script>

<!-- Demo JavaScript Files -->
<script type="text/javascript" src="plugins/elastic/jquery.elastic.min.js"></script>
<script type="text/javascript" src="js/demo/demo.form.js"></script>


<script type="text/javascript" src="js/demo/agung.ui.js"></script>

<!-- Validation Plugin -->
<script type="text/javascript" src="plugins/validate/jquery.validate.min.js"></script>

<!-- Demo JavaScript Files -->
<script type="text/javascript" src="js/demo/demo.validation.js"></script>


<!-- Core JavaScript Files -->
<script type="text/javascript" src="js/core/dandelion.core.js"></script>

<!-- Customizer JavaScript File (remove if not needed) -->
<script type="text/javascript" src="js/core/dandelion.customizer.js"></script>

<!-- Spinner Plugin -->
<script type="text/javascript" src="jui/js/jquery.ui.spinner.min.js"></script>

<!-- Chosen Plugin -->
<script type="text/javascript" src="plugins/chosen/chosen.jquery.js"></script>
<link rel="stylesheet" href="plugins/chosen/chosen.css" media="screen" />


<title>Cetak Transaksi Penjualan || Reklamindo Aplication Manager</title>

</head>

<body>
    
	<!-- Main Wrapper. Set this to 'fixed' for fixed layout and 'fluid' for fluid layout' -->
	<div id="da-wrapper" class="fluid">
    
    	<?php include"header.php";?>
    
        <!-- Content -->
        <div id="da-content">
            
            <!-- Container -->
            <div class="da-container clearfix">
            
                <!-- Sidebar -->
                <div id="da-sidebar-separator"></div>
                <?php
				include"menu_admin.php";
				?>
                
                <!-- Main Content Wrapper -->
                <div id="da-content-wrap" class="clearfix">
                
                	<!-- Content Area -->
                	<div id="da-content-area">
                    	
                        <div class="grid_4">
                        	<div class="da-panel">
                            	<div class="da-panel-header">
                                	<span class="da-panel-title">
                                        <img src="images/icons/black/16/trolly.png" alt="" />
                                        Cetak Detail Penjualan: <?php echo"$idt"; ?>
                                    </span>
                                    
                                </div>
                                <div class="da-panel-content">
                                    <table id="da-ex-datatable-numberpaging" class="da-table">
                                    <thead>
                                        <tr>
                                        	<th><b>ID Detail</b></th>
                                            <th><b>Nama Pesanan</b></th>
                                            <th><b>Jenis Cetak</b></th>
                                            <th><b>Jenis Bahan</b></th>
                                            <th><b>Size</b></th>
                                            <th><b>Ket.</b></th>
                                            <th><b>Qty</b></th>
                                            <th><b>Harga [@]</b></th>
                                            <th><b>Sub Total</b></th>
                                        </tr>
                                    </thead>
                                        <?php
										$tampildat="SELECT A.id_detail_transaksi, A.nama_order, A.tgl_ambil, B.jenis_cetak, C.nama_bahan, A.ukuran, A.keterangan, A.qty, A.harga FROM detail_transaksi A, jenis_cetak B, jenis_bahan C WHERE A.id_jenis_cetak = B.id_jenis_cetak AND A.id_jenis_bahan = C.id_jenis_bahan AND A.id_transaksi=$idt";
										$q = mysql_query($tampildat)or die (mysql_error());
										$n=1;
										while($sql = mysql_fetch_array($q)){
										$tanggal = $sql['tgl_ambil'];
										$ftanggal = date('d-m-Y',strtotime($tanggal));
										?>
                                     <tbody>
                                    	<tr>
                                        	<td><?php echo $sql['id_detail_transaksi']; ?></td>
                                            <td><?php echo $sql['nama_order']; ?></td>
                                            <td><?php echo $sql['jenis_cetak']; ?></td>
                                            <td><?php echo $sql['nama_bahan']; ?></td>
                                            <td><?php echo $sql['ukuran']; ?></td>
                                            <td><?php echo $sql['keterangan']; ?></td>
                                            <td><?php echo $sql['qty']; ?></td>
                                            <?php
											$angkarp = $sql['harga'];
											$jumlah_desimal ="2";
											$pemisah_desimal =".";
											$pemisan_ribuan=",";
											?>
                                            <td><?php echo "Rp ".number_format($angkarp, $jumlah_desimal, $pemisah_desimal, $pemisan_ribuan); ?></td>
                                            <?php
											$totalharga = $sql['qty']*$sql['harga'];
											$jumlah_desimaltot = "2";
											$pemisah_desimaltot =".";
											$pemisah_ribuantot =",";
											
											$totalbayar[]=$totalharga;
											?>
											<td><?php echo "Rp ".number_format($totalharga, $jumlah_desimaltot, $pemisah_desimaltot, $pemisah_ribuantot); ?></td>
                                        </tr>
                                    </tbody>
                                    <?php $n++; }?>
                                    <tfoot>
                                    	<?php 
											$totalbayarbelumppn=array_sum($totalbayar);
										?>
										<?php
										function terbilang($angka) {
										$angka = (float)$angka;
										$bilangan = array(
												'',
												'Satu',
												'Dua',
												'Tiga',
												'Empat',
												'Lima',
												'Enam',
												'Tujuh',
												'Delapan',
												'Sembilan',
												'Sepuluh',
												'Sebelas'
										);
									 
										if ($angka < 12) {
											return $bilangan[$angka];
										} else if ($angka < 20) {
											return $bilangan[$angka - 10] . ' Belas';
										} else if ($angka < 100) {
											$hasil_bagi = (int)($angka / 10);
											$hasil_mod = $angka % 10;
											return trim(sprintf('%s Puluh %s', $bilangan[$hasil_bagi], $bilangan[$hasil_mod]));
										} else if ($angka < 200) {
											return sprintf('Seratus %s', terbilang($angka - 100));
										} else if ($angka < 1000) {
											$hasil_bagi = (int)($angka / 100);
											$hasil_mod = $angka % 100;
											return trim(sprintf('%s Ratus %s', $bilangan[$hasil_bagi], terbilang($hasil_mod)));
										} else if ($angka < 2000) {
											return trim(sprintf('Seribu %s', terbilang($angka - 1000)));
										} else if ($angka < 1000000) {
											$hasil_bagi = (int)($angka / 1000); // karena hasilnya bisa ratusan jadi langsung digunakan rekursif
											$hasil_mod = $angka % 1000;
											return sprintf('%s Ribu %s', terbilang($hasil_bagi), terbilang($hasil_mod));
										} else if ($angka < 1000000000) {
									 
											// hasil bagi bisa satuan, belasan, ratusan jadi langsung kita gunakan rekursif
											$hasil_bagi = (int)($angka / 1000000);
											$hasil_mod = $angka % 1000000;
											return trim(sprintf('%s Juta %s', terbilang($hasil_bagi), terbilang($hasil_mod)));
										} else if ($angka < 1000000000000) {
											// bilangan 'milyaran'
											$hasil_bagi = (int)($angka / 1000000000);
											$hasil_mod = fmod($angka, 1000000000);
											return trim(sprintf('%s Milyar %s', terbilang($hasil_bagi), terbilang($hasil_mod)));
										} else if ($angka < 1000000000000000) {                          
										// bilangan 'triliun'                            
										$hasil_bagi = $angka / 1000000000000;                           
										$hasil_mod = fmod($angka, 1000000000000);                           
										return trim(sprintf('%s Triliun %s', terbilang($hasil_bagi), terbilang($hasil_mod)));                       
										} else {                            
										return 'Wow...';                        
										}                   
										}                                       
										?>
										<?php
										$angka=$totalharusbayar;
										$hasil=terbilang($angka);
										
										$jumlah_desimaltotb = "2";
										$pemisah_desimaltotb =".";
										$pemisah_ribuantotb =",";
										?>
                                        <tr  style="background-color:#e9feb9;">
                                        <td colspan="2"></td>
                                    	<td colspan="5"></td>
                                        <td><b>Total</b></td>
                                        <td colspan="2"><b><?php echo "Rp ".number_format($totalbayarbelumppn, $jumlah_desimaltotb, $pemisah_desimaltotb, $pemisah_ribuantotb); ?></b></td>
                                        </tr>
                                        <tr  style="background-color:#aed063;">
                                        <?php
                                        $totalppn=$totalbayarbelumppn*10/100;
										?>
                                        <td colspan="2"></td>
                                    	<td colspan="5"></td>
                                        <td>PPN <?php echo"$ketppn"; ?></td>
                                        <td colspan="2"><?php echo "Rp ".number_format($ppnnya, $jumlah_desimaltotb, $pemisah_desimaltotb, $pemisah_ribuantotb); ?></td>
                                        </tr>
                                        <tr  style="background-color:#E6E6E6;">
                                        <?php
										$totalharusdibayar = $totalbayarbelumppn + $totalppn
										?>
                                    	<td colspan="7"><b style="font-size:15px;">Terbilang: <i><?php echo"$hasil Rupiah"; ?></i></b></td>
                                        <td><b>Total harus dibayar</b></td>
                                        <td colspan="2"><b><?php echo "Rp ".number_format($totalharusdibayar, $jumlah_desimaltotb, $pemisah_desimaltotb, $pemisah_ribuantotb); ?></b></td>
                                        </tr>
                                        <tr bgcolor="#fc8e8e">
                                        <td colspan="2"></td>
                                    	<td colspan="5"></td>
                                        <td><?php echo "$tulisan1"; ?></td>
                                        <td colspan="2"><?php echo "Rp ".number_format($byr, $jumlah_desimaltotb, $pemisah_desimaltotb, $pemisah_ribuantotb); ?></td>
                                        </tr>
                                        <tr bgcolor="#72b0ea">
                                        <td colspan="2"></td>
                                    	<td colspan="5"></td>
                                        <td><?php echo "$tulisan2"; ?></td>
                                        <td colspan="2"><?php echo "Rp ".number_format($kembalian, $jumlah_desimaltotb, $pemisah_desimaltotb, $pemisah_ribuantotb); ?></td>
                                        </tr>
                                    </tfoot>
                                    </table>
                                </div>
                            </div>
                            <div class="da-button-row" style="text-align:right">
                            	
                                <form action="cetak_transaksi_penjualan.php" target="_blank" method="post">
                                <input name="txtid" value="<?php echo"$idt"; ?>" type="hidden" />
                                <input name="txtnamacustomer" value="<?php echo"$nc"; ?>" type="hidden" />
                                <input name="txttelpcustomer" value="<?php echo"$telpc"; ?>" type="hidden" />
                                <input name="txtppn" value="<?php echo"$ppn"; ?>" type="hidden" />
                                <input name="txtbayar" value="<?php echo"$byr"; ?>" type="hidden" />
                                <input name="txttotalbayar" value="<?php echo"$totbyr"; ?>" type="hidden" />
                                <input name="txtnamakasir" value="<?php echo"$namakasir"; ?>" type="hidden" />
                                <input name="txttanggalpenjualan" value="<?php echo"$datep"; ?>" type="hidden" />
                                <input class="da-button red" type="button" value="<< Lanjut Transaksi" onclick="window.location='transaksi_penjualan.php';" />
                            	<input type="submit" value="Cetak Nota" class="da-button blue"/>
                                </form></br>
                                <form action="cetak_perintah_kerja.php" target="_blank" method="post">
                                <input name="txtid" value="<?php echo"$idt"; ?>" type="hidden" />
                                <input name="txtnamacustomer" value="<?php echo"$nc"; ?>" type="hidden" />
                                <input name="txttelpcustomer" value="<?php echo"$telpc"; ?>" type="hidden" />
                                <input name="txtppn" value="<?php echo"$ppn"; ?>" type="hidden" />
                                <input name="txtbayar" value="<?php echo"$byr"; ?>" type="hidden" />
                                <input name="txttotalbayar" value="<?php echo"$totbyr"; ?>" type="hidden" />
                                <input name="txtnamakasir" value="<?php echo"$namakasir"; ?>" type="hidden" />
                                <input name="txttanggalperintahkerja" value="<?php echo"$datep"; ?>" type="hidden" />
                                <input type="submit" value="Cetak Perintah Kerja" class="da-button orange"/>
                                </form>
                        	</div>
                        </div>
                        
                    </div>
                    
                </div>
                
            </div>
            
        </div>
        
        <!-- Footer -->
        <div id="da-footer">
        	<div class="da-container clearfix">
            	<?php
				$tahunsekarang=date("Y");
            	echo"<p>Copyright $tahunsekarang. Reklamindo Karya Persada. All Rights Reserved. Design by <a href='http://www.agungkurniawan.net' target='_blank'>AKWEBSITE</a>";
            	?>
            </div>
        </div>
        
    </div>
    
</body>

</html>	
