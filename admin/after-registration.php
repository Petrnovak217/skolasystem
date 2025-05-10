<?php

require "../classes/Connect.php";
require "../classes/User.php";

session_start();

if($_SERVER["REQUEST_METHOD"] === "POST"){
    
    $database = new Database();
    $connect = $database -> connectDB();

    $first_name = $_POST["first_name"];
    $second_name =$_POST["second_name"];
    $email= $_POST["email"];
    $password = password_hash($_POST["password"],PASSWORD_DEFAULT);
    $role = "user";

   
    
    $id = User::createUser($connect,$first_name,$second_name,$email,$password,$role);
    
    if(!empty($id)){
        /* fixation attack fixed */
        session_regenerate_id(true);

        //nastavení přihlašeného uživatele + id uživatele
        $_SESSION["is_logged_in"] = true;
        $_SESSION["userId"] = $id;
        $_SESSION["role"] =$role;

        header("location:students.php");
    }else{
        echo "uzivatele se nepodařilo přidat";
    }
}else{
    die("Nepovolený přístup");
}