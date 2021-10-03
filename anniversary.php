<?php 

	session_start();
	
	
	$link = mysqli_connect('localhost', 'root','','404project');

if (!$link) {
   die('Could not connect: ' . mysql_error());
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
					
					
					<li><?php echo $_SESSION["firstname"]; ?></li>
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
			  
	 <div class="clear"></div>
  </div>
	<div class="header_bottom">
	     	<div class="menu">
	     		<ul>
			    	<li class="active"><a href="index.html">Home</a></li>
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
				<div class="categories">
				  <ul>
				  	<h3>Categories</h3>
					
					<?php 
					
					$cat="SELECT * FROM categories ORDER BY category_id ASC";
				$cat_result=mysqli_query($link, $cat);
				if(mysqli_num_rows($cat_result)>0)
				{
					while($categories=mysqli_fetch_array($cat_result))
					{
					
					?>
					
					<li><a href="<?php echo $categories['link'];?>"><?php echo  $categories['category_name']; ?></a></li>
					
					
					
					
				<?php }}?>
					
					
					
					
				   
				  </ul>
				</div>					
	  	     </div>
					 <div class="header_bottom_right">	

<h3> Anniversary</h3>
<div class="section group">
				
				<?php 
				$query="SELECT * FROM flower WHERE category='Anniversary' ORDER BY flower_id ASC";
				$result=mysqli_query($link, $query);
				if(mysqli_num_rows($result)>0)
				{
					while($row=mysqli_fetch_array($result))
					{
					
					?>
					<form action="process.php" method="post">
					
				     <div class="grid_1_of_4 images_1_of_4">
					     <img src="images/anniversary/<?php echo $row['image']; ?>" alt="" /></a>
					 
					 <h2><?php echo $row["flower_name"] ?> </h2>
					<div class="price-details"><span class="rupees"><?php echo "Price $". $row["price"] ?></span>
					  <div class="price-number">
					<p>&nbsp;</p>
					
					    </div>
					       		<div class="add-cart">	
								Qty<input type="number" name="quantity" size="1" />
								<input type="hidden" name="user_id" value="<?php echo $user; ?>">							
								<input type="hidden" name="flower_id" value="<?php echo $row["flower_id"] ?>">
								<input type="hidden" name="flower_name" value="<?php echo $row["flower_name"] ?>">
								<input type="hidden" name="price" value="<?php echo $row["price"]; ?>">
								<input type="submit" name="sbmt" value="Add to cart"> 		
							     </div>
								 </form>
							 <div class="clear"></div>
							 
					</div>
					 
				</div>
				<?php } }?>
				</div>
					 
					 	 
		      </div>
		   <div class="clear"></div>
		</div>
   </div>
 
	      
			</div>
    </div>
 </div>
</body>
</html>

