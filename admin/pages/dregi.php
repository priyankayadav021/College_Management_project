<?php
    include("Regi.php");
    $connect = mysqli_connect("localhost","root","","logindetails") or die("Couldn't Connect");
    $sid = $_POST['ID'];
    $name = $_POST['name'];
    $fname = $_POST['fathername'];
    $semail = $_POST['email'];
    $course = $_POST['course'];
    $year = $_POST['year'];
    $contact = $_POST['Contact_Number'];
    $dob = $_POST['Date_of_Birth'];
    $gender = $_POST['Gender'];
    $address=$_POST['address'];
    $passwords  = $_POST["passwords"];
    if (isset($sid) &&
    isset($name) &&
    isset($fname) &&
    isset($course) &&
    isset($year) &&
    isset($semail) &&
    isset($contact) &&
    isset($dob) &&
    isset($gender) &&
    isset($passwords) && isset($_POST['submit']) )
	{
        $sql="INSERT INTO student(studentid,name,father_name,course,year,semail,contact
        ,dob,gender,passwords) VALUES ('".$sid."','".$name."','".$fname."','".$course."','".$year."','".$semail."','".$contact."','".$dob."','".$gender."','".$passwords."');";
         $query = mysqli_query($connect, $sql);

         if($query){
            echo "<center>Registered Successfully..!! <br/>Redirecting you to Login Page! </br>If not Goto <a href='Login.php'> Here </a></center>";
            echo "<meta http-equiv='refresh' content ='3; url=Login.php'>";
            
         }
     
     }else{
        echo "<center>Try Again.!! <br/>Redirecting you to registration page! </br>If not Goto <a href='Regi.php'> Here </a></center>";
        echo "<meta http-equiv='refresh' content ='3; url=Regi.php'>";
     }
    
        ?>
