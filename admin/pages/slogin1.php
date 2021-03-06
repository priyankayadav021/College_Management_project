<?php
	include("slogin.php");
	session_start();
	$susername = $_POST['staffemail'];
	$password  = $_POST['passwords'];
	if ($susername && $password)
	{
		$connect = mysqli_connect("localhost","root","") or die("Couldn't Connect");
        mysqli_select_db($connect,"logindetails") or die("Cant find DB");
        $sql="SELECT * FROM staff WHERE staffemail = '$susername'";
		$query = mysqli_query($connect,$sql);
		$numrows = mysqli_num_rows($query);
		if ($numrows!=0)
		{
			while($row = mysqli_fetch_assoc($query))
			{
				$dbusername = $row['staffemail'];
				$dbpassword = $row['spassword'];
			}
			if ($susername == $dbusername && $password == $dbpassword)
			{
				  echo "<center>Login Successfull..!! <br/>Redirecting you to HomePage! </br>If not Goto <a href='staffhome.php'> Here </a></center>";
			  echo "<meta http-equiv='refresh' content ='3; url=staffhome.php'>";
			  header("location: staffhome.php");
				$_SESSION['staffemail'] = $susername;
			} else{
				$message = "Username and/or Password incorrect.";
  			echo "<script type='text/javascript'>alert('$message');</script>";
			  echo "<center>Redirecting you back to Login Page! If not Goto <a href='slogin.php'> Here </a></center>";
			  echo "<meta http-equiv='refresh' content ='1'; url=slogin.php'>";
			  }
			
		}else
		$message = "Username not exist.";
		echo "<script type='text/javascript'>alert('$message');</script>";
		echo "<center>Redirecting you back to Login Page! If not Goto <a href='slogin.php'> Here </a></center>";
		echo "<meta http-equiv='refresh' content ='1'; url=slogin.php'>";
	
	}
	else
	die("Please enter susername and Password");
	
	?>