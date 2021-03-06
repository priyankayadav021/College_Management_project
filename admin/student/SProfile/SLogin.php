<!DOCTYPE html> <head>
<title>LOGIN</title>
</head> 
<body>
<link href="/admin/css/Login.css" rel="stylesheet" type="text/css"/>
    <div class="image">
   
        <div class="main1">
        <h2 class='head1'>Login</h2>
        <Form action="/admin/pages/Login1.php" class="login-form" method="POST">
                   <FormGroup>
                        <Label  for="semail" >Email:</Label>
                        <Input type="text-light" name="semail" id="semail" required/>
                    </FormGroup>
                    <FormGroup>
                        <Label for="Password" >Password:</Label>
                        <Input type="password" name="passwords" id="passwords" required />
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