<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("location: AdminLogin.php");
} 
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

 $flower=$_GET["flower_id"];
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
			

        	
		
          
           $query = "UPDATE flower SET flower_name='$flower_name', 
		   flower_info='$f_info', 
		   price='$price', 
		   image='$image_name', 
		   capacity='$capacity', 
		   category='$category', 
		   date_of_product='$d_production' 
		   WHERE flower_id='$flower' ";
		 										
		  

                $result = mysqli_query($link, $query) or die ('sorry');

                if (mysqli_affected_rows($link) == 1) 
				
				{
                    $alert= "Product Successfully Edited";
					
					if($category=="Birthday")
					{
						
						move_uploaded_file($_FILES["image"]["tmp_name"], "images/birthday/" . $_FILES["image"]["name"]);
                    } 
					else if($category=="Get well")
					{
						
						move_uploaded_file($_FILES["image"]["tmp_name"], "images/getwellsoon/" . $_FILES["image"]["name"]);
                    } 
					else if($category=="im Sorry")
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
			    	<li class="active"><a href="index.html">Home</a></li>
			    	
			    	<li><a href="#">My Account</a></li>
					<li><a href="logout.php">logout</a></li>
			    	
			    	<div class="clear"></div>
     			</ul>
	     	</div>
	     	
	     	<div class="clear"></div>
	     </div>	     
		 
		 <?php
		 
		 
		 
		 $check="SELECT * FROM flower WHERE flower_id='$flower'";
			
			
			$result=mysqli_query($link, $check);
				
			if(mysqli_num_rows($result)>0)
			{
				while($data=mysqli_fetch_assoc($result))
				{
					
			
			
			
			?>
	<div class="header_slide">
			<div class="header_bottom_left">				
				<div class="categories">
				  <ul>
				  	<h3>Panel</h3>
				      <li><a href="customers.php">Customers </a></li>
				      <li><a href="viewFlower.php">Flowers</a></li>
				      <li><a href="addflower.php">Add Flowers </a></li>
				      <li><a href="#">Orders</a></li>
				      
				       
				      
				  </ul>
				</div>					
	  	     </div>
			  <h1 align="center"> Add Flower</h1>
			  <?php echo $alert; ?>
				<?php echo $image_fail; ?>
				<?php echo $flowerUpload; ?>
  <?php echo $imageUpload; ?>
					 <div class="header_bottom_right">					 
					 	
	<form name="form" method="post" action="" enctype="multipart/form-data">
	<table border="0" width="500" align="center">
		
		
		<tr>
			<td>Flower Name:</td>
			<td><input type="text" name="f_name" maxlength="20" value="<?php echo $data['flower_name']; ?>"></td>
		</tr>
		<tr>
			<td>Flower Info:</td>
			<td><input type="text"  name="f_info" value="<?php echo $data['flower_info']; ?>"></td>
		</tr>
		<tr>
			<td>Price:</td>
			<td><input type="text" name="price" value="<?php echo $data['price']; ?>"> </td>
		</tr>
		<tr>
			<td>Capacity:</td>
			<td><input type="text" name="capacity" value="<?php echo $data['capacity']; ?>"></td>
		</tr>
		<tr>
			<td>Category:</td>
			<td><select name="category">
			<option> Birthday </option>
			<option> Get well </option>
			<option>  Anniversary </option>
			<option>  Christmas</option>
			
			<option> Congratulations </option>
			<option> Just because   </option>
			
			
			<option> Love </option>
			<option> Random </option>
			<option> Valentine </option>
			<option> Wedding </option>
			<option> Sympathy</option>
			<option> Im Sorry</option>
			
			</select>
			</td>
			
		</tr>
		<td>      </td>
		<br>
		<tr>
			<td>Date of production:</td>
			<td><input type="date" name="d_production" value="<?php echo $data['date_of_product']; ?>"></td>
		</tr>
		<tr>
			<td> Image:</td>
			<td><input type="file" name="image" value="<?php echo $data['image']; ?>"></td>
		
		</tr>
		
			<?php }} ?>
	

	<tr>
	<td><input type="submit" name="send" size="35"></td>		
	</tr>
</form>

<br>
<br>
	</table>									
			                 </div>		
		                </div>
					 <div class="clear"></div>					       
		         </div>
		      </div>
		   <div class="clear"></div>
		
 
   
</body>
</html>

