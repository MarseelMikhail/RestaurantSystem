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
            
<h1>My Profile</h1>
        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->


    <!-- MAIN CODE TO ACCESS AND OUTPUT EACH ITEM -->






    
<?php

include 'connect.php';


if(isset($_POST["pay"]))
{
    $sql= "INSERT INTO payment(cardholder, cardNumber, cvv, exp, uid) VALUES(".json_encode($_POST['cardName']).", ".json_encode($_POST['cardNum']).", ".intval($_POST['cvv']).", ".json_encode($_POST['exp']).", ".$_SESSION["uid"].");";
    mysqli_query($db, $sql);
}

if(isset($_POST['subAdd']))
{$sql= "INSERT INTO customerDetails(address,phone,postal,uid) VALUES(".json_encode($_POST['add']).", ".json_encode($_POST['ph']).", ".json_encode($_POST['pos']).", ".$_SESSION["uid"].");";
$res = $db->query($sql);
header("location: profile.php");}

if(isset($_POST['del_add']))
{print_r('isset');
    $sql= "DELETE FROM customerDetails WHERE CDid=".intval($_POST['add_id']).";";
    $resd = $db->query($sql);
    header("location: profile.php");

}

if(isset($_POST['del_pay']))
{print_r('isset');
    $sql= "DELETE FROM payment WHERE pid=".intval($_POST['pay_id']).";";
    $resd = $db->query($sql);
    header("location: profile.php");

}





$rows=0; 
$sql= "SELECT * FROM customerDetails WHERE uid=".$_SESSION["uid"];
$res = $db->query($sql);
if($res==True){
    $rows=mysqli_num_rows($res);
    if($rows>0)
    echo '<h1>Saved Address</h1><div class="boxm" style="display: grid">';

while ($obj = $res -> fetch_object()) {
 
    echo '
    
    <div class="boxmin2" style="background-color: rgb(161 193 197)" id="OFood">
              
                    <div class="food-menu-desc">
                        <h4>'.$obj->postal.'</h4>
                        <p class="food-price">'.$obj->phone.'</p>
                        <p class="food-detail">'.$obj->address.
                        '</p>
                       
                        <br>
                        <form method="post" action ="'.$_SERVER["PHP_SELF"].'">
                        <input 
                        type="hidden" name="add_id" class="btn btn-primary" value='.$obj->CDid.'>
                        <input 
                        type="submit" name="del_add" class="btn btn-primary" value="delete">
                        </form>
                    </div>
                    </div>
                ';




}
if($rows>0)
echo '</div>';

}

$rows=0; 
$sqlP= "SELECT * FROM payment WHERE uid=".$_SESSION["uid"];
$resP = $db->query($sqlP);
if($resP==True){
    $rows=mysqli_num_rows($resP);
    if($rows>0)
    echo '<h1>Saved Payments</h1><div class="boxm" style="display: grid">';

while ($obj = $resP -> fetch_object()) {
 
    echo '
    
    <div class="boxmin2" id="OFood">
              
                    <div class="food-menu-desc">
                        <h4  >'.$obj->cardholder.'</h4>
                        <p class="food-price" >'.$obj->cardNumber.'</p>
                        <p class="food-detail"  >'.$obj->cvv.
                        '</p>
                        <p class="food-price"  >'.$obj->exp.'</p>
                       
                        <br>
                        <form method="post" action ="'.$_SERVER["PHP_SELF"].'">
                        <input 
                        type="hidden" name="pay_id" class="btn btn-primary" value='.$obj->pid.'>
                        <input 
                        type="submit" name="del_pay" class="btn btn-primary" value="delete">
                        </form>
                    </div>
                    </div>
                ';
            }
            if($rows>0)
            echo '</div>';
            
            }




if($rows==0) print_r('none');
?>
</div>

<br>
<div> 




  <div class="boxm">
    

  <div class="boxmin2" style="background-color: rgb(195 195 195);">
    <form  class="login" method="post">
    <h1>New Payment</h1>
    <div class="field">
      <input type="text" placeholder="Name on card" name="cardName" required />
    </div>
    <div class="field">
      <input type="text" placeholder="cardNum" name="cardNum" required />
    </div>
    <div class="field">
      <input type="text" placeholder="Expiry" name="exp" required />
    </div>
    <div class="field">
      <input type="text" placeholder="cvv" name="cvv" required />
    </div>
    <div class="field btn">
      <div class="btn-layer"></div>
      <input type="submit" name="pay" class="btn btn-primary" value="Save" />
    </div>
  </form>
</div>

  <div class="boxmin2" style="background-color: rgb(195 195 195);" id="OFood">


  <form  class="login" method="post">
    <h1>New Address</h1>
    <div class="field">
      <input type="text" placeholder="address" name="add" required />
    </div>
    <div class="field">
      <input type="text" placeholder="postal" name="pos" required />
    </div>
    <div class="field">
      <input type="text" placeholder="phone" name="ph" required />
    </div>

    <div class="field btn">
      <div class="btn-layer"></div>
      <input type="submit" name="subAdd" class="btn btn-primary" value="Save" />
    </div>
  </form>


  </div>
</div>

</div>

</div>









</div>




















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



  </body>
</html>