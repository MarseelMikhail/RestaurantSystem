
<?php
require_once("database.php");



try {
  $conn = new PDO("mysql:host=localhost;dbname=$database", $user, $pass);
  } catch (PDOException $e) {
  throw new PDOException($e->getMessage(), (int)$e->getCode());
  }



?>

<?php


$foodname = "";
$fooddesc = "";
$foodimage = "";
$foodprice = "";


if(isset($_POST['submit']) == TRUE){
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $foodname = trim($_POST["foodname"]);
        $fooddesc = trim($_POST["fooddesc"]);
        $foodimage = trim($_POST["imageupload"]);
        $foodprice = trim($_POST["foodprice"]);
    
    }
    
    $queryinsert = "INSERT INTO Menu (foodName, foodDescription, foodImage, foodprice) VALUES ('$foodname', '$fooddesc', '$foodimage', '$foodprice')";
    $insert = $conn->query($queryinsert);



    header("Location: MenuEditing.php");

}



?>









<!DOCTYPE html>



<html  lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width" />
    
    <title>Add items</title>
    <link rel="stylesheet" type="text/css" href="OrderDetails.css" />

  </head>


  
  <body>
    <div class="topGrid">
      <div class="title"><h1>Adding Items</h1></div>
    </div>
    <hr/>



    <div class="middleGrid">
      <div class="registrationForm">
        <form id="addItemForm" method="POST" action="" >

          <p>Please input the details of the new item.</p>
          <p>Food Name:</p>
          <input type="text" id="foodname" name="foodname"/>
          <p>Food Description:</p>
          <input type="text" id="fooddesc" name="fooddesc"/>
          <p>Food image:</p>
          <input type="file" accept="image/*" id="imageupload" name="imageupload" />
          <p>Food Price</p>
          <input type="number" id="foodprice" step='0.01' min="0" max="999999" name="foodprice" />

          <div class="submit">
            <input type="submit" value="Confirm" id="submit" name="submit"/>
          </div>
        </form>
      </div>
    </div>

<hr/>



  
  <div class="bottomGrid">
  <div class="footerGrid"> <h><a class="link" href="./MenuEditing.php">Go back to the Menu page.</a></h> </div>
  </div>
  
  <script type="text/javascript" src="./ItemAdd.js" ></script>
  </body>
  
</html>

