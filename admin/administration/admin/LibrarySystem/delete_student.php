<?php
	require_once 'connect.php';
	$conn->query("DELETE FROM `student` WHERE `student_no` = '$_REQUEST[student_id]'") or die(mysqli_error($conn));
	header('location: student.php');