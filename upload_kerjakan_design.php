<?php
include_once("koneksi/conn.php");
include"cek.php";
include"waktu.php";
error_reporting(0);

$name=$_SESSION['nama'];
$lvl=$_SESSION['level'];
//cek level user
if($lvl!="Design"){
die("<script>
function goBack() {
    window.history.back()
}
</script>Anda bukan admin <button onclick='goBack()'>Kembali</button>");
}

$header="dashboard";
date_default_timezone_set("Asia/Kuala_Lumpur");
$today = date("Ymd");

$id = $_GET['us'];
	$rs=$koneksi->Execute("select * from detail_transaksi where id_detail_transaksi = '$id'");
	if ($rs->RecordCount() > 0){			
		while(!$rs->EOF){
			$idt 	= $rs->fields[0];
			$iddt 	= $rs->fields[1];
			$no 	= $rs->fields[2];
			$tglp 	= $rs->fields[3];
			$tgla	= $rs->fields[4];
			$ijc 	= $rs->fields[5];
			$ijb 	= $rs->fields[6];
			$nf 	= $rs->fields[7];
			$sf 	= $rs->fields[8];
			$uk 	= $rs->fields[9];
			$ket 	= $rs->fields[10];
			$divisi 	= $rs->fields[11];
			$status 	= $rs->fields[10];
			$qty 	= $rs->fields[10];
			$hg 	= $rs->fields[10];
			
		$rs->MoveNext(); 	
		}
	}
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


<title>Upload File Design || Reklamindo Aplication Manager</title>

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
                                        Upload File Kerjaan
                                    </span>
                                </div>
                                <div class="da-panel-content">
                                	<form id="da-ex-validate9" class="da-form" method="post" action="proses_upload_kerjakan_design.php" enctype="multipart/form-data">  
                                    	<div id="da-ex-val9-error" class="da-message error" style="display:none;"></div>
                                        <div class="da-form-inline">
                                            <div class="da-form-row" style="background-color:#CCC">
                                            	<div class="da-form-col-4-8">
                                                    <label>ID. Transaksi</label>
                                                    <div class="da-form-item large">
                                                        <input type="text" name="txtid" readonly="readonly" value="<?php echo"$iddt";?>" />
                                                    </div>
                                                </div>
                                                <div class="da-form-col-4-8">
                                                    <label>Upload File Design</label>
                                                    <div class="da-form-item large">
                                                    	<span class="formNote"><strong>File Max Upload</strong>2,5GB.</span>

                                                        <input type="file" name="txtfiledesign" class="da-custom-file" />
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        <div class="da-button-row">
                                        	<input type="submit" value="Upload" class="da-button blue" />
                                            <input type="reset" value="Batal" class="da-button red" onclick="window.location='dashboard_design.php'" />
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
