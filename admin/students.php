<?php

require "../classes/Connect.php";
require "../classes/Student.php";
require "../classes/User.php";
require "../assets/search-sort-function.php";

session_start();

if(!User::isLoggedIn()){
    die("Nepovolený přístup");
}

$database = new Database();
$connect = $database -> connectDB();

$students = Student::getAllStudents($connect,"id, first_name, second_name");
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/main.css">
    <title>Seznam žáků</title>
</head>
<body id="all_student-body">

   
    <?php require "../assets/admin-header.php" ?> 


    <main id="all-students-main">

        
        <h1>Seznam žáků</h1>

        <section class="search wrapper">
            <input class="search-input" type="text" placeholder="Hledat žáka" >
        </section>

        <section class="sort_btns  wrapper">
            <button class="DESC desc-sort">Sestupně</button>
            <button class="ASC asc-sort">Vzestupně</button>
        </section>

        <section class="students-list">
            
            <?php if(empty($students)): ?>
                <p>Žáci nenalezeni</p>
            <?php else: ?>
            <div class="all_students wrapper">
                <?php foreach($students as $student): ?>
                   <div class="one-student-box">
                        <ul class="one-student">
                            <li><?= htmlspecialchars($student["first_name"]. " ".$student["second_name"])?></li>
                            <a href="one-student.php?id=<?=$student['id']?>">Více informací</a>
                        </ul>
                   </div>
                <?php endforeach; ?>
            <?php endif; ?>

            </div>
           
        </section>
    </main>

    <?php require "../assets/footer.php" ?> 
    <script src="../js/script.js"></script>
    <script src="../js/filters.js"></script>
   

</body>
</html>
