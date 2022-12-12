

<section class="navbar">
        <div class="container">
            <form method="post" action="userMain.php">
            <div class="menu text-right">
                <ul>
                    <li>
                        <a href="../userMain.php">Home</a>
                    </li>
                    <?php if(isset($_SESSION['man'])){?>
                    <li>
                        <a href="Signin.php">Past orders</a>
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