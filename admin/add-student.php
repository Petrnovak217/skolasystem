<?php
require "../classes/Connect.php";
require "../classes/Student.php";
require "../classes/User.php";



session_start();

$role = $_SESSION["role"];

if(!$role === "admin"){
    die("Tato funkce je pouze pro admina");
}

if(!User::isLoggedIn()){
    die("Nepovolený přístup");
}

$database = new Database();
$connect = $database -> connectDB();

$first_name ="";
$age ="";
$second_name ="";
$life="";
$college ="";
   

if($_SERVER["REQUEST_METHOD"]=== "POST"){

    $first_name = $_POST["first_name"];
    $age = $_POST["age"];
    $second_name =$_POST["second_name"];
    $life=$_POST["life"];
    $college =$_POST["college"];

    $id = Student::createStudent($connect,$first_name,$second_name,$age,$life,$college);
    
    if($id){
        header("Location:one-student.php?id=$id");
    }else{
        echo "Žák nebyl vytvořen";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/main.css">
    <title>Document</title>
</head>
<body>
    
    <?php require "../assets/admin-header.php" ?>
  

    <main id="add-main">
        <section class="add-form">
        <h1 class="add-tittle">Přidat studenta</h1>
            <?php require "../assets/form.php" ?>
        </section>
    </main>


    <?php require "../assets/footer.php"  ?>
    <script src="../js/script.js"></script>
</body>
</html>