<?php
include_once("koneksi/conn.php");
include"cek.php";
include"waktu.php";


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

$header="master_user";

$username = $_GET['us'];
	$rs=$koneksi->Execute("select * from user where username = '$username'");
	if ($rs->RecordCount() > 0){			
		while(!$rs->EOF){
			$username 	= $rs->fields[0];
			$password 	= $rs->fields[1];
			$nama 	= $rs->fields[2];
			$lv 	= $rs->fields[3];
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

<!-- Validation Plugin -->
<script type="text/javascript" src="plugins/validate/jquery.validate.min.js"></script>

<!-- Demo JavaScript Files -->
<script type="text/javascript" src="js/demo/demo.validation.js"></script>

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

<!-- Core JavaScript Files -->
<script type="text/javascript" src="js/core/dandelion.core.js"></script>

<!-- Customizer JavaScript File (remove if not needed) -->
<script type="text/javascript" src="js/core/dandelion.customizer.js"></script>

<title>Master User || Reklamindo Aplication Manager</title>

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
                                        Edit Manajemen Master User
                                    </span>
                                </div>
                                <div class="da-panel-content">
                                	<form id="da-ex-validate4" class="da-form" method="post" action="proses_edit_master_user.php">
                                    	<div id="da-ex-val4-error" class="da-message error" style="display:none;"></div>
                                        <div class="da-form-inline">
                                            <div class="da-form-row">
                                                <label>Username<span class="required">*</span></label>
                                                <div class="da-form-item large">
                                                    <input type="text" readonly="readonly" name="txtusername" value="<?php echo $username;?>" />
                                                </div>
                                            </div>
                                            <div class="da-form-row">
                                                <label>Password<span class="required">*</span></label>
                                                <div class="da-form-item large">
                                                    <input type="password" name="txtpassword" value="<?php echo $password;?>" />
                                                </div>
                                            </div>
                                            <div class="da-form-row">
                                                <label>Nama<span class="required">*</span></label>
                                                <div class="da-form-item large">
                                                    <input type="text" name="txtnama" value="<?php echo $nama;?>" />
                                                </div>
                                            </div>
                                            <div class="da-form-row">
                                                <label>Level <span class="required">*</span></label>
                                                <div class="da-form-item large">
                                                    <select name="txtlevel">
                                                        <?php
														if($lv=="Admin")
														{echo "<option value='Admin'>Admin</option>";}
														
														if($lv=="Kasir")
														{echo "
														<option value='Kasir'>Kasir</option>
														<option value='Design'>Design</option>
														<option value='Printing'>Printing</option>
														";}
														
														if($lv=="Design")
														{echo "
														<option value='Design'>Design</option>
														<option value='Printing'>Printing</option>
														<option value='Kasir'>Kasir</option>
														";}
														
														if($lv=="Printing")
														{echo "
														<option value='Printing'>Printing</option>
														<option value='Kasir'>Kasir</option>
														<option value='Design'>Design</option>
														";}
														?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="da-button-row">
                                        	<input type="submit" value="Proses" class="da-button blue" />
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        
                    	<div class="grid_4">
                        	<div class="da-panel">
                            	<div class="da-panel-header">
                                	<span class="da-panel-title">
                                        <img src="images/icons/black/16/list.png" alt="" />
                                        Data Master User
                                    </span>
                                    
                                </div>
                                <div class="da-panel-content">
                                    <table id="da-ex-datatable-default" class="da-table">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Username</th>
                                                <th>Password</th>
                                                <th>Nama</th>
                                                <th>Level</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
										$tampildat=mysql_query("SELECT * FROM user ORDER BY username ASC");
										$no = 1;
										while($tampildata=mysql_fetch_array($tampildat)){
										
										?>
                                            <tr>
                                                <td><?php echo"$no"; ?><?php $no++ ?></td>
                                                <td><?=$tampildata['username']?></td>
                                                <td><?=$tampildata['password']?></td>
                                                <td><?=$tampildata['nama']?></td>
                                                <td><?=$tampildata['level']?></td>
                                                <td class="da-icon-column">
                                                	<a href="edit_master_user.php?us=<?=$tampildata['username']?>"><img src="images/icons/color/pencil.png" /></a>
                                                    <?php
													if($tampildata['level']=="Admin")
													{
														
													}else{
                                                	echo"<a href=\"delete_master_user.php?us=".$tampildata['username']."\"><img src='images/icons/color/cross.png' /></a>"; 
													}
													?>
                                                </td>

                                            </tr>
                                        <?php } ?>
                                        </tbody>
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
