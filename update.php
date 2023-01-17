<?php 
include('php/connect.php');

 $sql = 'SELECT id,username,password,email from user';

    //    make query and get results
    $result = mysqli_query($conn,$sql);
      
 $errors = array('email' => '','username' => '','password'=>'');
 $email = "";
$username = "";
$password = "";


      if(isset($_POST['update'])) {
           $id_to_update = mysqli_real_escape_string($conn,$_POST['id_to_update']);

           $sql = "UPDATE `user` SET username='$_POST[username]',password='$_POST[password]',email='$_POST[email]' where id=$id_to_update";
           if(mysqli_query($conn,$sql)) {
            //    success
            header('Location: data.php');

           } {
            //    failure 
            echo 'query error:' .mysqli_error($conn);
           }
        }

        if(isset($_GET['id'])) {
$id = mysqli_real_escape_string($conn,$_GET['id']);
// make sql
$sql = "SELECT * FROM user WHERE id=$id";

// get query result
$result=mysqli_query($conn,$sql);

// fetch result in array format
$user = mysqli_fetch_assoc($result);

mysqli_free_result($result);
// mysqli_close($conn);
}


    // $username = $_POST['username'];
    // $id = $_POST['id'];
    // $sql = "UPDATE `user` SET username='$_POST[username]' WHERE id='$id'";
    // $res = mysql_query($sql) or die("Could not update".mysql_error());

    //   $query= "UPDATE `user` SET username='$_POST[username]',password='$_POST[password]', email='$_POST[email]'";
    //  $query_run = mysqli_query($conn,$query); 


   

?>


<!DOCTYPE html>
<html lang="en">
<?php 
include('php/header.php');
?>


   <form action="update.php" method="POST">
      <input type="hidden" name="id_to_update" value="<?php echo $user['id'] ?>">
       <label>  Username: </label>
       <input type="text" name="username">
       <label>  Password: </label>
       <input type="text" name="password">
       <label>  Email: </label>
       <input type="text" name="email">

       <input type="submit" name="update" value="Update Data">
   </form>


 <?php
  include('php/footer.php')
   ?>
</html>

