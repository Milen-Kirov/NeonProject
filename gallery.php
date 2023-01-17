<?php

include('php/header.php');
include('php/connect.php');

    if(isset($_POST['submit']) && isset($_FILES['my_image']))  {

        // echo "hello";
     
        $img_name = $_FILES['my_image']['name'];
        $img_size = $_FILES['my_image']['size'];
        $tmp_name = $_FILES['my_image']['tmp_name'];
        $error = $_FILES['my_image']['error'];

        if($error === 0) {
                if($img_size > 1250000) {
                 echo "Sorry your file is too large";
                }
                else {
                    $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                    $img_ex_lc = strtolower($img_ex);

                    $allowed_exs = array("jpg", "jpeg" , "png");

                    if (in_array($img_ex_lc, $allowed_exs)) {
                        $new_img_name = uniqid("IMG-", true).".".$img_ex_lc;
                        $img_upload_path = 'uploads/'.$new_img_name;
                        move_uploaded_file($tmp_name, $img_upload_path);

                        $sql = "INSERT INTO images(file_name) VALUES('$new_img_name') ";
                        mysqli_query($conn,$sql);
                    } else {
                        echo "u cant upload files with this type";
                    }
                }
        } else {
            echo "Not more than 1 mb";
        }

            // print_r($_FILES['my_image']);
        // if(!empty($_FILES['file']['name'])) {
        // $fileName = basename($_FILES['file']['name']);
        // $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

        // allow certain file fortmat
       
   } 
        

           
       
?>

    <!-- Gallery -->

    <h1 id="gallerytext"></h1>
    <div class="gallery">
        <div class="gallery-button">
           
        </div>
            

        <form action="gallery.php" method="POST" enctype='multipart/form-data'>
            <?php
            $sql = "SELECT * FROM images ORDER by uploaded_on desc";
            $res = mysqli_query($conn,$sql);
            if(mysqli_num_rows($res) > 0) {
                while($images = mysqli_fetch_assoc($res)) {
                    ?> 
                 <a href="uploads/<?=$images['file_name'] ?>"  data-lightbox="images"> <img src="uploads/<?=$images['file_name']?>"> </a>

         <?php       }
            }
            
            
            
            ?>
            
            <input type="file" name="my_image">
            <input type="submit" name="submit" value="Upload"></input>

        </form>



    </div>
    <!-- Gallery End -->
 <?php 
     include('php/footer.php');
     ?>
