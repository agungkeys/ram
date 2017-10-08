<?php
	include_once("koneksi/conn.php");
	
	$user 		= $_POST['txtusername'];
	$pass 		= $_POST['txtpassword'];
	$nama		= $_POST['txtnama'];
	$level		= $_POST['txtlevel'];
	$cekdata="select username from user where username='$user'"; 
	$ada=mysql_query($cekdata) or die(mysql_error()); 
	if(mysql_num_rows($ada)>0) 
	{ 
		echo '<script language="javascript">alert("Username Telah digunakan Mohon Gunakan Username Lain...!!!")</script>';
		echo '<script language="javascript">window.location = "master_user.php"</script>';
		
	} 
	else 
	{
	//$koneksi->debug=true;
	$save = "insert into user values('$user','$pass','$nama','$level','0')";
	$koneksi->Execute($save);
	$result = $koneksi->Affected_Rows();
	if($result == 1){
		include"master_user.php";
	}
	}

?>