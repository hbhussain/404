<?php 

	session_start();
	
	if(!isset($_SESSION["firstname"]))
	{
		header("Location:login.php");
		
		
	}
	
	$login_user=$_SESSION["firstname"];

	$link = mysqli_connect('localhost', 'root','','404project');
	if (!$link) {
   die('Could not connect: ' . mysql_error());
}


	$user=$_SESSION["email"];
	
	$customer_check="SELECT * FROM customer where email='$user'";

	$res=mysqli_query($link, $customer_check);
	if(mysqli_num_rows($res)>0)
	{
		while($row=mysqli_fetch_array($res))
					{
		
					$_SESSION["firstname"]=$login_user=$row["firstname"];
							
							
					}
						
	}



$itemCount = 0;

if(isset($_SESSION['cart']))
{
   
   $itemCount = count(isset($_SESSION['cart']) ? $_SESSION['cart'] : array());

}
	
?>

<?php 

$user=$_SESSION["email"];

$check="SELECT count(*) as flower_id FROM cart WHERE user_id='$user'";
			
			
	$result=mysqli_query($link, $check);
				
	$row = mysqli_fetch_assoc($result);
	$item_quantity = $row['flower_id'];
			

	$_SESSION['flower']=$item_quantity;




?>
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
		
		
		
			
		
			
			$query = "UPDATE customer SET password='$pass',firstname='$name',lastname='$surname',address='$address',address2='$address2', phone_number='$phone', country='$country' WHERE email='$user' ";
			$res = mysqli_query($link,$query);
				
				if ($res) 
					{
						$register="Profile Updated Successfully ";
						
					} 
				else 
					{
				
					$errMSG = "Something went wrong, try again later...";	
					}	
				
		}
		
		
		
		
	
?>

<!DOCTYPE HTML>
<head>
<title>404 PROJECT</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>

<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script> 
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script type="text/javascript" src="js/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="js/jquery.cycle.all.js"></script>
<link rel="stylesheet" href="css/style1.css" type="text/css" />
<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css"  />

<script type="text/javascript">


$('#slider').cycle({ 
    fx:     'fade', 
	fx:		'scrollHorz',
	pager:  '#pager',
	next:	'#next',
	prev:	'#prev',

	display: 'block',
	timeout: 3000,

	pause: 	'1',
    
});

</script>

</head>
<body>
  <div class="wrap">
	<div class="header">
		<div class="headertop_desc">
		  <div class="account_desc">
			  <ul>
										<div class="cart"><li>Welcome <?php echo $login_user; ?></li>
										<li><a href="orderPage.php">Orders</a></li>
					<li><a href="Customer_cart.php">View Cart</a></li>
					<li><a href="profile.php">My Account</a></li>
					<li><a href="logout.php">logout</a></li>
				</ul>
			</div>
			<div class="clear"></div>
		</div>
		<div class="header_top">
		  <div class="logo">
			  
			</div>
			 
			  <div class="cart">
			  
			  	   <p> <span>  Cart:</span><div id="dd" class="wrapper-dropdown-2"> <?php echo $item_quantity; ?> Items
			  	   	</div></p>
			  </div>
			  <div ><h1> FLower.com </h1>   </div>
	 <div class="clear"></div>
  </div>
	<div class="header_bottom">
	     	<div class="menu">
	     		<ul>
			    	<li class="active"><a href="homepage.php">Home</a></li>
			    	<li><a href="about.html">About</a></li>
			    	<li><a href="delivery.html">Delivery</a></li>
			    	<li><a href="news.html">News</a></li>
			    	<li><a href="contact.html">Contact</a></li>
			    	<div class="clear"></div>
     			</ul>
	     	</div>
	     	<div class="search_box">
	     		<form>
	     			<input type="text" value="Search" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search';}"><input type="submit" value="">
	     		</form>
	     	</div>
	     	<div class="clear"></div>
	     </div>	     
	<div class="header_slide">
			<div class="header_bottom_left">				
						
	  	     </div>
					


	 <div class="container">

	<div id="login-form">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
    
    	<div class="col-md-12">
        
        	<div class="form-group">
            	
				<span> <?php echo $register ?> </span><br>
				<span> <?php echo $emailError ?> </span>
            </div>
        <?php 
			
			
			
			
			
				$sql = "SELECT * FROM customer where email='$user'";
			
			$qur = mysqli_query($link,$sql);

			$row = mysqli_num_rows($qur);
					

           	while($res = mysqli_fetch_array($qur))
			{
				
				
				
				
				
				?>
        	<div class="form-group">
            	<hr />
            </div>
            
            
            <div class="form-group">
            	<div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
            	<input type="text" name="name" class="form-control" value="<?php echo $res['firstname']?>" placeholder="Enter Name" maxlength="50"  />
                </div>
               
            </div>
			
			<div class="form-group">
            	<div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
            	<input type="text" name="surname" class="form-control" value="<?php echo $res['lastname']?>" placeholder="Enter Surname" maxlength="15" />
                </div>
              
            </div>
            
           
            
            <div class="form-group">
            	<div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
            	<input type="password" name="pass" class="form-control" value="<?php echo $res['password']?>" placeholder="Enter Password" maxlength="15" />
                </div>
              
            </div>
			
			<div class="form-group">
            	<div class="input-group">
                <span class="input-group-addon"><span ></span></span>
            	<textarea name="address" class="form-control" placeholder="Enter Address" /><?php echo $res['address']?></textarea>
                </div>
              
            </div>
			<div class="form-group">
            	<div class="input-group">
                <span class="input-group-addon"><span ></span></span>
            	<textarea name="address2" class="form-control" placeholder="Enter Address 2" /><?php echo $res['address2']?></textarea>
                </div>
              
            </div>
			
			<div class="form-group">
            	<div class="input-group">
                <span class="input-group-addon"><span ></span></span>
            	<input type="text" name="country" class="form-control" value="<?php echo $res['country']?>"placeholder="Enter Country" maxlength="15" />
                </div>
              
            </div> 
			<div class="form-group">
            	<div class="input-group">
                <span class="input-group-addon"><span ></span></span>
            	<input type="text" name="phone" class="form-control" value="<?php echo $res['phone_number']?>" placeholder="Enter Phone" maxlength="15" />
                </div>
              
            </div>
			
            
            <div class="form-group">
            	<hr />
            </div>
            
            <div class="form-group">
            	<button type="submit" class="btn btn-block btn-primary" name="btn-signup">Update</button>
            </div>
            
            <div class="form-group">
            	<hr />
            </div>
            
           
			<?php }?>
        </div>
   
    </form>
    </div>	

</div>

  

 
  
 
		      </div>
		   
  

    		
			
			
            


                <tr>
				
			
			
			
			
			
			
			
			
			
			
			
    	</div>
	      
			</div>
    </div
 ></div>
</body>
</html>

