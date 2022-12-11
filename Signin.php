
<!DOCTYPE html>
<!-- Created By CodingNepal -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8" />
    <title>Login and Registration Form in HTML | CodingNepal</title>
    <link rel="stylesheet" href="SignInUp.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  </head>
  <body>
    <div class="wrapper">
      <div class="title-text">
        <div class="title login">Login Form</div>
        <div class="title signup">Signup Form</div>
      </div>
      <div class="form-container">
        <div class="slide-controls">
          <input type="radio" name="slide" id="login" checked />
          <input type="radio" name="slide" id="signup" />
          <label for="login" class="slide login">Login</label>
          <label for="signup" class="slide signup">Signup</label>
          <div class="slider-tab"></div>
        </div>
        <div class="form-inner">

          
          <form action="Signin.php" class="login" method="post">
            <div class="field">
              <input type="text" placeholder="Email Address" name="userEmail" required />
            </div>
            <div class="field">
              <input type="password" placeholder="Password" name="userPass" required />
            </div>
            <div class="pass-link">
              <a href="#">Forgot password?</a>
            </div>
            <div class="field btn">
              <div class="btn-layer"></div>
              <input type="submit" name="login" value="Login" />
            </div>
          </form>


          <form action="Signin.php" class="signup" method="post">
            <div class="field">
              <input type="text" name="Fname" placeholder="First Name" required />
            </div>
            <div class="field">
              <input type="text" name="Lname" placeholder="Last Name" required />
            </div>
            <div class="field">
              <input type="text" name="Username" placeholder="User Name" required />
            </div>
            <div class="field">
              <input type="text" name="Email" placeholder="Email Address" required />
            </div>
            <div class="field">
              <input type="password" name="Password" placeholder="Password" required />
            </div>
            <div class="field">
              <input type="password" placeholder="Confirm password" required />
            </div>
            <div class="field btn">
              <div class="btn-layer"></div>
              <input name="signup" type="submit" value="Signup" />
            </div>
            <div class="field btn">
              <div class="btn-layer"></div>
              <input type="submit" value="Reset" />
            </div>
          </form>

        </div>
      </div>
    </div>
    <script>
      const loginText = document.querySelector(".title-text .login");
      const loginForm = document.querySelector("form.login");
      const loginBtn = document.querySelector("label.login");
      const signupBtn = document.querySelector("label.signup");
      const signupLink = document.querySelector("form .signup-link a");
      signupBtn.onclick = () => {
        loginForm.style.marginLeft = "-50%";
        loginText.style.marginLeft = "-50%";
      };
      loginBtn.onclick = () => {
        loginForm.style.marginLeft = "0%";
        loginText.style.marginLeft = "0%";
      };
      signupLink.onclick = () => {
        signupBtn.click();
        return false;
      };
    </script>
  </body>
</html>

<?php
include 'connect.php';
if(isset($_POST["signup"]))
{
    $sql= "INSERT INTO user(firstName, lastName, userName, email, password, accountType) VALUES(".json_encode($_POST['Fname']).",".json_encode($_POST['Lname']).",".json_encode($_POST['Username']).",".json_encode($_POST['Email']).",".json_encode($_POST['Password']).", 1)";
    mysqli_query($db, $sql);
}

if(isset($_POST["login"]))

{
    $sql= "SELECT uid, accountType FROM user WHERE email=".json_encode($_POST['userEmail'])."AND password=".json_encode($_POST['userPass']).';';
    mysqli_query($db, $sql);
    $res = $db->query($sql);
    if(mysqli_num_rows($res) == 1)
    {
        $obj = $res -> fetch_object();
        $uid = $obj->uid;
        $acc = $obj->accountType;
        
        session_start();
        if($acc==0)
        {$_SESSION['uid'] = $uid;
        header('location:userMain.php');}
        if($acc==1)
        {$_SESSION['man'] = $uid;
        header('location: Manager_page/main.php');}
    }

}

?>