
<?php 
session_start(); ?>
<!DOCTYPE html>
<html>
  <head>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script> -->
<meta charset="UTF-8">
    <!-- Important to make website responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Website</title>


    <!-- Link our CSS file -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/form.css">
    

  </head>
  <body>  
  <?php require('navbar.php'); ?>
    <!-- Navbar Section Ends Here -->


    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            
<h1>Past orders</h1>
        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->


    <!-- MAIN CODE TO ACCESS AND OUTPUT EACH ITEM -->



<?php
$rows=0; 

$sqlO= "SELECT * FROM orders WHERE uid=".$_SESSION["uid"];
$resO = $db->query($sqlO);


if ($resO == True) {
    $i = 0;
    $rows = mysqli_num_rows($resO);
    if ($rows > 0)
        echo '<h1>Orders</h1><div class="boxm" style="display: grid">';

    while ($obj = $resO->fetch_object()) {
        $i = $i + 1;
        echo '
    
        <div class="boxmin2" id="OFood">
                  
                        <div class="food-menu-desc">
                        <h4  >'.$i.'</h4>
                            <h4  >Total: $'.$obj->order_total.'</h4>
                            <p class="food-price" >ordernote: '.$obj->orderNote.'</p>
                            <p class="food-detail"  >'.$obj->orderPlaceDate.
                            '</p>

                           
                            <br>
                            
    
    
                    ';

        $sqlD= "SELECT * FROM order_details WHERE oid=".$obj->oid;
        $resD = $db->query($sqlD);
        while ($obj1 = $resD->fetch_object()) {

            $sql= "SELECT * FROM menu WHERE mid=".$obj1->mid;
            $res = $db->query($sql);
            while ($obj2 = $res->fetch_object()) {
                $foodname = $obj2->foodName;}
            echo '
            
            <p class="food-detail"  >'.$foodname.
            ': '.$obj1->quantity.' </p>';

        }
        echo '</div></div>';
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
                    <a href="https://github.com/keerat21"><img src="images/gitIcon.gif" width="50" height="50"/></a>
                </li>
            </ul>
        </div>
    </section>
    <!-- social Section Ends Here -->

    <!-- footer Section Starts Here -->
    <section class="footer">
        <div class="container text-center">
        <p>All rights reserved. University project.Current page work done onit By <a href="https://github.com/keerat21">Keerat Tanwar</a></p>
        </div>
    </section>