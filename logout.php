<?php
session_start();
$username=$_SESSION['username'];
if (session_destroy()){
unset($username);
}
if($username=="")
{
header('location:index.html');
exit();
}
?>