<?php

require "../classes/Connect.php";
require "../classes/Student.php";;
require "../classes/User.php";

session_start();

if(!User::isLoggedIn()){
    die("Nepovolený přístup");
}

$role = $_SESSION["role"];

$database = new Database();
$connect = $database -> connectDB();


if(is_numeric($_GET["id"]) && isset($_GET["id"])){
    $student = Student::getStudent($connect,$_GET["id"]);
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/main.css">
    <title>Informace o žákovi</title>
</head>
<body id="one-student-info">
   
    <?php require "../assets/admin-header.php" ?> 
  

    <main id="one-student-main" >
       
        <h1>Informace o žákovi</h1>
        

        <section class="one-student-info-statement">
            <?php if($student === null): ?>
                <p>Žák nenalezen</p>

            <?php else: ?>
                <h2><?= htmlspecialchars($student["first_name"] ." ". $student["second_name"])?></h2>
                <p><strong>Věk:</strong> <?= $student["age"]?></p>
                <p><strong>Dodatečné Informace:</strong> <?= htmlspecialchars($student["life"])?></p>
                <p><strong>Kolej:</strong> <?= htmlspecialchars($student["college"])?></p>
            <?php endif; ?>

            <?php if($role==="admin"):?>
                <div class="buttons">
                    <a href="edit-student.php?id=<?=$student['id']?>">Editovat</a>
                    <a href="delete-student.php?id=<?=$student['id']?>">Smazat</a>
                </div>
            <?php endif; ?>
        </section>

   
    </main>

    <?php require "../assets/footer.php"?> 
    <script src="../js/script.js"></script>
</body>
</html>