<?php
	
	session_start();
	
$link = mysqli_connect('localhost', 'root','','404project');

if (!$link) {
    die('Could not connect: ' . mysql_error());
}

	$errMSG='';
	
	if( isset($_POST['btn-login']) ) 
	{	
		
		// prevent sql injections/ clear user invalid inputs
		$email = trim($_POST['email']);
		$email = strip_tags($email);
		$email = htmlspecialchars($email);
		
		$pass = trim($_POST['pass']);
		$pass = strip_tags($pass);
		$pass = htmlspecialchars($pass);
		// prevent sql injections / clear user invalid inputs
		
		if(empty($email)){
			$error = true;
			$emailError = "Please enter your email address.";
		} else if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
			$error = true;
			$emailError = "Please enter valid email address.";
		}
		
		if(empty($pass)){
			$error = true;
			$passError = "Please enter your password.";
		}
		
		// if there's no error, continue to login
		
			
			$password = hash('sha256', $pass); // password hashing using SHA256
		
			$check="SELECT * FROM customer WHERE email='$email' and password='$pass'";
			
			
			$result=mysqli_query($link, $check);
				
			$count = mysqli_num_rows($result); // if uname/pass correct it returns must be 1 row
			
			if( $count == 1 ) 
			{
				$_SESSION['email'] = $email;
				$_SESSION['firstname'] = $email;
				header("Location:homepage.php");
			} 
			else 
			{
				$errMSG = "Incorrect Credentials, Try again...";
			}
				
		
		
	}
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>404 PROJECT</title>
<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css"  />

<link rel="stylesheet" href="css/style1.css" type="text/css" />
</head>
<body>

<div class="container">

	<div id="login-form">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
    
    	<div class="col-md-12">
        
        	<div class="form-group">
            	<h2 class="">Sign In.</h2>
            </div>
					<span> <?php echo $errMSG; ?></span>
        	<div class="form-group">
            	<hr />
            </div>
            
                      
            <div class="form-group">
            	<div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
            	<input type="email" name="email" class="form-control" placeholder="Your Email"  maxlength="40" />
                </div>
               
            </div>
            
            <div class="form-group">
            	<div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
            	<input type="password" name="pass" class="form-control" placeholder="Your Password" maxlength="15" />
                </div>
                
            </div>
            
            <div class="form-group">
            	<hr />
            </div>
            
            <div class="form-group">
            	<button type="submit" class="btn btn-block btn-primary" name="btn-login">Sign In</button>
            </div>
            
            <div class="form-group">
            	<hr />
            </div>
            
            <div class="form-group">
            	<a href="register.php">Sign Up Here...</a>
            </div>
        
        </div>
   
    </form>
    </div>	

</div>

</body>
</html>
<?php ob_end_flush(); ?>