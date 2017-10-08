<?php
include_once("koneksi/conn.php");
include"cek.php";
include"waktu.php";
error_reporting(0);

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
date_default_timezone_set("Asia/Kuala_Lumpur");
$today = date("Ymd");

// cari id transaksi terakhir yang berawalan tanggal hari ini
$query = "SELECT max(id_transaksi) AS last FROM transaksi WHERE id_transaksi LIKE '$today%'";
$hasil = mysql_query($query);
$data  = mysql_fetch_array($hasil);
$lastNoTransaksi = $data['last'];

// baca nomor urut transaksi dari id transaksi terakhir
$lastNoUrut = substr($lastNoTransaksi, 8, 3); 

// nomor urut ditambah 1
$nextNoUrut = $lastNoUrut + 1;

// membuat format nomor transaksi berikutnya
$nextNoTransaksi = $today.sprintf('%03s', $nextNoUrut);


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


<title>Transaksi Penjualan || Reklamindo Aplication Manager</title>

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
                                    	<img src="images/icons/black/16/bended_arrow_down.png" alt="" />
                                        Input Transaksi Penjualan
                                    </span>
                                </div>
                                <div class="da-panel-content">
                                	<form id="da-ex-validate7" class="da-form" method="post" action="proses_transaksi_penjualan.php" enctype="multipart/form-data">  
                                    	<div id="da-ex-val7-error" class="da-message error" style="display:none;"></div>
                                        <div class="da-form-inline">
                                            <div class="da-form-row" style="background-color:#CCC">
                                            	<div class="da-form-col-4-8">
                                                    <label>NO. Pemesanan</label>
                                                    <div class="da-form-item large">
                                                        <input type="text" name="txtid" readonly="readonly" value="<?php echo"$nextNoTransaksi";?>" />
                                                    </div>
                                                </div>
                                                <?php
												$todayag = date("Ymd");

												// cari id transaksi terakhir yang berawalan tanggal hari ini
												$queryag = "SELECT max(id_detail_transaksi) AS last FROM detail_transaksi WHERE id_detail_transaksi LIKE '$todayag%'";
												$hasilag = mysql_query($queryag);
												$dataag  = mysql_fetch_array($hasilag);
												$lastNoTransaksiag = $dataag['last'];
												
												// baca nomor urut transaksi dari id transaksi terakhir
												$lastNoUrutag = substr($lastNoTransaksiag, 8, 3); 
												
												// nomor urut ditambah 1
												$nextNoUrutag = $lastNoUrutag + 1;
												
												// membuat format nomor transaksi berikutnya
												$nextNoTransaksiag = $todayag.sprintf('%03s', $nextNoUrutag);
												?>
                                                <div class="da-form-col-4-8">
                                                    <label>NO. Perintah Kerja</label>
                                                    <div class="da-form-item large">
                                                    	<b>
                                                        <input type="text" name="txtnoperintahkerja" readonly="readonly" value="<?php echo"$nextNoTransaksiag";?>"/>
														<input type="hidden" name="txtadmin" value="<?php echo"$name";?>"/>
                                                        </b>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="da-form-row">
                                            	<div class="da-form-col-4-8">
                                                    <label>Nama Pemesanan</label>
                                                    <div class="da-form-item large">
                                                        <input type="text" name="txtnamapemesanan" />
                                                    </div>
                                                </div>
                                                <div class="da-form-col-4-8">
                                                    <label>Ukuran</label>
                                                    <div class="da-form-item large">
                                                        <input type="text" name="txtukuran" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="da-form-row">
                                            	<div class="da-form-col-4-8">
                                                    <label>Tanggal Selesai</label>
                                                    <div class="da-form-item">
                                                    	<?php
														$tanggalselesai = date('Y-m-d');
														?>
                                                        <input name="txttanggalselesai" id="da-ex-datepicker" type="text" value="<?php echo"$tanggalselesai";; ?>" />
                                                    </div>
                                                </div>
                                                <div class="da-form-col-4-8">
                                                    <label>Keterangan</label>
                                                    <div class="da-form-item large">
                                                        <input type="text" name="txtketerangan" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="da-form-row">
                                            	<div class="da-form-col-4-8">
                                                    <label>Jenis Cetak</label>
                                                    <div class="da-form-item">
                                                        <span class="formNote">Ketik & Pilih Jenis Cetak</span>
                                                        <select class="chzn-select" name="txtidjeniscetak">
                                                        <?php
														$query_jenis_cetak="select * from jenis_cetak";
														$hasil_jenis_cetak= mysql_query($query_jenis_cetak);
														while($datajc=mysql_fetch_array($hasil_jenis_cetak)){
															echo"<option id='idjc' value=$datajc[id_jenis_cetak]>$datajc[jenis_cetak]</option>";	
														}
														?>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="da-form-col-4-8">
                                                    <label>Qty</label>
                                                    <div class="da-form-item">
                                                        <input name="txtqty" type="text" id="da-ex-s1" value="1" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="da-form-row">
                                            	<div class="da-form-col-4-8">
                                                    <label>Jenis Bahan</label>
                                                    <div class="da-form-item">
                                                        <span class="formNote">Ketik & Pilih Jenis Bahan</span>
                                                        <select class="chzn-select" name="txtidjenisbahan">
                                                        <?php
														$query_jenis_bahan="select * from jenis_bahan";
														$hasil_jenis_bahan= mysql_query($query_jenis_bahan);
														while($datajb=mysql_fetch_array($hasil_jenis_bahan)){
															echo"<option value=$datajb[id_jenis_bahan]>$datajb[nama_bahan]</option>";	
														}
														?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="da-form-col-4-8">
                                                    <label>Harga</label>
                                                    <div class="da-form-item large">
                                                        <input type="text" name="txtharga" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="da-form-row">
                                            	<div class="da-form-col-4-8">
                                                    <label>Input File Design</label>
                                                    <div class="da-form-item large">
                                                        <span class="formNote">Upload File Design max 2,5GB</span>
                                                        <input name="txtnfile" type="file" class="da-custom-file" />
                                                    </div>
                                                </div>
                                                <div class="da-form-col-4-8">
                                                    <label>Divisi</label>
                                                    <div class="da-form-item large">
                                                        <span class="formNote">Pilih Divisi Perintah Kerja</span>
                                                        <select name="txtdivisi">
                                                            <option value="Design">Design</option>
                                                            <option value="Printing">Printing</option>
                                                            <option value="Konstruksi">Konstruksi</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="da-button-row">
                                        	<input type="submit" value="Proses" class="da-button blue" />
                                            <input type="reset" value="Batal" class="da-button red" />
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                        
                        <div class="grid_4">
                        	<div class="da-panel">
                            	<div class="da-panel-header">
                                	<span class="da-panel-title">
                                        <img src="images/icons/black/16/trolly.png" alt="" />
                                        Detail Penjualan: <?php echo"$nextNoTransaksi"; ?>
                                    </span>
                                    
                                </div>
                                <div class="da-panel-content">
                                    <table id="da-ex-datatable-numberpaging" class="da-table">
                                    <thead>
                                        <tr>
                                        	<th><b>No</b></th>
                                            <th><b>Nama Pesanan</b></th>
                                            <th><b>Jenis Cetak</b></th>
                                            <th><b>Jenis Bahan</b></th>
                                            <th><b>Size</b></th>
                                            <th><b>Ket.</b></th>
                                            <th><b>Qty</b></th>
                                            <th><b>Harga [@]</b></th>
                                            <th><b>Sub Total</b></th>
                                            <th><b>Aksi</b></th>
                                        </tr>
                                    </thead>
                                        <?php
										$tampildat="SELECT A.id_detail_transaksi, A.nama_order, A.tgl_ambil, B.jenis_cetak, C.nama_bahan, A.ukuran, A.keterangan, A.qty, A.harga FROM detail_transaksi A, jenis_cetak B, jenis_bahan C WHERE A.id_jenis_cetak = B.id_jenis_cetak AND A.id_jenis_bahan = C.id_jenis_bahan AND A.id_transaksi=$nextNoTransaksi";
										$q = mysql_query($tampildat)or die (mysql_error());
										$n=1;
										while($sql = mysql_fetch_array($q)){
										$tanggal = $sql['tgl_ambil'];
										$ftanggal = date('d-m-Y',strtotime($tanggal));
										?>
                                     <tbody>
                                    	<tr>
                                        	<td><?php echo"$n"; ?></td>
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
                                            <td><?php echo"<a href=\"delete_transaksi_penjualan.php?us=".$sql['id_detail_transaksi']."\"><img src='images/icons/color/cross.png' /></a>"; ?></td>
                                        </tr>
                                    </tbody>
                                    <?php $n++; }?>
                                    <tfoot style="background-color:#F93;">
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
										$angka=$totalbayarbelumppn;
										$hasil=terbilang($angka);
										
										$jumlah_desimaltotb = "2";
										$pemisah_desimaltotb =".";
										$pemisah_ribuantotb =",";
										?>
                                        <tr>
                                        <td colspan="2"></td>
                                    	<td colspan="5"><b>Terbilang: <i><?php echo"$hasil Rupiah"; ?></i></b></td>
                                        <td><b>Total</b></td>
                                        <td colspan="2"><b><?php echo "Rp ".number_format($totalbayarbelumppn, $jumlah_desimaltotb, $pemisah_desimaltotb, $pemisah_ribuantotb); ?></b></td>
                                        </tr>
                                        <tr>
                                        <?php
                                        $totalppn=$totalbayarbelumppn*10/100;
										?>
                                        <td colspan="2"></td>
                                    	<td colspan="5"></td>
                                        <td>PPN 10%</td>
                                        <td colspan="2"><?php echo "Rp ".number_format($totalppn, $jumlah_desimaltotb, $pemisah_desimaltotb, $pemisah_ribuantotb); ?></td>
                                        </tr>
                                        <tr>
                                        <?php
										$totalharusdibayar = $totalbayarbelumppn + $totalppn
										?>
                                        <td colspan="2"></td>
                                    	<td colspan="5"></td>
                                        <td><b>Total harus dibayar</b></td>
                                        <td colspan="2"><b><?php echo "Rp ".number_format($totalharusdibayar, $jumlah_desimaltotb, $pemisah_desimaltotb, $pemisah_ribuantotb); ?></b></td>
                                        </tr>
                                    </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    	<div class="grid_4">
                        	<div class="da-panel">
                            	<div class="da-panel-header">
                                	<span class="da-panel-title">
                                        <img src="images/icons/color/accept.png" alt="" />
                                        Pembayaran Penjualan: <?php echo""; ?>
                                    </span>
                                </div>
                                <div class="da-panel-content">
                                	<form id="da-ex-validate8" class="da-form" method="post" action="proses_pembayaran_penjualan.php">
                                    	<div id="da-ex-val8-error" class="da-message error" style="display:none;"></div>
                                        <div class="da-form-inline">
                                            <div class="da-form-row">
                                            	<div class="da-form-col-4-8">
                                                    <label>Nama Customer<span class="required">*</span></label>
                                                    <div class="da-form-item large">
                                                        <input type="text" name="txtnamacustomer" />
                                                    </div>
                                                </div>
                                                <div class="da-form-col-4-8">
                                                    <label>Telp. Customer<span class="required">*</span></label>
                                                    <div class="da-form-item large">
                                                        <input type="text" name="txttelpcustomer" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="da-form-row">
                                            	<div class="da-form-col-4-8">
                                                    <label>PPN 10%<span class="required">*</span></label>
                                                    <div class="da-form-item large">
                                                        <select name="txtppn">
                                                            <option value="Ya">Ya</option>
                                                            <option value="Tidak">Tidak</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="da-form-col-4-8">
                                                    <label>Bayar<span class="required">*</span></label>
                                                    <div class="da-form-item large">
                                                        <input type="text" name="txtbayar" />
                                                        <input type="hidden" name="txttotbayar" value="<?php echo"$totalbayarbelumppn"; ?>" />
                                                        <input type="hidden" name="txtid" value="<?php echo"$nextNoTransaksi"; ?>" />
                                                        <input type="hidden" name="kasir" value="<?php echo"$name"; ?>" />
                                                        <input type="hidden" name="txtiddt" value="<?php echo"$nextNoTransaksiag"; ?>" />
                                                        <input type="hidden" name="txtiddt" value="<?php echo"$nextNoTransaksiag"; ?>" />
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>
                                        <div class="da-button-row">
                                        	<input type="submit" value="Simpan Transaksi" class="da-button blue" />
                                        </div>
                                    </form>
                                </div>
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
