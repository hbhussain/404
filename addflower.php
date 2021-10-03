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

if (isset($_POST['send'])) {
     
  
    $flower_name = addslashes($_POST['f_name']);
    $f_info = addslashes($_POST['f_info']);
    $price = addslashes($_POST['price']);
    $capacity = addslashes($_POST['capacity']);
    $category = addslashes($_POST['category']);
    $d_production= addslashes($_POST['d_production']);
    
    $image_name= $_FILES['image']['name'];
    
    $file_type = $_FILES['image']['type'];
   
 
    

    if (isset($_FILES['image']))
		{
			

        	
		
          
           $query = "INSERT INTO flower (flower_name, flower_info,price,image,capacity,category,date_of_product) VALUES ('$flower_name','$f_info','$price','$image_name','$capacity','$category','$d_production');";

                $result = mysqli_query($link, $query);

                if (mysqli_affected_rows($link) == 1) 
				
				{
                    $alert= "Product Successfully Uploaded";
					
					if($category=="Birthday")
					{
						
						move_uploaded_file($_FILES["image"]["tmp_name"], "images/birthday/" . $_FILES["image"]["name"]);
                    } 
					else if($category=="Get well")
					{
						
						move_uploaded_file($_FILES["image"]["tmp_name"], "images/getwellsoon/" . $_FILES["image"]["name"]);
                    } 
					else if($category=="Im Sorry")
					{
						
						move_uploaded_file($_FILES["image"]["tmp_name"], "images/imsorry/" . $_FILES["image"]["name"]);
                    } 
					else if($category=="Anniversary")
					{
						
						move_uploaded_file($_FILES["image"]["tmp_name"], "images/anniversary/" . $_FILES["image"]["name"]);
                    }
					else if($category=="Christmas")
					{
						
						move_uploaded_file($_FILES["image"]["tmp_name"], "images/chrismas/" . $_FILES["image"]["name"]);
                    }
					else if($category=="Congratulations")
					{
						
						move_uploaded_file($_FILES["image"]["tmp_name"], "images/congratulations/" . $_FILES["image"]["name"]);
                    }
					else if($category=="Just because")
					{
						
						move_uploaded_file($_FILES["image"]["tmp_name"], "images/justbecause/" . $_FILES["image"]["name"]);
                    }
					else if($category=="Love")
					{
						
						move_uploaded_file($_FILES["image"]["tmp_name"], "images/love/" . $_FILES["image"]["name"]);
                    }
					else if($category=="Random")
					{
						
						move_uploaded_file($_FILES["image"]["tmp_name"], "images/random/" . $_FILES["image"]["name"]);
                    }
					else if($category=="Valentine")
					{
						
						move_uploaded_file($_FILES["image"]["tmp_name"], "images/val/" . $_FILES["image"]["name"]);
                    }
					else if($category=="Wedding")
					{
						
						move_uploaded_file($_FILES["image"]["tmp_name"], "images/wedding/" . $_FILES["image"]["name"]);
                    }
					else if($category=="Sympathy")
					{
						
						move_uploaded_file($_FILES["image"]["tmp_name"], "images/sympathy/" . $_FILES["image"]["name"]);
                    }
					else 
					{

                    $image_fail = "Image could not be moved";
					}
				}
				
				else
				{
					
					$flowerUpload="Flower could not be uploaded";
					
				}
        }
     else {

         $imageUpload="image could not be uploaded";
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
			    	<li class="active"><a href="adminhome.php">Home</a></li>
			    	
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
				<?php echo $image_fail; ?>
				<?php echo $flowerUpload; ?>
  <?php echo $imageUpload; ?>
					 <div class="header_bottom_right">					 
					 	
	<form name="form" method="post" action="" enctype="multipart/form-data">
	<table border="2" width="600" height="500" align="center">
		 
		
		<tr>
		<th colspan="4"> <h1 align="center"> Add Flower</h1></th>
		</tr>
		<tr>
			<td>Flower Name:</td>
			<td colspan="4"><input type="text" name="f_name" maxlength="20"></td>
		</tr>
		<tr>
			<td>Flower Info:</td>
			<td colspan="4"><textarea name="f_info" rows="4" cols="34"></textarea></td>
		</tr>
		<tr>
			<td>Price:</td>
			<td colspan="4"><input type="text" name="price"> </td>
		</tr>
		<tr>
			<td>Capacity:</td>
			<td colspan="4" ><input type="text" name="capacity"></td>
		</tr>
		<tr>
			<td>Category:</td>
			<td><select name="category">
			 	<?php 
					
					$cat="SELECT * FROM categories ORDER BY category_id ASC";
				$cat_result=mysqli_query($link, $cat);
				if(mysqli_num_rows($cat_result)>0)
				{
					while($categories=mysqli_fetch_array($cat_result))
					{
					
					?>
					
					<li><option><?php echo  $categories['category_name']; ?></option></li>
					
					
					
					
				<?php }}?>
			
			</select>
			</td>
			
		</tr>
		
	
		<tr>
			<td>Date of production:</td>
			<td colspan="4"><input type="date" name="d_production"></td>
		</tr>
		<tr>
			<td height="41"> Image:</td>
			<td colspan="4"><input type="file" name="image"></td>
		</tr>
		
		<br>
		<td colspan="4" height="58"><input type="submit" name="send" size="35"></td>
	</table>
	<br>
	<br>
		
</form>
<br>
<br>
										
			                 </div>		
		                </div>
					 <div class="clear"></div>					       
		         </div>
		      </div>
		   <div class="clear"></div>
		
 
   
</body>
</html>

