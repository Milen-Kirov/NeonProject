 
  
  <?php
include('php/connect.php');

$errors = array('email' => '','username' => '','password'=>'');

$email = "";
$username = "";
$password = "";

 if(isset($_POST['submit'])) {


     // check email
     if(empty($_POST['email'])){
         $errors['email']= 'Email is rquired';
     }else {
         $email = $_POST['email'];
         if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
               $errors['email'] = 'E-mail is invalid';
         }
         
     }
     // check Username
     if(empty($_POST['username'])){
         $errors['username'] = 'Username is rquired';
     }else {
         $username = $_POST['username'];
         if(!preg_match('/^[a-zA-Z\s]+$/', $username)){
             $errors['username'] = 'username must be letters and spaces only';
         }
        }
        // check password
        if(empty($_POST['password'])){
            $errors['password'] = 'Password is rquired';
        }
        else {
            // $errors['password'] = 'Password is 10';
            $password = $_POST['password'];
     }

     if(array_filter($errors)) {
        //  echo 'errors in the form';

             
     } else  {

        $username = mysqli_real_escape_string($conn,$_POST['username']);
        $password = mysqli_real_escape_string($conn,$_POST['password']);
        $email = mysqli_real_escape_string($conn,$_POST['email']);

        // create sql
        $sql = "INSERT INTO user(username,password,email) VALUES('$username','$password','$email')";

        // save to db anc check

        if(mysqli_query($conn,$sql)) {
            header('Location: index.php');
        } else {
            echo 'errorbro';
        }

        // go to this page after everithing
    }
    
}


//   end of POST checking
  ?>
  
  
  <?php 

   include('php/header.php');
?>

 <div class="grey lightgreen">
<div class="containerwe">
    <a href="#" class=" brand-logo brand-text">Ninja Bullshit</a>
    <ul id="nav-mobile" class="right hide-on-small-and-down">
        <li><a href="#" class="btn brand z-depth-0"> Add a izza</a></li>
    </ul>
</div>
 </div>   



 <section class="container">
<h4 class="center">
    Add A pizza
</h4>
<!-- <form class="white" action="test.php" method="POST">
    <label for="">Usrname:</label>
    <input type="text" name="username" value="<?php echo $username ?>">
    <div class="red-text"><?php echo $errors['username']; ?></div>
    <label for="">Password:</label>
    <input type="text" name="password" value="<?php echo $password ?>">
    <div class="red-text"><?php echo $errors['password']; ?></div>
    <div class="center">
        <label for="">Your Email:</label>
        <input type="text" name="email" value="<?php echo $email ?>">
        <div class="red-text"><?php echo $errors['email']; ?></div>
        <input type="submit" name="submit" value="submit">
    </div>
</form> -->
 </section>

<?php 
include('php/footer.php');
?>