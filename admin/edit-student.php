<?php
require "../classes/Connect.php";
require "../classes/Student.php";
require "../classes/User.php";
session_start();

if(!User::isLoggedIn()){
    die("Nepovolený přístup");
}

$database = new Database();
$connect = $database -> connectDB();

$role = $_SESSION["role"];

if(is_numeric($_GET["id"]) && isset($_GET["id"])){
    $one_student = Student::getStudent($connect,$_GET["id"]);
    

    if($one_student){
        $first_name = $one_student["first_name"];
        $age = $one_student["age"];
        $second_name =$one_student["second_name"];
        $life=$one_student["life"];
        $college =$one_student["college"];
        $id =$one_student["id"];
    }else {
        die("Student není v databázi");
    }
 
}else {
    die("ID nenalezeno");
}

if($_SERVER["REQUEST_METHOD"] === "POST"){
    $first_name = $_POST["first_name"];
    $age = $_POST["age"];
    $second_name =$_POST["second_name"];
    $life=$_POST["life"];
    $college =$_POST["college"];

    if(Student::updateStudent($connect,$first_name,$second_name,$age,$life,$college,$id)){
        header("location:one-student.php?id=$id");
    };
   

    
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

    <?php if($role==="admin"):?>
    <main id="edit-main">
        <section class="edit-form">
            <h1 class="edit-tittle">Editovat studenta</h1>
            <?php require "../assets/form.php" ?>
            <a href="one-student.php?id=<?=$id?>">zpět</a>
        </section>
    </main>

    <?php else:?>
        <h1>Nepovolený přístup tato stránka je pouze pro admina</h1>
    <?php endif; ?>


    <?php require "../assets/footer.php"  ?>
    <script src="../js/script.js"></script>
</body>
</html>