<?php 
    include("php/connect.php");
    //   delete
       if(isset($_POST['delete'])) {
           $id_to_delete = mysqli_real_escape_string($conn,$_POST['id_to_delete']);

           $sql = "DELETE FROM user WHERE id=$id_to_delete";
           if(mysqli_query($conn,$sql)) {
            //    success
            header('Location: data.php');

           } {
            //    failure 
            echo 'query error:' .mysqli_error($conn);
           }
        }
        else if(isset($_POST['dontdelete'])) {
          header("location: data.php");
          exit();  
        }

// check GET request id parameter
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

?>


<!DOCTYPE html>
<html lang="en">
<?php 
include('php/header.php');


?>
<div class="details-container">

    
    <!-- delete form -->
    
    <form class="deleterecord" action="details.php" method="POST">
        <a href="data.php" class="back">&#8678;</a>
        <h1>Are you sure you want to delete this record?</h1>
        <input type="hidden" name="id_to_delete" value="<?php echo $user['id'] ?>">
        <h4>Username:<?php echo htmlspecialchars($user['username']); ?></h4>
        <h4>Password:<?php echo htmlspecialchars($user['password']); ?></h4>
        <p>Email:: <?php echo htmlspecialchars($user['email']);   ?></p>
        <input type="submit" name="delete" value="Yes">
        <input type="submit" name="dontdelete" value="No">
           </form>
   
      
</div>

 <?php
  include('php/footer.php')
   ?>
</html>

