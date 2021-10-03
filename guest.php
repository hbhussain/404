<?php 

	session_start();
	
	
	$link = mysqli_connect('localhost', 'root','','404project');

if (!$link) {
   die('Could not connect: ' . mysql_error());
}

$itemCount = 0;

if(isset($_SESSION['cart']))
{
   
   $itemCount = count(isset($_SESSION['cart']) ? $_SESSION['cart'] : array());

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
					
					
					<li><?php echo $_SESSION["firstname"]; ?></li>
					<li><a href="orderPage.php">Orders</a></li>
					<li><a href="Customer_cart.php">View Cart</a></li>
					<li><a href="#">My Account</a></li>
					<li><a href="logout.php">logout</a></li>
				</ul>
			</div>
			<div class="clear"></div>
		</div>
			<div class="clear"></div>
		</div>
		<div class="header_top">
		  <div class="logo">
			  
			</div>
			  <div class="cart">
			  
			  	   <p> <span>Cart:</span><div id="dd" class="wrapper-dropdown-2"> <?php echo $itemCount; ?> Items
			  	   	</div></p>
			  </div>
			  
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
					 	 <div class="slider">					     
							 <div id="slider">
			                    <div id="mover">
			                    	<div id="slide-1" class="slide">			                    
									 <div class="slider-img">
									     <a href="preview.html"><img src="images/slide-1-image.png" alt="learn more" /></a>									    
									  </div>
						             	<div class="slider-text">
		                                 <h1>Clearance<br><span>SALE</span></h1>
		                                 <h2>UPTo 20% OFF</h2>
									   <div class="features_list">
									   	<h4>Get to Know More About Our Memorable Services Lorem Ipsum is simply dummy text</h4>							               
							            </div>
							             <a href="preview.html" class="button">Shop Now</a>
					                   </div>			               
									  <div class="clear"></div>				
				                  </div>	
						             	<div class="slide">
						             		<div class="slider-text">
		                                 <h1>Clearance<br><span>SALE</span></h1>
		                                 <h2>UPTo 40% OFF</h2>
									   <div class="features_list">
									   	<h4>Get to Know More About Our Memorable Services</h4>							               
							            </div>
							             <a href="preview.html" class="button">Shop Now</a>
					                   </div>		
						             	 <div class="slider-img">
									     <a href="preview.html"><img src="images/slide-3-image.jpg" alt="learn more" /></a>
									  </div>						             					                 
									  <div class="clear"></div>				
				                  </div>
				                  <div class="slide">						             	
					                  <div class="slider-img">
									     <a href="preview.html"><img src="images/slide-2-image.jpg" alt="learn more" /></a>
									  </div>
									  <div class="slider-text">
		                                 <h1>Clearance<br><span>SALE</span></h1>
		                                 <h2>UPTo 10% OFF</h2>
									   <div class="features_list">
									   	<h4>Get to Know More About Our Memorable Services Lorem Ipsum is simply dummy text</h4>							               
							            </div>
							             <a href="preview.html" class="button">Shop Now</a>
					                   </div>	
									  <div class="clear"></div>				
				                  </div>												
			                 </div>		
		                </div>
					 <div class="clear"></div>					       
		         </div>
		      </div>
		   <div class="clear"></div>
		</div>
   </div>
 <div class="main">
    <div class="content">
    	<div class="content_top">
    		<div class="heading">
    		<h3>New Products</h3>
    		</div>
    		<div class="see">
    			<p><a href="#">See all Products</a></p>
    		</div>
    		<div class="clear"></div>
    	</div>
	      <div class="section group">
				
				<?php 
				$query="SELECT * FROM flower where category='Random' ORDER BY flower_id ASC";
				$result=mysqli_query($link, $query);
				if(mysqli_num_rows($result)>0)
				{
					while($row=mysqli_fetch_array($result))
					{
					
					?>
				     <div class="grid_1_of_4 images_1_of_4">
					     <img src="images/random/<?php echo $row['image']; ?>" alt="" /></a>
					 
					 <h2><?php echo $row["flower_name"] ?> </h2>
					<div class="price-details">
					
				       <div class="price-number">
					<p><span class="rupees"><a href="login.php> View Price </span></p>
					    </div>
					       		<div class="add-cart">								
									<a href="curd.php?action=add&pid=<?=$row['flower_id']?>&p=<?=$row['flower_name']?>" class="button-cart">Add to Cart</a>
							     </div>
							 <div class="clear"></div>
							 
					</div>
					 
				</div>
				<?php } }?>
				</div>
			</div>
    </div
 </div>
</body>
</html>

