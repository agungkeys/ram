<?php
include_once("koneksi/conn.php");
include"cek.php";
include"waktu.php";


$name=$_SESSION['nama'];
$lvl=$_SESSION['level'];
//cek level user
if($lvl!="Printing"){
die("<script>
function goBack() {
    window.history.back()
}
</script>Anda bukan printing <button onclick='goBack()'>Kembali</button>");
}

//jika bukan admin jangan lanjut
$today = date("Ymd");

$header="dashboard";

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

<?php
include"favicon.php";
?>
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

<!-- Validation Plugin -->
<script type="text/javascript" src="plugins/validate/jquery.validate.js"></script>

<!-- Statistic Plugin JavaScript Files (requires metadata and excanvas for IE) -->
<script type="text/javascript" src="js/jquery.metadata.js"></script>
<!--[if lt IE 9]>
<script type="text/javascript" src="js/excanvas.js"></script>
<![endif]-->
<script type="text/javascript" src="js/core/plugins/dandelion.circularstat.min.js"></script>

<!-- Wizard Plugin -->
<script type="text/javascript" src="js/core/plugins/dandelion.wizard.min.js"></script>

<!-- Fullcalendar Plugin -->
<script type="text/javascript" src="plugins/fullcalendar/fullcalendar.min.js"></script>
<script type="text/javascript" src="plugins/fullcalendar/gcal.js"></script>
<link rel="stylesheet" href="plugins/fullcalendar/fullcalendar.css" media="screen" />
<link rel="stylesheet" href="plugins/fullcalendar/fullcalendar.print.css" media="print" />

<!-- Load Google Chart Plugin -->
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script type="text/javascript">
	// Load the Visualization API and the piechart package.
	google.load('visualization', '1.0', {'packages':['corechart']});
</script>
<!-- Debounced resize script for preventing to many window.resize events
      Recommended for Google Charts to perform optimally when resizing -->
<script type="text/javascript" src="js/jquery.debouncedresize.js"></script>

<!-- Demo JavaScript Files -->
<script type="text/javascript" src="js/demo/demo.dashboard.js"></script>

<!-- Core JavaScript Files -->
<script type="text/javascript" src="js/core/dandelion.core.js"></script>

<!-- Customizer JavaScript File (remove if not needed) -->
<script type="text/javascript" src="js/core/dandelion.customizer.js"></script>





<title>Dashboard Printing || Reklamindo Aplication Manager</title>

</head>

<body>
	
	<!-- Main Wrapper. Set this to 'fixed' for fixed layout and 'fluid' for fluid layout' -->
	<div id="da-wrapper" class="fluid">
    
        <?php include"header.php";?>
    
        <!-- Content -->
        <div id="da-content">
            
            <!-- Container -->
            <div class="da-container clearfix">
                
	            <!-- Sidebar Separator do not remove -->
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
                                        <img src="images/icons/black/16/list.png" alt="" />
                                        Realtime Data Printing || Perintah Kerja
                                    </span>
                                    
                                </div>
                                <div class="da-panel-content">
                                    
                                        	<div id="tableIDprint">
                                            	<?php include_once'realtime_design_printing.php'; ?>
                                            </div>
                                       		<script type='text/javascript'>
												  var tableprint = $('#tableIDprint');
												 // refresh every 5 seconds
												 var refresherprint = setInterval(function(){
												   table.load("realtime_design_printing.php");
												 }, 3000);
												 setTimeout(function() {
												   clearInterval(refresherprint);
												 }, 1800000);
											</script>
                                        
                                </div>
                            </div>
                        </div>
                        
                        <div class="grid_4">
                        	<div class="da-panel">
                            	<div class="da-panel-header">
                                	<span class="da-panel-title">
                                        <img src="images/icons/black/16/list.png" alt="" />
                                        Realtime Data Printing || File On Proggress
                                    </span>
                                    
                                </div>
                                <div class="da-panel-content">
                                    
                                        	<div id="tableIDkerjaprint">
                                            	<?php include_once'realtime_design1_print.php'; ?>
                                            </div>
                                       		<script type='text/javascript'>
												  var tablekerjaprint = $('#tableIDkerjaprint');
												 // refresh every 5 seconds
												 var refresherkerjaprint = setInterval(function(){
												   tablekerjaprint.load("realtime_design1_print.php");
												 }, 3000);
												 setTimeout(function() {
												   clearInterval(refresherkerjaprint);
												 }, 1800000);
											</script>
                                        
                                </div>
                            </div>
                        </div>
                        
                        <div class="grid_4">
                        	<div class="da-panel">
                            	<div class="da-panel-header">
                                	<span class="da-panel-title">
                                        <img src="images/icons/black/16/list.png" alt="" />
                                        Realtime Data Printing || Finish...
                                    </span>
                                    
                                </div>
                                <div class="da-panel-content">
                                    
                                        	<div id="tableIDprintselesai">
                                            	<?php include_once'realtime_design2_print.php'; ?>
                                            </div>
                                       		<script type='text/javascript'>
												  var tablekerjaprintselesai = $('#tableIDprintselesai');
												 // refresh every 5 seconds
												 var refresherkerjaprintselesai = setInterval(function(){
												   tablekerjaprintselesai.load("realtime_design2_print.php");
												 }, 3000);
												 setTimeout(function() {
												   clearInterval(refresherkerjaprintselesai);
												 }, 1800000);
											</script>
                                        
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
