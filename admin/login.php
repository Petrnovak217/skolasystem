<?php
require "../classes/Connect.php";
require "../classes/User.php";

session_start();

if($_SERVER["REQUEST_METHOD"] === "POST"){
    $database = new Database();
    $connect = $database -> connectDB();

    $log_email = $_POST["login-email"];
    $log_password = $_POST["login-password"];

    if(User::authentication($connect,$log_email,$log_password)){
        $id = User::getUserId($connect,$log_email);

        
        /* fixation attack fixed */
        session_regenerate_id(true);

        //nastavení přihlašeného uživatele + id uživatele
        $_SESSION["is_logged_in"] = true;
        $_SESSION["userId"] = $id;
        $_SESSION["role"] = User::getUserRole($connect,$id);

        

        header("location:students.php");
    }else{
        $error = "chyba při přihlášení zkontrolujte správnost hesla nebo E-mailu";
        
    }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p><?=$error?></p>
    <a href="../sign-in.php">Zpět na přihlášení</a>
</body>
</html>