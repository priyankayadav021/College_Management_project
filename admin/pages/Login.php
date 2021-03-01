<!DOCTYPE html> <head>
<title>LOGIN</title>
</head> 
<body>
<link href="..\css\Login.css" rel="stylesheet" type="text/css"/>
    <div class="image">
   
        <div class="main1">
        <h2 class='head1'>Login</h2>
        <Form action="Login1.php" class="login-form" method="POST">
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
 
<!--?php 
	session_start();
  	if (isset($_SESSION['priusername'])){
		header("location: Home.php");
	}	 
 ?>
	<!DOCTYPE html>
<html lang="en">
	<head>
		<favicon>
       
		<meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">  
	    <title>Principal Login</title>
        <meta name="description" content="">
        <meta name="author" content="templatemo">
	   
	    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	    <!--[if lt IE 9]>
	      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	    <![endif]>
	</head>
	<body class="light-gray-bg">
		<div class="templatemo-content-widget templatemo-login-widget white-bg">
			<header class="text-center">
	          <div class="square"></div>
	          <h1> Login</h1>
	        </header>
	        <form action="login1.php" class="templatemo-login-form" method="POST">
	        	<div class="form-group">
	        		<div class="input-group">
		        		<div class="input-group-addon"><i class="fa fa-user fa-fw"></i></div>	        		
		              	<input type="text" class="form-control" placeholder="Username" name="Username"">           
		          	</div>	
	        	</div>
	        	<div class="form-group">
	        		<div class="input-group">
		        		<div class="input-group-addon"><i class="fa fa-key fa-fw"></i></div>	        		
		              	<input type="password" class="form-control" placeholder="******" name="Password">           
		          	</div>	
	        	</div>	          	
	          	<div class="form-group">
				    <div class="checkbox squaredTwo">
				        <input type="checkbox" id="c1" name="cc" />
						<label for="c1"><span></span>Remember me</label>
				    </div>				    
				</div>
				<div class="form-group">
					<button type="submit" class="templatemo-blue-button width-100">Login</button>
				</div>
	        </form>
		</div>
		<div class="templatemo-content-widget templatemo-login-widget templatemo-register-widget white-bg">
			<p>Can't Access Account? <strong><a href="Forgot Password.php" class="blue-text">Reset Password</a></strong></p>
		</div>
			
		
               
		
		
	</body>
</html-->