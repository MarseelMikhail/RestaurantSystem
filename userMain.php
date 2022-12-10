<?php 
session_start();
$flag=0;
if(isset($_SESSION['uid']))
{$flag=1;
print_r($_SESSION['uid']);}
else
$flag=0;
?>
<!DOCTYPE html>
<html lang="en">
<head>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script> -->
    <meta charset="UTF-8">
    <!-- Important to make website responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Website</title>


    <!-- Link our CSS file -->
    <link rel="stylesheet" href="css/style.css">


</head>



<body>
    <!-- Navbar Section Starts Here -->
<?php require('navbar.php'); ?>
    <!-- Navbar Section Ends Here -->


    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            
<h1>Online Food</h1>
        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->


    <!-- MAIN CODE TO ACCESS AND OUTPUT EACH ITEM -->
<?php

include 'connect.php';

?>

    <!-- MAIN CODE TO ACCESS AND OUTPUT EACH ITEM -->
    <!-- fOOD MEnu Section Starts Here -->


<?php
// $sql= "SELECT * FROM menu";
// $res = $db->query($sql);
// if($res==True)
// {
//    while ($obj = $res -> fetch_object()) {
//     printf("%s (%s)\n", $obj->foodName, $obj->foodPrice);
//   }

?>





<!-- SEND DATA TO NEXT PAGE -->

                                    <!-- ################################################################# -->


    <section class="food-menu">

</div>




<div class="boxm">
  <div class="boxmin" id="OFood"><h1>Order Food</h1></div>
  <?php if(isset($_SESSION['uid'])){ $flag=1;?>
  <div class="boxmin" id="profile"><h1>Profile</h1></div>
  <?php } ?>
</div>




 <?php 
?>
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

<script type="text/javascript">
    var flag = <?php echo $flag; ?>;
    var o_food = document.getElementById("OFood");


if(flag==1)
{    var profile = document.getElementById("profile");
    
    profile.addEventListener("click",function(){ 
        window.location.href = "profile.php";
});}
    o_food.addEventListener("click",function(){ 
if(flag==0)
window.location.href = "Signin.php";
else if(flag==1)

window.location.href = "foods.php";
});

</script>
</html>