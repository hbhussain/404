<?php 
$link = mysqli_connect('localhost', 'root','','404project');

if (!$link) {
   die('Could not connect: ' . mysql_error());
}
$successfully='';
$flower_id = $_GET['flower_id'];
$result=mysqli_query($link,"DELETE FROM cart WHERE flower_id='$flower_id'");


		if($result && mysqli_affected_rows($link)==1)
			{
	
				$successfully="successfully Deleted";
	
				header("Location: Customer_cart.php");	
			}

		else{
			
			
			echo "not deleted";
			
		}





?>