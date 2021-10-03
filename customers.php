<?php 

	session_start();
	

	if(!isset($_SESSION["user_id"]))
	{
		header("Location:AdminLogin.php");
		
		
	}
	
	$admin=$_SESSION["user_id"];
	$link = mysqli_connect('localhost', 'root','','404project');

if (!$link) {
   die('Could not connect: ' . mysql_error());
}
$num=1;

	
	// if session is not set this will redirect to login page
	
	// select loggedin users detail
	$res=mysqli_query($link, "SELECT * FROM customer");
	


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
					
					
					
					<li><a href="#"><?php echo $admin; ?> </a></li>
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
			    	<li class="active"><a href="index.html">Home</a></li>
			    	
			    		<li><a href="#"><?php echo $admin; ?> </a></li>
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
				  	<h3>MENU</h3>
				      <h4><li><a href="customers.php"> View Customers</a></li></h4>
				      <li><a href="viewFlower.php">View Flowers</a></li>
				      <li><a href="addflower.php">Add Flowers </a></li>
				      <li><a href="orderpag.php">View Orders</a></li>
					  <li><a href="addcategory.php">Add and View categories </a></li>
				      
				       
				      
				  </ul>
				</div>					
	  	     </div>
			 <ul class="item-cont">


					 
					 	 <?php

$start=0;
$limit=10;

if(isset($_GET['id']))
{
	$id=$_GET['id'];
	$start=($id-1)*$limit;
}
else{
	$id=2;
}
//Fetch from database first 10 items which is its limit. For that when page open you can see first 10 items. 
$query=mysqli_query($link,"select * from .customer LIMIT $start, $limit");
?>
<ul>
<?php

if(mysqli_num_rows($query)>0)
{
			echo '<div class="header_bottom_right">';
				echo 	'<table width="539" height="304" border="3">';
				echo '<tr>';
					 echo '<th colspan="8">Customer List </th>';
					echo '</tr>';
					echo '<tr>';
					
				echo '<th>#</th>';
				echo '<th>Customer ID</th>';
				echo '<th>First Name</th>';
				echo '<th>last Name</th>';
				echo '<th>Email</th>';
				echo '<th>Address</th>';
				echo '<th>Phone Number</th>';
				echo '<th>Action</th>';
				echo '</tr>';

		echo '</ul>';	
//print 10 items
while($res=mysqli_fetch_array($query))
{
	

?>
<tr>
				<td><?php echo $num; ?></td>
				 <td><?=$res['user_id']?></td>
				
				<td><?=$res['firstname']?></td>
				<td><?=$res['lastname']?></td>
				 <td><?=$res['email']?></td>
				<td><?=$res['address']?></td>
				<td><?=$res['phone_number']?></td>
				<?php echo '<td><a href="deleteCart.php?user_id=' .$res['user_id']. '">Edit</a></td>'; ?>
				</tr>
<?php  $num++; }} 

else 
{
	echo "End of customer list";
}



?>
</ul>
<?php 
//fetch all the data from database.
$quer=mysqli_query($link,"select * from customer");
$rows=mysqli_num_rows($quer);
//calculate total page number for the given table in the database 
$total=ceil($rows/$limit);?>
<ul class='page'>
</table>
<?php if($id>1)
{
	//Go to previous page to show previous 10 items. If its in page 1 then it is inactive
	echo "<a href='?id=".($id-1)."' class='button'>PREVIOUS</a>";
}
if($id=$total)
{
	////Go to previous page to show next 10 items.
	echo "<a href='?id=".($id+1)."' class='button'>NEXT</a>";
}
?>

	
		                </div>
					 <div class="clear"></div>					       
		         </div>
		      </div>
		   <div class="clear"></div>
		</div>
   </div>
 
   
</body>
</html>

