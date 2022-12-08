<div>Thank You</div>
<?php
include "connect.php";
session_start();
if(isset($_POST["pay"]))
{
    $sql= "INSERT INTO TABLE orders(isPaid) VALUES(1) WHERE uid=".$_SESSION["uid"]." AND oid=".$_SESSION["oid"].";";
    $db->query($sql);
    unset($_SESSION['uid']);
    unset($_SESSION['oid']);

}
?>