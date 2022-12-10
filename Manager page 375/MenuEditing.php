
<?php
require_once("database.php");


try {
  $conn = new PDO("mysql:host=localhost;dbname=$database", $user, $pass);
  } catch (PDOException $e) {
  throw new PDOException($e->getMessage(), (int)$e->getCode());
  }



?>

<?php
  $q = "SELECT mid, foodName, foodDescription, foodImage, foodPrice FROM menu WHERE isDelete <> '1' or isDelete IS NULL ORDER BY mid ASC;";

  $result = $conn->query($q);
  $rowCount = $result->rowCount();
  $mid = 0;

?>









<!DOCTYPE html>



<html  lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width" />
    
    <title>Menu Editing Page</title>
    <link rel="stylesheet" type="text/css" href="OrderDetails.css" />

  </head>


  
  <body>
    <div class="topGrid">
      <div class="title"><h1>Menu Editing Page</h1></div>
    </div>
    <hr/>


    <div class="MenuGrid">


<?php

  $loopCounter = 0;
  $i = 0;
  while($rowCount > 0 && $loopCounter < 15){
    $row = $result->fetch();
  $i = $i + 1;
  ?>


<?php

    if($mid != $row["mid"]){
      $mid = $row["mid"];

?>
    

    
      
        <div class="middleGridFirstColumn">
<?php
  
  echo $i;
    
?>

        </div>

        <div class="middleGridSecondColumn">
<?php

  echo $row["foodName"];

?>
        </div>

        <div class="middleGridThirdColumn">
<?php

  echo $row["foodDescription"];

?>

        </div>

        <div class="middleGridFourthColumn">


        <img class = "menuImage" src="<?php echo $row['foodImage'] ?>" />

        </div>

<div class="middleGridfifthColumn">

<?php

  echo $row["foodPrice"];

?>

        </div>

        <div class="middleGridsixthColumn"><a class="link" href="./ItemDeleted.php?MenuNumber=<?php echo $mid; ?>">Delete
<?php
  echo $i;
?>
        </a>
        </div>



<?php
    }
  $rowCount--;
  $loopCounter++;
  }
?>
  </div>  


  <hr/>
  <div class="bottomGrid">
      
  <div class="footerGrid"> <h>If you want add items to the menu, click  <a class="link" href="./ItemAdd.php">Here</a>. 
  <br/>
  <br/>
  If you want to go back to the main page, click  <a class="link" href="./Main.php">Here</a>. 
  </h> </div>
  </div>
  
  <script type="text/javascript" src="./Main.js" ></script>
  </body>
  
</html>

