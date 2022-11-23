<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Important to make website responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Website</title>

    <!-- Link our CSS file -->
    <link rel="stylesheet" href="css/style.css">
    <!-- footer Section Ends Here -->
    <script src="foods.js"></script>
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
            
            <form action="food-search.html" method="POST">
                <input type="search" name="search" placeholder="Search for Food.." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->


    <!-- MAIN CODE TO ACCESS AND OUTPUT EACH ITEM -->
<?php
$user = 'root';
$pass='';
$database = 'online_orders';

$db = new mysqli('localhost', $user, $pass, $database) or die("NO connection");

?>
<?php
// $sql= "SELECT * FROM menu";
// $res = $db->query($sql);
// if($res==True)
// {
//    while ($obj = $res -> fetch_object()) {
//     printf("%s (%s)\n", $obj->foodName, $obj->foodPrice);
//   }
 

// }
?>


    <!-- MAIN CODE TO ACCESS AND OUTPUT EACH ITEM -->
    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
        <h2 class="text-center">Food Menu</h2>
        <?php
            $sql= "SELECT * FROM menu";
            $res = $db->query($sql);
            if($res==True){
            while ($obj = $res -> fetch_object()) {
                echo '
                <div class="food-menu-box">
                    <div class="food-menu-img">
                        <img src="images/menu-pizza.jpg" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                    </div>

                    <div class="food-menu-desc">
                        <h4>'.$obj->foodName.'</h4>
                        <p class="food-price">'.$obj->foodPrice.'</p>
                        <p class="food-detail">'.$obj->foodDescription.
                        '</p>
                        <br>

                        <span onclick="cartMake('.$obj->mid.')" class="btn btn-primary" id='.$obj->mid.'>Order</span>
                        <span class="btn btn-primary" style="visibility:hidden;" id="add'.$obj->mid.'">+</span>
                        <span class="btn btn-primary" style="visibility:hidden;" id="subtract'.$obj->mid.'">-</span>
                    </div>
                </div>';}}
                 $res -> free_result(); ?>



           

            <div class="clearfix"></div>

            

        </div>

    </section>
    <!-- fOOD Menu Section Ends Here -->

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


</body>

</html>