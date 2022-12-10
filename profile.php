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
$rows=0; 
$sql= "SELECT * FROM customerDetails WHERE uid=".$_SESSION["uid"];
$res = $db->query($sql);
if($res==True){
    $rows=mysqli_num_rows($res);
    if($rows>0)
    echo '<div class="boxm" style="display: grid">';

while ($obj = $res -> fetch_object()) {

    echo '
    
    <div class="boxmin2" id="OFood">
              
                    <div >
                        abcdefj
                    </div>

                    <div class="food-menu-desc">
                        <h4>'.$obj->postal.'</h4>
                        <p class="food-price">'.$obj->phone.'</p>
                        <p class="food-detail">'.$obj->address.
                        '</p>
                       
                        <br>
                        <form method="post" action="#">
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
if($rows==0) print_r('none');
?>
</div>

<br>
<div> 




  <div class="boxm">
  <div class="boxmin2" id="OFood">


  <form action="#" class="login" method="post">
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
      <input type="submit" name="subAdd" value="Submit" />
    </div>
  </form>


  </div>
</div>

</div>

</div>




<?php

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
?>







</div>
























  </body>
</html>