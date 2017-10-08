<?php
include_once("koneksi/conn.php");
include"cek.php";
include"waktu.php";
error_reporting(0);


$name=$_SESSION['nama'];
$lvl=$_SESSION['level'];
//cek level user
if($lvl!="Admin"){
die("<script>
function goBack() {
    window.history.back()
}
</script>Anda bukan admin <button onclick='goBack()'>Kembali</button>");
}
$today = date("Ymd");
date_default_timezone_set("Asia/Kuala_Lumpur");

$header="laporan_penjualan";

$jumlah_desimal ="2";
$pemisah_desimal =".";
$pemisan_ribuan=",";
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


<script type="text/javascript" src="js/demo/agung.ui.js"></script>

<!-- Validation Plugin -->
<script type="text/javascript" src="plugins/validate/jquery.validate.min.js"></script>

<!-- Demo JavaScript Files -->
<script type="text/javascript" src="js/demo/demo.tables.js"></script>
<script type="text/javascript" src="plugins/elastic/jquery.elastic.min.js"></script>
<script type="text/javascript" src="js/demo/demo.form.js"></script>


<!-- Core JavaScript Files -->
<script type="text/javascript" src="js/core/dandelion.core.js"></script>

<!-- Customizer JavaScript File (remove if not needed) -->
<script type="text/javascript" src="js/core/dandelion.customizer.js"></script>

<title>Laporan Penjualan Periode || Reklamindo Aplication Manager</title>

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
                                        Laporan Penjualan Periode
                                    </span>
                                </div>
                                <div class="da-panel-content">
                                	<form id="da-ex-validate9" class="da-form" method="post" action="?proses=cetak">  
                                    	<div id="da-ex-val9-error" class="da-message error" style="display:none;"></div>
                                        <div class="da-form-inline">
                                            <div class="da-form-row" style="background-color:#CCC">
                                            	<div class="da-form-col-4-8">
                                                    <label>Tanggal Awal</label>
                                                    <div class="da-form-item">
                                                        <input id="da-ex-datepicker" type="text" name="tgl1"/>
                                                    </div>
                                                </div>
                                                <div class="da-form-col-4-8">
                                                    <label>Tanggal Akhir</label>
                                                    <div class="da-form-item">
                                                        <input id="da-ex-datepicker1" type="text" name="tgl2"/>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        <div class="da-button-row">
                                        	<input type="submit" value="Tampilkan" class="da-button blue" />
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
						<?php
						$proses=$_GET['proses'];
						$tagl1=$_POST['tgl1'];
						$tagl2=$_POST['tgl2'];
						if($proses=='cetak'){
						?>
                    	<div class="grid_4">
                        	<div class="da-panel">
                            	<div class="da-panel-header">
                                	<span class="da-panel-title">
                                        <img src="images/icons/black/16/list.png" alt="" />
										<?php
										$newDate1 = date("d-M-Y", strtotime($tagl1));
										$newDate2 = date("d-M-Y", strtotime($tagl2));
										?>
                                        Laporan Penjualan Periode Tanggal: <b><?php echo"$newDate1";?></b>  sampai Tanggal: <b><?php echo"$newDate2";?></b>
                                    </span>
                                    
                                </div>
                                <div class="da-panel-content">
                                    <table id="da-ex-datatable-numberpaging" class="da-table">
                                        <thead>
                                            <tr>
                                                <th>ID Transaksi</th>
                                                <th>Customer</th>
                                                <th>Tanggal</th>
                                                <th>Transaksi</th>
                                                <th>Pembayaran</th>
                                                <th>Kredit</th>
                                                <th>Pemasukan</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
										
										<?php
										$tampildat="SELECT id_transaksi, nama_customer, telp, nama_kasir, ppn, bayar, total, tanggal FROM transaksi WHERE tanggal>='$tagl1' AND tanggal<='$tagl2'";
										$q = mysql_query($tampildat)or die (mysql_error());
										
										while($sql = mysql_fetch_array($q))
										{
										$tanggal = $sql['tanggal'];
										$ftanggal = date('d-m-Y',strtotime($tanggal));
										?>
                                        
                                            <tr>
                                                <td><?php echo $sql['id_transaksi']; ?></td>
                                                <td><?php echo $sql['nama_customer']; ?></td>
                                                <td><?php echo $sql['tanggal']; ?></td>
                                                <td><?php echo "Rp ".number_format($sql['total'], $jumlah_desimal, $pemisah_desimal, $pemisan_ribuan); ?></td>
                                                <td><?php echo "Rp ".number_format($sql['bayar'], $jumlah_desimal, $pemisah_desimal, $pemisan_ribuan); ?></td>
                                                <?php
												$kurang=$sql['total']-$sql['bayar'];
												if($kurang < 0)
												{
													$kurang="0";
												}
												?>
                                                <td><?php echo "Rp ".number_format($kurang, $jumlah_desimal, $pemisah_desimal, $pemisan_ribuan); ?></td>
                                                <td bgcolor="#F7F3BB">
                                                <?php
												$pemasukan=$sql['total']-$kurang;
												echo "Rp ".number_format($pemasukan, $jumlah_desimal, $pemisah_desimal, $pemisan_ribuan);
												$totalpemasukan[]=$pemasukan;
												$totalkurang[]=$kurang;
												?>
                                                </td>
                                                <td><?php 
												if($kurang!=0){
												echo"<a class='da-button blue' href=\"update_laporan_penjualan.php?us=".$sql['id_transaksi']."\">Update</a>";
												}else{
													
												}
												 ?>
												<?php 
												echo"<a target='_blank' class='da-button pink' href=\"print_transaksi_penjualan.php?us=".$sql['id_transaksi']."\">Nota</a>"; 
												
												echo" <a target='_blank' class='da-button yellow' href=\"print_perintah_kerja.php?us=".$sql['id_transaksi']."\">Perintah</a>";
												?>
												<?php
												if($lvl!="Admin")
												{
												
												}else{
												echo" <a target='_blank' class='da-button red' href=\"delete_perintah_kerja.php?us=".$sql['id_transaksi']."\">X</a>";
												}
												?>
												</td>
                                            </tr>
                                        
                                        <?php
										}
										}
										?>
                                        </tbody>
                                        <tfoot>
                                        	<tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td><b>Total Kredit</b></td>
                                                <td><b>Total Pemasukan</b></td>
                                                <td></td>
                                            </tr>
											<tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td><b>
												<?php
												$totalkurangfix=array_sum($totalkurang);
												echo"Rp ".number_format($totalkurangfix, $jumlah_desimal, $pemisah_desimal, $pemisan_ribuan);;
												?>
												</b></td>
                                                <td><b>
                                                <?php
												$totalpemasukanfix=array_sum($totalpemasukan);
												echo"Rp ".number_format($totalpemasukanfix, $jumlah_desimal, $pemisah_desimal, $pemisan_ribuan);;
												?>
                                                </b></td>
                                                <td></td>
                                            </tr>
                                        </tfoot>
                                    </table>
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
