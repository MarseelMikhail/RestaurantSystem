
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Important to make website responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Website</title>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> -->

    <!-- Link our CSS file -->
    <link rel="stylesheet" href="css/style.css">

</head>

<body>
    <!-- Navbar Section Starts Here -->
    <section class="navbar">
        <div class="container">
            <div class="logo">
                <a href="#" title="Logo">
                    <img src="images/logo.png" alt="Restaurant Logo" class="img-responsive">
                </a>
            </div>

            <div class="menu text-right">
                <ul>
                    <li>
                        <a href="index.html">Home</a>
                    </li>
                    <li>
                        <a href="categories.html">Categories</a>
                    </li>
                    <li>
                        <a href="foods.html">Foods</a>
                    </li>
                    <li>
                        <a href="#">Contact</a>
                    </li>
                </ul>
            </div>

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Navbar Section Ends Here -->

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            
 <h1>Cart</h1>
        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->

    <!-------------------------------------------------------------------------------------------------------------------------->
    <!-------------------------------------- MAIN BODY ------------------------------------------------------------------------->

    <!-------------------------------------------------------------------------------------------------------------------------->
    
    <!-------------------------------------------------------------------------------------------------------------------------->
<div id='put'> </div>
   

    <!-- MAIN CODE TO ACCESS AND OUTPUT EACH ITEM -->
<?php
$user = 'root';
$pass='';
$database = 'online_orders';

$db = new mysqli('localhost', $user, $pass, $database) or die("NO connection");

?>


    <!-- fOOD cart Section Starts Here -->
    <section class="food-menu">
        <div class="container">
        <h2 class="text-center"></h2>

            </div>


            <div class="clearfix"></div>

            

        </div>

    </section>
    <div>
    <?php

session_start();

if(isset($_POST["dic"]))
print_r($_POST["store"]);
                 
if(isset($_POST["add"])){
    if(isset($_SESSION["cart"])){
        $item_array_id = array_column($_SESSION["cart"], "food_id");
        if(!in_array($_GET["id"], $item_array_id)){
            $count = count($_SESSION["cart"]);
            $item_array = array(
                'food_id' => $_GET["id"],
                'item_name' => $_POST["item_name"],
                'item_price' => $_POST["item_price"],
                'item_id' => $_POST["item_id"],
                'item_quantity' => $_POST["quantity"]
            );
            $_SESSION["cart"][$count] = $item_array;

        } else {					
            echo '<script>window.location="cart.php"</script>';
        }
    } else {
        $item_array = array(
            'food_id' => $_GET["id"],
            'item_name' => $_POST["item_name"],
            'item_price' => $_POST["item_price"],
            'item_id' => $_POST["item_id"],
            'item_quantity' => $_POST["quantity"]
        );
        $_SESSION["cart"][0] = $item_array;
    }
}
if(!empty($_SESSION["cart"])){
?>      
	<h3>Your Cart</h3>    
	<table class="table table-striped">
	 <thead class="thead-dark">
	<tr>
	<th width="40%">Food Name</th>
	<th width="10%">Quantity</th>
	<th width="20%">Price Details</th>
	<th width="15%">Order Total</th>
	<th width="5%">Action</th>
	</tr>
	</thead>
	<?php
	$total = 0;
	foreach($_SESSION["cart"] as $keys => $values){
	?>
		<tr>
		<td><?php echo $values["item_name"]; ?></td>
		<td><?php echo $values["item_quantity"] ?></td>
		<td>$<?php echo $values["item_price"]; ?></td>
		<td>$<?php echo number_format($values["item_quantity"] * 
$values["item_price"], 2); ?></td>
		<td><a href="cart.php?action=delete&id=<?php 
echo $values["food_id"]; ?>"><span 
class="text-danger">Remove</span></a></td>
		</tr>
		<?php 
		$total = $total + ($values["item_quantity"] * $values["item_price"]);
	}
	?>
	<tr>
	<td colspan="3" align="right">Total</td>
	<td align="right">$<?php echo number_format($total, 2); ?></td>
	<td></td>
	</tr>
	</table>
	<?php
	echo '<a href="cart.php?action=empty"><button class="btn btn-danger"><span 
class="glyphicon glyphicon-trash"></span> 
Empty Cart</button></a> <a 
href="index.php"><button 
class="btn btn-warning">Add more items</button></a> <a 
href="checkout.php"><button 
class="btn btn-success pull-right"><span 
class="glyphicon glyphicon-share-alt"></span> Check Out</button></a>';
	?>
<?php
} elseif(empty($_SESSION["cart"])){
?>
	<div class="container">
	<div class="jumbotron">
	<h3>Your cart is empty. Enjoy <a href="foods.php">food list</a> here.</h3>        
	</div>      
	</div>    
<?php
}

unset($_SESSION['cart']); 
?>		
</div>
    <!-- fOOD cart Section Ends Here -->

    <!-- social Section Starts Here -->
    <section class="social">
        <div class="container text-center">
            <ul>
                <li>
                    <a href="#"><img src="https://img.icons8.com/fluent/50/000000/facebook-new.png"/></a>
                </li>
                <li>
                    <a href="#"><img src="https://img.icons8.com/fluent/48/000000/instagram-new.png"/></a>
                </li>
                <li>
                    <a href="#"><img src="https://img.icons8.com/fluent/48/000000/twitter.png"/></a>
                </li>
            </ul>
        </div>
    </section>
    <!-- social Section Ends Here -->

    <!-- footer Section Starts Here -->
    <section class="footer">
        <div class="container text-center">
            <p>All rights reserved. Designed By <a href="#">Vijay Thapa</a></p>
        </div>
    </section>
    <!-- footer Section Ends Here -->

</body>

</html>