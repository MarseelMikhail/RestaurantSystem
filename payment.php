
<?php
include "connect.php"; 
if(isset($_POST["q"]))
{?>
<br><br>

<div class="boxm">
  <div class="boxmin2" id="OFood">
  <h3>Address:</h3>
  <?php 
$sql= "SELECT * FROM customerdetails WHERE uid=".$_SESSION["uid"];
$res = $db->query($sql);
$rows=mysqli_num_rows($res);
if($rows==0)
{
  echo '<p>please enter an address</p>';
  echo '<input onclick="location.href = \'profile.php\';" class="btn btn-primary"  name="uidMN" type = "submit" value= "GO" />';
}
if($res==True && $rows>0)
    {
      echo '<form action="paid.php" class="login" method="post"><label for="savedpay">Choose a saved address:</label>

      <select name="savedpay" id="savedpay">';
      echo '<option name="cardnum" >Select Please</option>';
      while ($obj = $res -> fetch_object()) 
      {
          echo '<option name="CDID" value="'.$obj->CDid.'">'.$obj->address.'</option>';
      }

      echo '<br></select>
      <br>
      ';
    }


?>




<h3>Payment:</h3>

<?php 
$sql= "SELECT * FROM payment WHERE uid=".$_SESSION["uid"];
$res = $db->query($sql);
$rows=mysqli_num_rows($res);
if($rows==0)
{
  echo '<p>please enter a payment method</p>';
  echo '<input onclick="location.href = \'profile.php\';" class="btn btn-primary"  name="uidMN" type = "submit" value= "GO"/>';
}
if($res==True && $rows>0)
    {
      echo '<label for="savedpay">Choose a saved payment:</label>

      <select name="savedpay" id="savedpay">';
      echo '<option name="cardnum" >Select Please</option>';
      while ($obj = $res -> fetch_object()) 
      {
          echo '<option name="PID" value="'.$obj->pid.'">'.$obj->cardNumber.'</option>';
      }
      echo '<input type="submit" name="pay" value="Pay" />';
      echo '</form><br></select>
      <br>
      ';
    }


?>
<br>


</div>
</div>
<?php


}




?>
