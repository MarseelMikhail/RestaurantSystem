
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
    <?php session_start(); require('navbar.php'); ?>
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

   

    <!-- MAIN CODE TO ACCESS AND OUTPUT EACH ITEM -->


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

include 'connect.php';


// // if(isset($_SESSION["cart"])){
// // print_r('HIII');
    
// //             } else {					
// //                 echo '<script>window.location="cart.php"</script>';
//             }
//         } else {

    if(isset($_POST["dic"]) || isset($_POST["q"]))
{

    $oid = 0;
    $sql= "SELECT oid FROM orders WHERE uid=".$_SESSION["uid"]." AND orderState=0 AND isPaid=0";
    $res = $db->query($sql);
    if($res==True){while ($obj = $res -> fetch_object()){
        $sql1= "DELETE FROM order_details WHERE oid=".intval($obj->oid);
        $sql2= "DELETE FROM orders WHERE uid=".$_SESSION["uid"]." AND orderState=0 AND isPaid=0";
        $db->query($sql1);
        $db->query($sql2);
        $_SESSION["oid"] = $obj->oid;
    } ;}
    if(isset($_POST["q"]))
    {

        


        // print_r('HI HereToo'.$_POST["storeCheckout"]);
        $sql= "INSERT INTO orders(uid,orderPlaceDate, arriveIn, orderState, orderNote, isPaid, orderedRestaurant)
        VALUES
        (".$_SESSION["uid"].",NOW(), '35', '0', 'none', '0', 'MCD');";
        mysqli_query($db, $sql);


        $sql= "SELECT oid FROM orders WHERE uid=".$_SESSION["uid"]." AND orderState=0 AND isPaid=0";
        $res = $db->query($sql);
        if($res==True){$obj = $res->fetch_object();$oid=$obj->oid;$_SESSION["oid"] = $obj->oid;}

    }
    if(isset($_POST["q"]))
        $decode = json_decode($_POST["storeCheckout"],true);
        else
      $decode = json_decode($_POST["store"],true);

    //   print_r($decode);
      $total = 0;
      echo '<h3>Your Cart</h3>' ; 
      ?>
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
     
            foreach($decode as $id => $quan)
            {
                $temp = $decode;
                $sql= "SELECT * FROM menu WHERE mid=".$id;
                $res = $db->query($sql);
                if($res==True)
                {
                    
                  
                while ($obj = $res -> fetch_object())
                    {   //print_r($obj); 


                        if(isset($_POST["q"]))
                        {
                            $sql= "INSERT INTO order_details(mid, oid, quantity, item_total) VALUES(".intval($obj->mid).",".intval($oid).",".intval($quan).",".floatval(number_format($quan * 
                            $obj->foodPrice, 2)).")";
                            mysqli_query($db, $sql);
                        }
                        echo '<br><br>';
                    ?>

  


		<tr>
		<td><?php echo $obj->foodName; ?></td>
		<td><?php echo $quan?></td>
		<td>$<?php echo $obj->foodPrice; ?></td>
		<td>$<?php echo number_format($quan * 
$obj->foodPrice, 2); ?></td>


		<?php if(!isset($_POST["q"])) {?>
        <td><form method="post" action="cart.php?action=dic">
<input   type="hidden" name="store" value=<?php unset($temp[$obj->mid]); echo json_encode($temp); ?> id="store" />
<input class="btn btn-primary" id="del" name="dic" type = "submit" value='Remove' />
</form>
<?php }?>

</td>
		</tr>
		<?php 
		$total = $total + ($quan * $obj->foodPrice);
	}}}
	?>
	<tr>
	<td colspan="3" align="right">Total</td>
	<td align="right">$<?php echo number_format($total, 2); ?></td>
	<td></td>
	</tr>
	</table>

                    <?php 
                
            }


            
?>		
          


 <?php          
    
    // if(isset($_SESSION["cart"])){

    //     unset($_SESSION["cart"]);
               
    //         } else {
    //             $item_array = array(
    //                 'food_id' => $_GET["id"],
    //                 'item_name' => $_POST["item_name"],
    //                 'item_price' => $_POST["item_price"],
    //                 'item_id' => $_POST["item_id"],
    //                 'item_quantity' => $_POST["quantity"]
    //             );
    //             $_SESSION["cart"]= $item_array;} -->
// if(isset($_POST["add"])){
//     if(isset($_SESSION["cart"])){
//         $item_array_id = array_column($_SESSION["cart"], "food_id");
//         if(!in_array($_GET["id"], $item_array_id)){
//             $count = count($_SESSION["cart"]);
//             $item_array = array(
//                 'food_id' => $_GET["id"],
//                 'item_name' => $_POST["item_name"],
//                 'item_price' => $_POST["item_price"],
//                 'item_id' => $_POST["item_id"],
//                 'item_quantity' => $_POST["quantity"]
//             );
//             $_SESSION["cart"][$count] = $item_array;

//         } else {					
//             echo '<script>window.location="cart.php"</script>';
//         }
//     } else {
//         $item_array = array(
//             'food_id' => $_GET["id"],
//             'item_name' => $_POST["item_name"],
//             'item_price' => $_POST["item_price"],
//             'item_id' => $_POST["item_id"],
//             'item_quantity' => $_POST["quantity"]
//         );
//         $_SESSION["cart"][0] = $item_array;
//     }
// }
//?>


	<?php
     if(!isset($_POST["q"])) {
	echo '<a href="cart.php?action=empty"><button class="btn btn-danger"><span 
class="glyphicon glyphicon-trash"></span> 
Empty Cart</button></a>

<a 
href="index.php"><button 
class="btn btn-warning">Add more items</button></a>


<form method="post" action="cart.php?action=q">
<input   type="hidden" name="storeCheckout" value='.json_encode($decode).' id="store" />
<input class="btn btn-primary" id="del" name="q" type = "submit" value="Checkout" />
</form>';}
include 'payment.php';
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