
<?php
require_once("database.php");



try {
  $conn = new PDO("mysql:host=localhost;dbname=$database", $user, $pass);
  } catch (PDOException $e) {
  throw new PDOException($e->getMessage(), (int)$e->getCode());
  }



?>

<?php

    $Order = "";
    if (isset($_GET["Order"])){
        $Order = $_GET['Order'];
    }



  $q = 
    "SELECT 
    order_details.id, orders.oid, orders.orderPlaceDate, orders.orderNote, menu.mid, menu.foodName, menu.foodPrice, order_details.quantity, order_details.item_total
    FROM
    order_details INNER JOIN orders ON (order_details.oid = orders.oid) INNER JOIN menu ON (order_details.mid = menu.mid) 
    WHERE orders.oid = '$Order'
    ORDER BY order_details.id DESC;" ;


  $result = $conn->query($q);
  $rowCount = $result->rowCount();
  $odid = 0;

?>









<!DOCTYPE html>


<html  lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width" />
    
    <title>Order Details</title>
    <link rel="stylesheet" type="text/css" href="OrderDetails.css" />

  </head>

<?php

    $OrderDetail = $conn->query($q);
    $OrderInfo = $OrderDetail->fetch();

?>
  
  <body>
    <div class="topGrid">
      <div class="title"><h1>Order Details of #


<?php

  echo $Order;
 
?>
      </h1></div>
    </div>
    <hr/>






    <div class="middleGrid">

    <div class="DetailsGrid"><h>Order placed date: </h>



<?php

  echo $OrderInfo["orderPlaceDate"];
 
?>


    <hr/>

    <h>Order Notes: </h>

<?php

  echo $OrderInfo["orderNote"];
 
?>

    </div>



    <div class="DescGrid">
    <div class="middleGridFirstColumn"> Food Names</div>
    <div class="middleGridSecondColumn"> Price</div>
    <div class="middleGridThirdColumn"> Quantity</div>
    <div class="middleGridFourthColumn"> Subtotal</div>
    </div>





    <div class="OrderGrid">


<?php

  $loopCounter = 0;
  while($rowCount > 0){
    $row = $result->fetch();
?>


<?php

    if($odid != $row["id"]){
      $odid = $row["id"];
?>
    

    
      
        <div class="middleGridFirstColumn">
<?php
  
  echo $row["foodName"];
    
?>

        </div>
        <div class="middleGridSecondColumn">
<?php

  echo $row["foodPrice"];

?>
        </div>
        <div class="middleGridThirdColumn">
<?php

  echo $row["quantity"];

?>

        </div>

        <div class="middleGridFourthColumn">
<?php

  echo $row["item_total"];

?>

        </div>

<?php
    }
  $rowCount--;
  $loopCounter++;
  }
?>
  </div>  
  </div>
  </div>
  <hr/>
  
  <div class="bottomGrid">
  <div class="footerGrid"> <h>If you want to go back to the main page, click  <a class="link" href="./Main.php">Here</a>. </h> </div>
  </div>
  
  <script type="text/javascript" src="./Main.js" ></script>
  </body>
  
</html>

