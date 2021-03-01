<?php
    include("sreggi.php");
    $connect = mysqli_connect("localhost","root","","logindetails") or die("Couldn't Connect");
    $sid = $_POST['ID'];
    $name = $_POST['name'];
    $fname = $_POST['fathername'];
    $semail = $_POST['email'];
    $department=$_POST['Department'];
    $course = $_POST['course'];
    $year = $_POST['year'];
    $contact = $_POST['Contact_Number'];
    $dob = $_POST['Date_of_Birth'];
    $gender = $_POST['Gender'];
    $address=$_POST['address'];
    $passwords  = $_POST["spassword"];
    if (isset($sid) &&
    isset($name) &&
    isset($fname) &&
    isset($department) &&
    isset($course) &&
    isset($year) &&
    isset($semail) &&
    isset($contact) &&
    isset($dob) &&
    isset($gender) &&
    isset($passwords) && isset($_POST['submit']) )
	{
        $sql="INSERT INTO staff(staffid,sname,sfather_name,department,course,year,semail,scontact
        ,sdob,sgender,saddress,spassword) VALUES ('".$sid."','".$name."','".$fname."','".$department."','".$course."','".$year."','".$semail."','".$contact."','".$dob."','".$gender."','".$address."','".$passwords."');";
         $query = mysqli_query($connect, $sql);

         if($query){
            echo "<center>Registered Successfully..!! <br/>Redirecting you to Login Page! </br>If not Goto <a href='slogin.php'> Here </a></center>";
            echo "<meta http-equiv='refresh' content ='3; url=slogin.php'>";
            
         }
     
     }else{
        echo "<center>Try Again.!! <br/>Redirecting you to registration page! </br>If not Goto <a href='sreggi.php'> Here </a></center>";
        echo "<meta http-equiv='refresh' content ='3; url=sreggi.php'>";
     }
    
        ?>