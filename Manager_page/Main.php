
<?php
require_once("database.php");



try {
      $conn = new PDO("mysql:host=localhost;dbname=$database", $user, $pass);
  } catch (PDOException $e) {
  throw new PDOException($e->getMessage(), (int)$e->getCode());
  }



?>

<?php
  $q = "SELECT Orders.oid, Orders.orderPlaceDate, Orders.orderNote FROM Orders ORDER BY Orders.oid DESC;";

  $result = $conn->query($q);
  $rowCount = $result->rowCount();
  $oid = 0;

?>









<!DOCTYPE html>



<html  lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width" />
    
    <title>Restaurant Manager Page</title>
    <link rel="stylesheet" type="text/css" href="restaurant.css" />

  </head>


  
  <body>
    <div class="topGrid">
      <div class="title"><h1>Restaurant Manager Page</h1></div>
    </div>
    <hr/>

    <div class="middleGrid">

    <div class="OrderGrid">


<?php

  $loopCounter = 0;
  while($rowCount > 0 && $loopCounter < 5){
    $row = $result->fetch();
  ?>


<?php

    if($oid != $row["oid"]){
      $oid = $row["oid"];
      $OrderNumber = $row["oid"];
?>
    

    
      
        <div class="middleGridFirstColumn">
<?php
  
  echo $row["oid"];
    
?>

        </div>
        <div class="middleGridSecondColumn">
<?php

  echo $row["orderNote"];

?>
        </div>
        <div class="middleGridThirdColumn">
<?php

  echo $row["orderPlaceDate"];

?>

        </div>
        <div class="middleGridFourthColumn"><a class="link" href="./OrderDetails.php?Order=<?php echo $OrderNumber; ?>">Details</a>
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
  <div class="footerGrid">       
    <h>If you want to edit the menu, click  <a class="link" href="./MenuEditing.php">Here</a>. </h> </div>
  </div>
  
  <script type="text/javascript" src="./ItemAdd.js" ></script>
  </body>
  
</html>

