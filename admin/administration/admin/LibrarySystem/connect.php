<?php
	$conn = new mysqli('localhost', 'root', '', 'db_ls') or die(mysqli_error($conn));
	if(!$conn){
		die("Fatal Error: Connection Failed!");
	}