<?php 
include('php/header.php');
include('php/connect.php');
?>
<?php 
// write query
       $sql = 'SELECT id,username,password,email from user';

    //    make query and get results
    $result = mysqli_query($conn,$sql);
    // fetch
    $users = mysqli_fetch_all($result,MYSQLI_ASSOC);
  
$errors = array('email' => '','username' => '','password'=>'');

$email = "";
$username = "";
$password = "";

 if(isset($_POST['submit'])) {


     // check email
     if(empty($_POST['email'])){
         $errors['email']= 'Email is reuired';
     }else {
         $email = $_POST['email'];
         if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
               $errors['email'] = 'E-mail is invalid';
         }
         
     }
     // check Username
     if(empty($_POST['username'])){
         $errors['username'] = 'Username is required';
     }else {
         $username = $_POST['username'];
         if(!preg_match('/^[a-zA-Z\s]+$/', $username)){
             $errors['username'] = 'username must be letters and spaces only';
         }
        }
        // check password
        if(empty($_POST['password'])){
            $errors['password'] = 'Password is required';
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
            header('Location: data.php');
        } else {
            echo 'errorbro';
        }

        // go to this page after everithing
    }
    
}
?>

    <!-- Section-2 -->

    <section class="section-Table">
        <div class="table-header">

            <h1>Table</h1>
        </div>
        
        <table class="content-table">
            <thead>
                <tr>
                    <th>User id</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Email</th>
                     <?php 
                if(isset($_SESSION["useruid"])) { ?>
                    <th>Edit/Delete</th>
               <?php  }

                

?>
</tr>
            </thead>


            <tbody>
                <tr>
                   <td>        
                       <?php foreach($users as $user) { ?> 
                                   <h5><?php echo htmlspecialchars($user['id']); ?></h5>      
                           <?php } ?>
                   </td>
                   <td>        
                       <?php foreach($users as $user) { ?> 
                                   <h5><?php echo htmlspecialchars($user['username']); ?></h5>      
                           <?php } ?>
                   </td>
                   <td>        
                       <?php foreach($users as $user) { ?> 
                                   <h5><?php echo htmlspecialchars($user['password']); ?></h5>      
                           <?php } ?>
                   </td>
                   <td>        
                       <?php foreach($users as $user) { ?> 
                                   <h5><?php echo htmlspecialchars($user['email']); ?></h5>      
                           <?php } ?>
                   </td>
                   <td>        
                       <?php foreach($users as $user) { ?> 
                        <div class="neshto">
                             <?php 

                if(isset($_SESSION["useruid"])) { ?>
                  <a class='more-info' href="update.php?id=<?php echo $user['id'] ?>"><i class="fas fa-edit" aria-hidden="true"></i></a>  
                  <a class='more-info' href="details.php?id=<?php echo $user['id'] ?>"><i class="fa fa-trash" aria-hidden="true"></i></a> 
              
            
              
               <?php }             
               ?>

                
                       
                            

                        </div>
                           <?php } ?>
                   </td>
                      
                  
                </tr>

            </tbody>
            <thead>
                </thead>
                
            </table>
            <table class="content-table">
                <thead>
                    <tr>
                        <th>              
                           There are currently <?php echo count($users);  ?> records
                           <br>
                           <?php 
                if(isset($_SESSION["useruid"])) { ?>
                    <a href="#divOne"><button>Add Record</button></a> 
                    
                    <?php }
                else {
                    echo "<a href='login.php'>Click here to Login</a>";
                
                
                }



                ?>
                    </th>
                </tr>
            </thead>
        </table>
   
       
    <!-- Section-2 End -->

    <!-- if(isset($_POST['submit'])){ -->
        <!-- check email -->

    <div class="overlay" id="divOne">

        <form class="addrecord" action="data.php" method="POST">
            <a href="#" class="close">&times;</a>
               <h1>Add Record</h1>
       

               
               <input type="text" name="username" placeholder="Username" value="<?php echo $username ?>">
               <div class="red-text"><?php echo $errors['username']; ?></div>
               <input type="password" name="password" placeholder="Password" value="<?php echo $password ?>">
               <div class="red-text"><?php echo $errors['password']; ?></div>
               <input type="text" name="email" placeholder="E-Mail" value="<?php echo $email ?>">
               <div class="red-text"><?php echo $errors['email']; ?></div>

               <input type="submit" name="submit" value="submit">
           </form>
    </div>


  <?php
  include('php/footer.php')
   ?>