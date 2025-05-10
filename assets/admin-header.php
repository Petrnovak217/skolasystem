<?php
$role = $_SESSION["role"];
?>

<header>
    <div id="logo">
        <img src="../img/hogwarts-logo.png" alt="">
    </div>

    <div class="menu-btn">
        <span class="menu-btn_burger"></span>
    </div>

    <nav id="nav">
        <ul>
            <li><a href="students.php">Seznam žáků</a></li>
            <?php if($role ==="admin"): ?>
            <li><a href="add-student.php">Přidat žáka</a></li>
            <?php endif ?>
            <li><a href="photos.php">Přidat Obrázek</a></li>
            <li><a href="log-out.php">Odhlásit se</a></li>
        </ul>
    </nav>
</header>