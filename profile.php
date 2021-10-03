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
					


	 
  

 
  
 
		      </div>
		   
  

    		
			
			<?php 
			
			
			
			
			
				$sql = "SELECT * FROM customer where email='$user'";
			
			$qur = mysqli_query($link,$sql);

			$row = mysqli_num_rows($qur);
						?>
						
						
					<table  border="3">
					<tr>
					<th colspan="6">Profile</th>
					</tr>
					<tr>
				<div class="clear"></div>
			<?php

           	while($res = mysqli_fetch_array($qur))
			{
				
				?>
				<td>Email</td><td><?=$res['email']?></td></tr>
				<tr><td>First Name </td> <td><?=$res['firstname']?></td></tr>
				<tr><td>Last Name</td><td><?=$res['lastname']?></td></tr>
				<tr><td>Address 1</td><td><?=$res['address']?></td></tr>
				<tr><td>Address 2</td><td><?=$res['address2']?></td></tr>
				<tr><td> Phone Number</td><td><?=$res['phone_number']?></td></tr>
				<tr><td> Country </td><td><?=$res['country']?></td></tr>
				</tr>

			</ul>

			
		
            
			
				

                
				<tr>
				
				 
				 </tr>
				
				
				
				
				
				
				
				<?php echo '<td colspan="3"><a href="editprofile.php?email=' .$res['email']. '">Edit</a></td>'; ?>
				
                


            


        <?php } ?>


            
</tr>

                <tr>
				
			
			
			
			
			
			
			
			
			
			
			
    	</div>
	      
			</div>
    </div
 ></div>
</body>
</html>

