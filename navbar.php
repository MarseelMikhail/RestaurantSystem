<?php
if (isset($_SESSION['uid'])) {
    include 'connect.php';
    $sql = "SELECT * FROM user WHERE uid=" . $_SESSION["uid"] . ";";
    $res = $db->query($sql);
    if ($res == True) {
        while ($obj = $res->fetch_object()) {
            $user = $obj->firstName;
        }
        ;
    }
}
?>


<section class="navbar">
        <div class="container">
            <form method="post" action="userMain.php">
            <div class="menu text-right">
                <ul>
                    <li>
                        <a href="userMain.php">Home</a>
                    </li>
                    <?php if(isset($_SESSION['uid'])){?>
                    <li>
                        <a href="order_history.php">Past orders</a>
                    </li>   
                    <?php } ?>
                    <?php if(isset($_SESSION['uid'])){?>
                    <li>
                    <input class="btn btn-primary"  name="uidMN" type = "submit" value='Hello <?php echo $user; ?>' />
                        <input 
                        type="hidden" name="uidM" value=<?php echo $_SESSION["uid"]?>>
                    </li>
                    <?php } ?>
                </ul>
            </div>
            </form>

            <div class="clearfix"></div>
        </div>
    </section>
    <?php 
    if(isset($_POST["uidMN"]))
    {
        unset($_SESSION["uid"]);
        session_destroy(); 
        $flag=0;
        header("Location: userMain.php");
 
    }
    
    ?>