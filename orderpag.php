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
	
	


?>



<?php
$link = mysqli_connect('localhost', 'root','','404project');

if (!$link) {
   die('Could not connect: ' . mysql_error());
}

$alertSuccess='';
$alertError='';

if (isset($_POST['sub']))
{
	$status = $_POST['status'];
	$flower_id = $_POST['flower_id'];			 
				 
				
				$query1="UPDATE orders SET Status='$status' WHERE flower_id=$flower_id";
				$result1=mysqli_query($link, $query1);
				$count = mysqli_affected_rows($link);
				
				if( $count >0 ) 
				{
					$alertSuccess="Status changed successfully";
				}
				else
				{
				$alertError="Error problem encountered. Try again";
				}

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
			    	<li class="active"><a href="adminHome.php">Home</a></li>
			    	
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
				      <li><a href="customers.php">View Customers </a></li>
				      <li><a href="viewFlower.php">View Flowers</a></li>
				      <li><a href="addflower.php">Add Flowers </a></li>
				      <li><a href="orderpag.php">View Orders</a></li>
					  <li><a href="addcategory.php">Add and View categories </a></li>
				      
				       
				      
				  </ul>
				</div>	
		
      </div>
	  <div style='text-align:center; color:green;'> <?php echo $alertSuccess; ?> </div>	
	  	  <div style='text-align:center;'> <?php echo $alertError; ?> </div>	

	   <?php

			          


                       

						$sql = "SELECT * FROM orders";

						$qur = mysqli_query($link,$sql);

						$row = mysqli_num_rows($qur);  // Count num of rows

						if($row == 0){

					         echo '<p class="msg">No products found </p>';

						}else{

                        ?>
					 <div class="header_bottom_right">
					   <table width="858" height="290" border="3">
					     <tr>
					       <th height="68" colspan="9">Orders </th>
				         </tr>
					     <tr>
					       <th>#
				           <th>Customer ID</th>
					       <th>Flower ID</th>
					       <th>Flower Name</th>
					       <th>Price</th>
					       <th>Quantity</th>
					       <th>Status</th>
					       <th>Change Status</th>
					       <th>Action</th>
				         </tr>
					     <div class="clear"></div>
					     <?php

           

			while($res = mysqli_fetch_array($qur))
			{
				
				 ?>
					     <form action="" method="post">
					       <tr>
					         <td><?php echo $num; ?>. </td>
					         <td><?php echo $res['user_id']?></td>
					         <input type="hidden" name="flower_id" value="<?php echo $res['flower_id']?>">
					         <td><?=$res['flower_id']?></td>
					         <td><?=$res['flower_name']?></td>
					         <td><?=$res['price']?>
					           $</td>
					         <td><?=$res['quantity']?></td>
					         <td><?=$res['Status']?></td>
					         <td><select name="status">
					           <option> Select </option>
					           <option> Preparing </option>
					           <option> Shipped </option>
					           <option> On the way </option>
					           <option> Delivered </option>
					           </select></td>
					         <td><input name="sub" type="submit" value="Confirm"></td>
			             </form>
					     <?php  $num++; } }?>
					     <tr>
					       <td colspan="9"></td>
			           </table>
					   <div class="header_bottom_right">					 
					 	 			                    
									
									      
       

    
       

       

        <ul class="item-cont">
<div class="clear"></div>

					 <div class="clear"></div>					       
      </div>
      </div>
		   <div class="clear"></div>
	  </div>
   </div>
 
   
</body>
</html>

