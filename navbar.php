<section class="navbar">
        <div class="container">
            <div class="logo">
                <a href="#" title="Logo">
                    <img src="images/logo.png" alt="Restaurant Logo" class="img-responsive">
                </a>
            </div>
            <form method="post" action="userMain.php">
            <div class="menu text-right">
                <ul>
                    <li>
                        <a href="userMain.php">Home</a>
                    </li>
                    <li>
                        <a href="categories.html">Categories</a>
                    </li>
                    <li>
                        <a href="foods.html">Foods</a>
                    </li>
                    <li>
                        <a href="#">Contact</a>
                    </li>
                    <?php if(isset($_SESSION['uid'])){?>
                    <li>
                    <input class="btn btn-primary"  name="uidMN" type = "submit" value='Hello'+ <?php echo $_SESSION["uid"]?> />
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