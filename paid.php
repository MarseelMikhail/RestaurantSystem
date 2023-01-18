




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
    <!-- Navbar Section Starts Here --><div>Thank You</div>
    <?php require('navbar.php'); ?>
    <!-- Navbar Section Ends Here -->

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            
 <h1>Paid</h1>
        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->

    <!-------------------------------------------------------------------------------------------------------------------------->
    <!-------------------------------------- MAIN BODY ------------------------------------------------------------------------->
 

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
session_start();

// // if(isset($_SESSION["cart"])){
// // print_r('HIII');
    
// //             } else {					
// //                 echo '<script>window.location="cart.php"</script>';
//             }
//         } else {
?>
    <!-- fOOD cart Section Ends Here -->

    <?php


if(isset($_POST["pay"]))
{

if(isset($_POST['savedpay']) ? $_POST['savedpay'] : false)
    {$sql=
    "UPDATE orders 
    SET 
        isPaid = 1,
        pid=".$_POST["savedpay"].",
        CDid=".$_POST["savedadd"]."
    WHERE
        oid =".$_SESSION['oid'].";";

    $db->query($sql);
        // unset($_SESSION['uid']);
        // unset($_SESSION['oid']);
    }

}
?>

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
        <p>All rights reserved. work done By <a href="#">Keerat Tanwar</a></p>
        </div>
    </section>
    <!-- footer Section Ends Here -->

</body>

</html>