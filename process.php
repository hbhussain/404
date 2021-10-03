<?php
session_start();

	$link = mysqli_connect('localhost', 'root','','404project');
	if (!$link) {
   die('Could not connect: ' . mysql_error());
}

$alert='';

		// check if there is an existing order from the session where we save session id 

if (isset($_POST['sbmt']))
{
				 $user_number = $_POST['user_id'];
				 $flower_id = $_POST['flower_id'];
				 $flower_name = $_POST['flower_name'];
				 $quantity = $_POST['quantity'];
				 $flower_price = $_POST['price'];	
				
				$query1="SELECT * FROM cart WHERE flower_id='$flower_id'";
				$result1=mysqli_query($link, $query1);
				$count = mysqli_num_rows($result1);
				
				if( $count == 1 ) 
				{
					echo "Same item already Exist";
				}
				else
				{
				$query = "INSERT INTO cart(user_id, flower_id, flower_name, quantity, price) VALUES ('$user_number','$flower_id','$flower_name','$quantity','$flower_price');";
				
				$result = mysqli_query($link, $query);

                if (mysqli_affected_rows($link)>0) 
				
				{
                    $alert= "Product Successfully Uploaded";
						header("Location:homepage.php");
		
				}
				else
				{
					$alert= "sorry";
				}
				}

}
?>




