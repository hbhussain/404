<?php
	
	$emailError='';
	$register='';
	$link = mysqli_connect('localhost', 'root','','404project');

if (!$link) 
{
    die('Could not connect: ' . mysql_error());
}

	
		if ( isset($_POST['btn-signup']) ) 
		{
		
		// clean user inputs to prevent sql injections
		$name = trim($_POST['name']);
		$name = strip_tags($name);
		$name = htmlspecialchars($name);
		
		$email = trim($_POST['email']);
		$email = strip_tags($email);
		$email = htmlspecialchars($email);
		
		$pass = trim($_POST['pass']);
		$pass = strip_tags($pass);
		$pass = htmlspecialchars($pass);
		
		$surname = trim($_POST['surname']);
		$surname = strip_tags($surname);
		$surname = htmlspecialchars($surname);
		
		
		$address = trim($_POST['address']);
		$address= strip_tags($address);
		$address = htmlspecialchars($address);
		
		$address2 = trim($_POST['address2']);
		$address2= strip_tags($address2);
		$address2 = htmlspecialchars($address2);
		
		$country = trim($_POST['country']);
		$country= strip_tags($country);
		$country = htmlspecialchars($country);
		
		$phone = trim($_POST['phone']);
		$phone = strip_tags($phone);
		$phone = htmlspecialchars($phone);
		
		
		
			
		//basic email validation
		if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) 
		{
			$error = true;
			$emailError = "Please enter valid email address.";
		} 
		else 
		{
			// check email exist or not
			$query = "SELECT email FROM customer WHERE email='$email'";
			$result = mysqli_query($link, $query);
			$count = mysqli_num_rows($result);
			if($count!=0)
			{
				$error = true;
				$emailError = "Email is already in use by another customer.";
			}
			
			else
			{
			$query = "INSERT INTO customer(email,password,firstname,lastname,address,address2, phone_number, country) VALUES('$email','$pass','$name','$surname','$address','$address2','$phone','$country')";
			$res = mysqli_query($link,$query);
				
				if ($res) 
					{
						$register="Your registration is successful";
					} 
				else 
					{
				
					$errMSG = "Something went wrong, try again later...";	
					}	
			}	
		}
		}
		
		
		
	
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>404 Project</title>
<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css"  />
<link rel="stylesheet" href="css/style1.css" type="text/css" />
</head>
<body>

<div class="container">

	<div id="login-form">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
    
    	<div class="col-md-12">
        
        	<div class="form-group">
            	<h2 class="">Sign Up.</h2>
				<span> <?php echo $register ?> </span><br>
				<span> <?php echo $emailError ?> </span>
            </div>
        
        	<div class="form-group">
            	<hr />
            </div>
            
            
            <div class="form-group">
            	<div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
            	<input type="text" name="name" class="form-control" placeholder="Enter Name" maxlength="50"  />
                </div>
               
            </div>
			
			<div class="form-group">
            	<div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
            	<input type="text" name="surname" class="form-control" placeholder="Enter Surname" maxlength="15" />
                </div>
              
            </div>
            
            <div class="form-group">
            	<div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
            	<input type="email" name="email" class="form-control" placeholder="Enter Your Email" maxlength="40"  />
                </div>
               
            </div>
            
            <div class="form-group">
            	<div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
            	<input type="password" name="pass" class="form-control" placeholder="Enter Password" maxlength="15" />
                </div>
              
            </div>
			
			<div class="form-group">
            	<div class="input-group">
                <span class="input-group-addon"><span ></span></span>
            	<textarea name="address" class="form-control" placeholder="Enter Address" /></textarea>
                </div>
              
            </div>
			<div class="form-group">
            	<div class="input-group">
                <span class="input-group-addon"><span ></span></span>
            	<textarea name="address2" class="form-control" placeholder="Enter Address 2" /></textarea>
                </div>
              
            </div>
			
			<div class="form-group">
            	<div class="input-group">
                <span class="input-group-addon"><span ></span></span>
            	<input type="text" name="country" class="form-control" placeholder="Enter Country" maxlength="15" />
                </div>
              
            </div> 
			<div class="form-group">
            	<div class="input-group">
                <span class="input-group-addon"><span ></span></span>
            	<input type="text" name="phone" class="form-control" placeholder="Enter Phone" maxlength="15" />
                </div>
              
            </div>
			
            
            <div class="form-group">
            	<hr />
            </div>
            
            <div class="form-group">
            	<button type="submit" class="btn btn-block btn-primary" name="btn-signup">Sign Up</button>
            </div>
            
            <div class="form-group">
            	<hr />
            </div>
            
            <div class="form-group">
            	<a href="login.php">Sign in Here...</a>
            </div>
        
        </div>
   
    </form>
    </div>	

</div>

</body>
</html>
