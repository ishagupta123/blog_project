<?php
    session_start();
    include_once "config.php";
                if(isset($_FILES['image'])){
                    $img_name = $_FILES['image']['name'];
                    $img_type = $_FILES['image']['type'];
                    $tmp_name = $_FILES['image']['tmp_name'];
                    $img_explode = explode('.',$img_name);
                    $img_ext = end($img_explode);
                    $extensions = ["jpeg", "png", "jpg"];
                    if(in_array($img_ext, $extensions) === true){
                        $types = ["image/jpeg", "image/jpg", "image/png"];
                        if(in_array($img_type, $types) === true){
                        echo    $time = time();
                        echo    $id=$_SESSION['unique_id'];
                        $caption=$_POST['caption'];
                        echo    $new_img_name = $time.$img_name;
                            if(move_uploaded_file($tmp_name,"images/".$new_img_name)){
                                echo  $sql="INSERT INTO post (user_id,img,caption) VALUES ({$id},'{$new_img_name}','{$caption}')";
                                mysqli_query($conn,$sql);
                                header("Location:home.php");   
                            }
                   }    }
                }
?>