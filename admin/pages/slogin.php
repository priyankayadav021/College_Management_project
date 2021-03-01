<html> <head>
<title>LOGIN</title>

</head> <body>
<link href="..\css\Login.css" rel="stylesheet" type="text/css"/>
    <div class="image">
   
        <div class="main1">
        <h2 class='head1'>Login</h2>
        <Form action="slogin1.php" class="templatemo-login-form" method="POST">
                   <FormGroup>
                        <Label  for="staffemail" >Email:</Label>
                        <Input type="text-light" name="staffemail" id="staffemail"/>
                    </FormGroup>

                    <FormGroup>
                        <Label for="Password" >Password:</Label>
                        <Input type="password" name="passwords" id="passwords"  />
                    </FormGroup>
                   
                    
                    <FormGroup>
                       <div class='btn1'>
                        <Button type="submit" name="Login">Submit</Button> 
                        </div>
                    </FormGroup>   
    </Form>
    </div>
 </div>
</body>    
 </html>
 