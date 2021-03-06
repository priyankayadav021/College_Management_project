<?php 
	session_start();
  	if (isset($_SESSION['staffemail'])){
		header("location: login.php");
	}	 
 ?>