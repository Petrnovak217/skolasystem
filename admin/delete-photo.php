<?php

require "../classes/Connect.php";
require "../classes/User.php";
require "../classes/Image.php";

session_start();

if(!User::isLoggedIn()){
    die("Nepovolený přístup");
}

$database = new Database();
$connect = $database->connectDB();

$user_id = $_GET["id"];
$image_name = $_GET["image_name"];

$image_path = "../uploads/".$user_id."/".$image_name;

if(Image::deleteImageFromDirectory($image_path)) {

    if(Image::deleteImageFromDB($connect,$image_name)){
        header("location:photos.php");
    }else{
        echo "chyba při odstranovaní obrázku z databáze";
    }
   
}else{
    echo "chyba při odstraňovaní obrázku ze složky";
}

