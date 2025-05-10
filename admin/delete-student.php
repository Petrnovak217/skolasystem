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

if($_SERVER["REQUEST_METHOD"] === "POST"){
    if(Student::deleteStudent($connect,$_GET["id"])){
        header("location:students.php");
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

    
    <main id="delete-main">
        <?php if($role === "admin"):?>

            <section class = "delete-form">
                <form method="POST">
                    <p>Jste si jistý že chcete tohoto žáka smazat?</p>
                    <button>Smazat</button>
                    <a href="one-student.php?id=<?=$_GET["id"]?>">Zrušit</a>
                </form>
            </section>

        <?php else:?>
            <h1>Nepovolený přístup tato stránka je pouze pro admina</h1>
        <?php endif;?>
       
    </main>

    <?php require "../assets/footer.php"?> 
    <script src="../js/script.js"></script>
</body>
</html>

