<?php 

	session_start();
	
	
	
	
	if(!isset($_SESSION["user_id"]))
	{
		header("Location:AdminLogin.php");
		
		
	}
	
	$link = mysqli_connect('localhost', 'root','','404project');

if (!$link) {
   die('Could not connect: ' . mysql_error());
}


	
	
	


?>

<!DOCTYPE HTML>
<head>
<title>404 PROJECT</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
<link href="css/slider.css" rel="stylesheet" type="text/css" media="all"/>
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script> 
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script type="text/javascript" src="js/startstop-slider.js"></script>
</head>
<body>
  <div class="wrap">
	<div class="header">
		<div class="headertop_desc">
		  <div class="account_desc">
			  <ul>
					
					
					
					<li><a href="#">My Account</a></li>
					<li><a href="adminlogout.php">logout</a></li>
				</ul>
			</div>
			<div class="clear"></div>
		</div>
		<div class="header_top">
		  <div class="logo">
			  
			</div>
			  
			  
	
  </div>
	<div class="header_bottom">
	     	<div class="menu">
	     		<ul>
			    	<li class="active"><a href="adminHome.php">Home</a></li>
			    	
			    	<li><a href="#">My Account</a></li>
					<li><a href="logout.php">logout</a></li>
			    	
			    	<div class="clear"></div>
     			</ul>
	     	</div>
	     	
	     	<div class="clear"></div>
	     </div>	     
	<div class="header_slide">
			<div class="header_bottom_left">				
				<div class="categories">
				  <ul>
				  	<h3>Menu</h3>
				      <li><a href="customers.php">Customers </a></li>
				      <li><a href="viewFlower.php">Flowers</a></li>
				      <li><a href="addflower.php">Add Flowers </a></li>
				      <li><a href="orderpag.php">Orders</a></li>
				      
				       
				      
				  </ul>
				</div>					
	  	     </div>
					 <div class="header_bottom_right">					 
					 	 <div class="slider">					     
							 <div id="slider">
			                    <div id="mover">
			                    	hhhhhhhhh
												
			                 </div>		
		                </div>
					 <div class="clear"></div>					       
		         </div>
		      </div>
		   <div class="clear"></div>
		</div>
   </div>
 
   
</body>
</html>

