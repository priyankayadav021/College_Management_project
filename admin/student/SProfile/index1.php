<?php 
	session_start();
  	if (isset($_SESSION['semail'])){
		header("location: login.php");
	}	 
 ?>