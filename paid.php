<?php 
include "connect.php"; 

?>
<div>Thank You</div>
<?php
 session_start();

if(isset($_POST["pay"]))
{
    $sql= "INSERT INTO TABLE orders(isPaid) VALUES(1) WHERE uid=".$_SESSION["uid"]." AND oid=".$_SESSION["oid"].";";

    "INSERT INTO orders(isPaid) 
    SELECT 1
        FROM orders
        WHERE EXISTS (SELECT * FROM orders
                             WHERE uid = ".$_SESSION["uid"]." 
                               AND oid = ".$_SESSION["oid"].")"
    $db->query($sql);
    unset($_SESSION['uid']);
    unset($_SESSION['oid']);

}
?>