<?php
require "../classes/Connect.php";
require "../classes/User.php";
require "../classes/Image.php";

session_start();

if(!User::isLoggedIn()){
    die("Nepovolený přístup");
}

$user_id = $_SESSION["userId"];


if(isset($_POST["submit"]) && isset($_FILES["image"])){

    $database = new Database;
    $connect = $database -> connectDB();

    $image_name = $_FILES["image"]["name"];
    $image_size = $_FILES["image"]["size"];
    $image_tmp_name = $_FILES["image"]["tmp_name"];
    $error = $_FILES["image"]["error"];

    if($error ===0){
        if($image_size > 9000000){
            $error_message = "Váš soubor je příliš velký";
            echo $error_message;   
        
        }else{
            $image_extension = strtolower(pathinfo($image_name,PATHINFO_EXTENSION));

            $allowed_exstensions = ["jpg","jpeg","png"];

            if(in_array( $image_extension,$allowed_exstensions)){
                $new_image_name = uniqid("IMG-",true) . "." . $image_extension;

                if(!file_exists("../uploads/" .$user_id)){
                    mkdir("../uploads/" .$user_id,0755,true);
                }
               
                $image_upload_path = "../uploads/" . $user_id . "/" . $new_image_name;
                move_uploaded_file($image_tmp_name,$image_upload_path);

                //vložení dat do databáze
                if(Image::InsertImage($connect,$user_id,$new_image_name)){
                    header("location:photos.php");
                }
            }
        }

    }else{
        header("location:photos.php");
    }
}


?>