  <?php 

   include('php/header.php');
//    include('php/connect.php');
?>

<?php 



?>


    <form class="sign-up" action="includes/signup.inc.php" method="POST">
        <h1>Регистрация</h1>

         <input type="text" name="name" placeholder="Име">

         <input type="text" name="uid" placeholder="Фамилия">
         
         <input type="text" name="email" placeholder="Имейл">
         
         <input type="password" name="pwd" placeholder="Парола">
        <input type="password" name="pwdrepeat" placeholder="Повторно парола" >
        <input type="submit" name="submit" value="Създай акаунт">
    <?php
    
    if(isset($_GET["error"])) {
        if($_GET["error"] == "emptyinput") {
            echo "Всички полета са задължителни!";
        }
        // else if($_GET["error"] == "invaliduid") {
        //     echo "Не може да имате числа в полето 'Фамилия'";
        // }
        else if($_GET["error"] == "invalidemail") {
            echo "Неправилен Имейл";
        }
        else if($_GET["error"] == "passdontmatch") {
            echo "Паролите не съвпадат";
        }
        else if($_GET["error"] == "usernametaken") {
            echo "Имейлът, който сте въвели вече се изполва!";
        }
        else if($_GET["error"] == "stmtfailed") {
            echo "Нещо се обърка.";
        }
        else if($_GET["error"] == "none") {
             echo "Вие сте регистирани успешно.";
        }
    }
    
    ?>
    </form>
 
    <div class="sign-up-pic">
        <!-- <img src="./Pic/sign-up.png" alt=""> -->
    </div>


    
    
    <!-- <div class="checkbox">
        <input type="checkbox" id="check">
        <label for="check">I would like to receive future offers from crypto.com as well
            as deals and other
            marketing emails.</label>
    </div> -->

<?php 
include('php/footer.php');
?>