 <?php 
    //  include('includes/connect.php');
     include('php/header.php');   
     ?>


 

    <!-- Section1 -->
    <form class="log-in" action="includes/login.inc.php" method="POST">
        <h1>Login</h1>

        <input type="text" name="uid" placeholder="Username/Email">
        <input type="password" name="pwd" placeholder="Password">
        <a href="#">Forgot Password?</a>
        <input type="submit" name="submit" value="submit">
        <a href="signup.php">Not a member? Sign Up</a>

       <?php

    if(isset($_GET["error"])) {
        if($_GET["error"] == "emptyinput") {
            echo "You need to fill all the required fields";
        }
        else if($_GET["error"] == "wronglogin") {
            echo "Incorrect login information";
        }
    }
    
    
    ?>
    </form>

    <div class="log-in-pic">
        <img src="./Pic/LogIn.png" alt="">
    </div>
    <!-- Section-1 End -->

    <?php 
     include('php/footer.php');
     ?>
