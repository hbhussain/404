<?php

	session_start();
$con = mysqli_connect('localhost', 'root','','404project');

		$itemCount = 0;

        if(isset($_SESSION['cart'])){

        $itemCount = count(isset($_SESSION['cart']) ? $_SESSION['cart'] : array());

        }
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">


<html xmlns="http://www.w3.org/1999/xhtml">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link rel="stylesheet" href="css/css.css" type="text/css" />
		<title>Simple Shoping Cart in php</title>
    </head>

<body>


<div class="hdr"><img src="http://coderglass.com/images/logo.png"/></div>


<h2 class="hlab">Simple shopping cart in php</h2>


<div class="social-media">
<iframe allowtransparency="true" frameborder="0" scrolling="no" 
src="http://www.facebook.com/plugins/like.php?href=http://www.coderglass.com/php/php-shoping-cart.php&amp;layout=box_count&amp;show_faces=false&amp;width=450&amp;action=like&amp;colorscheme=light" style="border:none; overflow:hidden; width:60px; height:70px" class="fleft">
</iframe></div>


<nav>

<div class="nav-bar">


        <ul>

               <li><a href="index.php">Home</a></li>
               <li><a href="cart.php">View Cart</a></li>
               <li><a href="#">Checkout</a></li>
               <li><div class="cart-a">{ <?=$itemCount?> }</div></li>   

        </ul>


        <div class="clear"></div>


  </div>


</nav>


			<div class="container main-cude">

				<p class="msg">

				<?php if(isset($_REQUEST['msg'])){

					$msg ="";

					switch($_REQUEST['msg']):

					case 'add':


                    $msg = '<b>'.$_REQUEST['p'] . "</b> was added to your cart.";


                    break;


                    case 'exists':


                    $msg = '<b>'.$_GET['p'] . "</b> already in your cart.";


                    break;


                    case 'removed':


                    $msg = '<b>'.$_GET['p'] . "</b> was removed from your cart.";


                    break;


                    endswitch;


                    echo $msg;


                     }


                ?>

            </p>


    <?php

    // If cart is empty and user click on cart button show default product list

    if($itemCount == 0){

    echo '<b>Your Cart is empty!.';

    echo ' Add items to it. </b>';

    ?>

    <ul class="item-cont">
        <li>Product Name</li>
        <li>Price</li>
    </ul>

    <div class="clear"></div>

    <?php

    $qur = mysqli_query($con,"SELECT * FROM  `product` ");

    while($r = mysqli_fetch_array($qur)){

    extract($r);

    ?>

    <div>

		<div class="inline-pr"><?=$productName?></div>

		<div class="inline-pr"><?=$price?></div>

		<div class="inline-pr"><a href="curd.php?action=add&pid=<?=$productID?>&p=<?=$productName?>" class="button-cart">Add to Cart</a></div>


    </div>


    <?php }

       }

    // If user add product to its cart

    else{?>

        <h2>Products in your CART</h2>

        <?php

			$pids = "";

			foreach($_SESSION['cart'] as $id){

			$pids = $pids. $id.',';

            }


                        $pids = rtrim($pids, ",");

						$sql = "SELECT flower_id, flower_name FROM flower where flower_id IN (".$pids.")";

						$qur = mysqli_query($con,$sql);

						$row = mysqli_num_rows($qur);  // Count num of rows

						if($row == 0){

					         echo '<p class="msg">No products found in your cart.</p>';

						}else{

                        ?>

        <ul class="item-cont">

				<li>Product Name</li>
				<li>Price</li>

		</ul>

		<div class="clear"></div>

        <?php

            $totalPrice = '';

			while($res = mysqli_fetch_array($qur)){

			extract($res);

			$totalPrice += $price;

        ?>


            <div>


                <div class="inline-pr"><?=$res['flower_id']?></div>

                <div class="inline-pr"><?=$res['flower_name']?></div>
				<div class="inline-pr"><?=$res['price']?></div>

                


            </div>


        <?php } ?>


            <div style="margin-top: 20px; border-top: #999 solid 1px;">


                <div class="inline-pr"><b>Total</b></div>

				<div class="inline-pr" style="font-weight: bold;">RS. <?=$totalPrice?></div>

				<div class="inline-pr">&nbsp;</div>


            </div>


        <?php } } ?>


    <div class="clear"></div>


</div>


<div class="resv">

    <a href="http://www.coderglass.com/">&copy; Coder Glass</a>

    <a href="http://www.coderglass.com/" style="float:right">Powered By:- Coder Glass</a>

</div>
</body>
</html>
