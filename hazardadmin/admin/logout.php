<?php
	include_once('config.php');
	session_start();
	unset($_SESSION["id"]);
   	unset($_SESSION["admin_username"]);
	unset($_SESSION);
	session_destroy();
	
	header("Location:login.php");
?>