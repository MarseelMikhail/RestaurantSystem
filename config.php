<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>

<script>console.log(localStorage.getItem["foods"]);</script>
<?php

if(isset($_POST)){
    //Retrieve the string, which was sent via the POST parameter "user" 
    print_r($_POST);

    
    //Decode the JSON string and convert it into a PHP associative array.

    
    //var_dump the array so that we can view it's structure.


foreach($_POST as $value) {

   $qtyOut = $value . "<br>";

}
   // do whatever we want with the users array.
}else {print_r("bye");
}
 
?>
