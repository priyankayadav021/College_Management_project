<?php
	session_start();
	include_once("Login.php");
	$username = $_POST['semail'];
	$password  = $_POST['passwords'];
	if ($username && $password)
	{
		$connect = mysqli_connect("localhost","root","") or die("Couldn't Connect");
        mysqli_select_db($connect,"logindetails") or die("Cant find DB");
        $sql="SELECT * FROM student WHERE semail = '$username'";
		$query = mysqli_query($connect,$sql);
		$numrows = mysqli_num_rows($query);
		if ($numrows!=0)
		{
			while($row = mysqli_fetch_assoc($query))
			{
				$dbusername = $row['semail'];
				$dbpassword = $row['passwords'];
			}
			if ($username == $dbusername && $password == $dbpassword)
			{
				$message = "Successfully Login";
				echo "<script type='text/javascript'>alert('$message');</script><center>Login Successfull..!! <br/>Redirecting you to HomePage! </br>
				If not Goto <a href='studenthome.php'> Here </a></center>
				<meta http-equiv='refresh' content ='3; url=studenthome.php'>";
				header("location: studenthome.php");
				$_SESSION['semail'] = $username;
			} else{
				$message = "Username and/or Password incorrect.";
  				echo "<script type='text/javascript'>alert('$message');</script>";
			    echo "<center>Redirecting you back to Login Page! If not Goto <a href='Login.php'> Here </a></center>";
				echo "<meta http-equiv='refresh' content ='1'; url=Login.php'>";
				}
			
		}else
		$message = "User does not exist.";
		echo "<script type='text/javascript'>alert('$message');</script>";
		echo "<center>Redirecting you back to Login Page! If not Goto <a href='Login.php'> Here </a></center>";
		echo "<meta http-equiv='refresh' content ='1'; url=Login.php'>";
	
		
	}
	else
	die("Please enter Username and Password");
	
	?>