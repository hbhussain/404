<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("location: AdminLogin.php");
} 

$admin=$_SESSION["user_id"];
?>

<?php
$link = mysqli_connect('localhost', 'root','','404project');

if (!$link) {
   die('Could not connect: ' . mysql_error());
}
 $alert='';
  $image_fail='';
  $flowerUpload='';
  $imageUpload='';
   $alertSuccess='';
	$alertError='';	

if (isset($_POST['send'])) {
     
  
    $cat_name = addslashes($_POST['cat_name']);
    $cat_link = addslashes($_POST['cat_link']);
  	
          
           $query = "INSERT INTO categories (category_name, link) VALUES ('$cat_name','$cat_link');";

                $result = mysqli_query($link, $query);

                if (mysqli_affected_rows($link) == 1) 
				
				{
                    $alert= "Category Successfully Added";
					
					
				}
				
				else
				{
					
					$fail="Error occur,category not added!!! Try again";
					
				}
        }
     
?>


<?php 


$successfully='';
$notsuccess='';
if(isset($_GET['category_id']))
{
		$category_id = $_GET['category_id'];
		$result=mysqli_query($link,"DELETE FROM categories WHERE category_id='$category_id'");


		if($result && mysqli_affected_rows($link)==1)
			{
	
				$successfully="Category has been deleted successfully";
	
					
			}

		else{
			
			
			$notsuccess= "Sorry error occurs!!! Try again ";
			
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
				    <li><a href="customers.php">View Customers </a></li>
				      <li><a href="viewFlower.php">View Flowers</a></li>
				      <li><a href="addflower.php">Add Flowers </a></li>
				      <li><a href="orderpag.php">View Orders</a></li>
					  <li><a href="addcategory.php">Add and View categories </a></li>
				      
				       
				      
				  </ul>
				</div>					
</div>
			 
			  <?php echo $alert; ?>
				
				<?php echo $flowerUpload; ?>
				
					 <div class="header_bottom_right">					 
					 	
	<form name="form" method="post" action="" enctype="multipart/form-data">
	<table width="56%">
		 
		
		<tr>
		<th colspan="3"> <h1 align="center"> Add Category</h1></th>
		</tr>
		<tr>
			<td>Category Name:</td>
			<td><input type="text" name="cat_name" maxlength="20"></td>
		</tr>
		<tr>
			<td >Category Link:</td>
			<td ><input type="text"  name="cat_link"></td>
		</tr>
		
		
		<br>
		<td colspan="4" height="20"><input type="submit" name="send" size="35"></td>
	</table>
	<br>
	<br>
		
</form>
<br>


		<div style='text-align:center; color:green;'> <?php echo $successfully; ?> </div>	
					<div style='text-align:center;'> <?php echo $notsuccess; ?> </div>	

	   <?php

			          


                       $num=1;

						$sql = "SELECT * FROM categories";

						$qur = mysqli_query($link,$sql);

						$row = mysqli_num_rows($qur);  // Count num of rows

						if($row == 0){

					         echo '<p class="msg">No products found </p>';

						}else{

                        ?>
					 <div class="header_bottom_right">
					   <table width="85%" height="290" border="3">
					     <tr>
					       <th height="68" colspan="9">Categories </th>
				         </tr>
					     <tr>
					       <th width="7%">#
				           <th width="24%">Category ID</th>
					       <th width="28%">Category Name</th>
					       <th width="16%">Link </th>
						    <th width="25%">Action</th>
	
				         </tr>
					     <div class="clear"></div>
					     <?php

           

			while($res = mysqli_fetch_array($qur))
			{
				
				 ?>
					     <form action="" method="post">
					       <tr>
					         <td><?php echo $num; ?>. </td>
					         <td><?php echo $res['category_id']?></td>
					          <td><?=$res['category_name']?></td>
					         <td><?=$res['link']?></td>
					         <?php echo '<td><a href="addcategory.php?category_id=' .$res['category_id']. '">Delete</a></td>'; ?>
			             </form>
					     <?php  $num++; } }?>
					     <tr>
					       <td colspan="9"></td>
			           </table>
					   <div class="header_bottom_right">					 
					 	 			                    
									
									      
       

    
       

       

        <ul class="item-cont">
<div class="clear"></div>


<br>
										
			                 </div>		
		                </div>
					 <div class="clear"></div>					       
		         </div>
		      </div>
			  
			  
			  	  

<br>
		  <br>
		<br>
		  <br><br>
		  <br><br>
		  <br><br>
		  <br><br>
		  <br><br>
		  <br>
 
   
</body>
</html>

