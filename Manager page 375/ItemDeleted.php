
<?php
require_once("database.php");



try {
 $conn = new PDO("mysql:host=localhost;dbname=$database", $user, $pass);
  } catch (PDOException $e) {
  throw new PDOException($e->getMessage(), (int)$e->getCode());
  }

?>



<?php

    $MenuNumber = "";
    if (isset($_GET["MenuNumber"])){
        $MenuNumber = $_GET['MenuNumber'];
    }



    $q = "SELECT Menu.mid, Menu.foodName, Menu.foodDescription, Menu.foodImage, Menu.foodPrice 
        FROM Menu 
        WHERE Menu.mid = '$MenuNumber';";


    $q2 = "DELETE FROM menu WHERE menu.mid= '$MenuNumber';";





  $result = $conn->query($q);
  $delete = $conn->query($q2);
  $menuDelete = $result->fetch();
?>









<!DOCTYPE html>



<html  lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width" />
    
    <title>Delete Confirm</title>
    <link rel="stylesheet" type="text/css" href="OrderDetails.css" />

  </head>


  
  <body>
    <div class="topGrid">
      <div class="title"><h1>


<?php

  echo $menuDelete["foodName"];
 
?>
    Deleted</h1></div>
    </div>
    <hr/>






    <div class="middleGrid">

        <div class="DetailsGrid">
            <h>Food Name: </h>



<?php

  echo $menuDelete["foodName"];
 
?>


        <hr/>

        <h>Description: </h>

<?php

    echo $menuDelete["foodDescription"];
 
?>

        <hr/>

        <h>Image: </h>

        <img class = "menuImage" src="<?php echo $menuDelete["foodImage"] ?>" />


        <hr/>

        <h>Price: </h>

<?php

    echo $menuDelete["foodPrice"];

?>




    </div>





 

  </div>

  
  <div class="bottomGrid">
  <div class="footerGrid"> <h><a class="link" href="./MenuEditing.php">Go back to the Menu page.</a></h> </div>
  </div>
  
  <script type="text/javascript" src="./Main.js" ></script>
  </body>
  
</html>

