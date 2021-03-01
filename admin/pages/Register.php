 <?php
$servername="localhost";
$Username="root";
$password="";
$dbname="login";
//try{
  //$con = new PDO("mysql: host= $servername; dbname=$dbname", $Username, $password);

//}

?>
<!DOCTYPE html>
<html>
<head>
  <title> Register </title>
  <style type="text/css">
  .image{
    background-image: url('https://www.ueab.ac.ke/wp-content/uploads/2017/04/Website-Design-Background.jpg ');
    width:100%;
    height:100vh;
}

.main{
    text-align:left ;
    
    width: 300px;
    margin-left: 29em;
    margin-top:0px;
    margin-bottom:15px;
    align-content:center;
    padding-top: 50px;
    padding-bottom: 6px;
    padding-right:10px;
    padding-left:8px;
    color: white;
   
    height: 450px;
    
    
    
}
h1{
      text-align: center;
}
.btn1{
    margin-left:1em ;
    margin-right: 1px;
    padding-right: 3em;
    padding-top: 40px;
    left:1em;
    right:0em;
    color: thistle;
    

} 
</style>
</head>
<body>
<div class='image'>
   
        <div class="main">
        <h1 class='head1'>Register as a Student</h1>
        <Form>
                   <FormGroup>
                        <Label  for="email" >Email</Label>
                        <Input type="text-light" name="email" id="email"/> 
                             
                    </FormGroup>
                    <br></br>

                    <FormGroup>
                        <Label for="Name">Name</Label>
                        <Input type="text" name="Name" id="Name" />
                             
                    </FormGroup>
                    <br></br>
                    <FormGroup>
                        <Label  for="Father's Name" >Father's Name</Label>
                        <Input type="text-light" name="Father's Name" id="Father's Name"/> 
                             
                    </FormGroup>
                    <br></br>
                    <FormGroup>
                        <Label  for="Father's Name" >Mother's Name</Label>
                        <Input type="text-light" name="Mother's Name" id="Mother's Name"/> 
                             
                    </FormGroup>
                    <br></br>
                    <FormGroup>
                        <Label  for="Blood Group" >Blood Group</Label>
                        <Input type="text-light" name="Blood Group" id="Blood Group"/> 
                             
                    </FormGroup>
                    <br></br>
                    <FormGroup>
                        <Label for="School Studied">School Studied</Label>
                        <Input type="text" name="School Studied" id="School Studied" />
                             
                    </FormGroup>
                    <br></br>
                    <FormGroup>
                        <Label for="Batch">Batch</Label>
                        <Input type="text" name="Batch" id="Batch" />
                             
                    </FormGroup>
                    <br></br>
                    <FormGroup>
                        <Label  for="Class 10th percentage" >Class 10th percentage</Label>
                        <Input type="text-light" name="Class 10th percentage" id="Class 10th percentage"/> 
                             
                    </FormGroup>
                    <br></br>
                    <FormGroup>
                        <Label  for="Class 12th percentage" >Class 12th percentage</Label>
                        <Input type="text-light" name="Class 12th percentage" id="Class 12th percentage"/> 
                             
                    </FormGroup>
                    <br></br>
                    <FormGroup>
                        <Label  for="Year" >Year</Label>
                        <Input type="text-light" name="Year" id="Year"/> 
                             
                    </FormGroup>
                    <br></br>
                    <FormGroup>
                        <Label  for="Contact number" >Contact number</Label>
                        <Input type="text" name="Contact number" id="Contact number"/> 
                             <FormGroup>
                        <br></br>
                       <div class='btn1'>
                        <a href="Modules.php"><Button style="color:blue; cursor: pointer;" variant="primary" type="submit" >
                           Submit
                        </Button></a>  
                        </div>
                    </FormGroup>   
    </Form>
    </div>
 </div>


</body>
</html>



