<?php
@session_start();
if (!(isset($_SESSION['username']) && $_SESSION['level']))
{
   include"index.html";
   exit;
   
}
?>