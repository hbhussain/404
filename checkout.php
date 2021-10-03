<?php
session_start();

	$link = mysqli_connect('localhost', 'root','','404project');
	if (!$link) {
   die('Could not connect: ' . mysql_error());
}

$alert='';

		// check if there is an existing order from the session where we save session id 

if (isset($_POST['chk']))
{
				 echo $user_number = $_POST['user'];
				 
					
				
				$query1="SELECT * FROM cart WHERE user_id='$user_number'";
				$result1=mysqli_query($link, $query1);
				if(mysqli_num_rows($result1)>0)
				{
					while($row=mysqli_fetch_array($result1))
					{
						
								echo $user_id=$row['user_id'];
								echo $flowerNo=$row['flower_id'];
								$flowerName=$row['flower_name'];
								$flowerQuantity=$row['quantity'];
								$price=$row['price'];
								$today = date('Y-m-d : h-i-s');
								
								
						$query = "INSERT INTO orders(user_id, flower_id, flower_name, quantity, price,date) VALUES 
						('$user_id','$flowerNo','$flowerName','$flowerQuantity','$price','$today');";
				
						$result = mysqli_query($link, $query);

						if (mysqli_affected_rows($link)>0) 
				
						{
								$alert= "order success";
								
								$result=mysqli_query($link,"DELETE FROM cart WHERE user_id='$user_id'");
								if($result && mysqli_affected_rows($link)>0)
									{
	
										
	
										header("Location:checkoutConfirm.php");	
									}
								
										
							}
				else
				{
					$alert= "sorry";
				}
				}
				}

}
?>




