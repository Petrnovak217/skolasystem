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
$user_id = $_SESSION["userId"];

$all_image = Image::getImageByUserId($connect,$user_id);

if($_SERVER["REQUEST_METHOD"] === "POST"){
    
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

    <main id="photos-main">

        <h1>Fotky</h1>

        <section class="upload-photos">
            
            <form action="upload-photo.php" method="POST" enctype="multipart/form-data">
                <label for="file-upload" class="custom-file-upload">
                    Vyber soubor
                </label>

                <input id="file-upload" type="file" name="image" required>
                <span class="file-name">soubor?</span>
                <input type="submit" name="submit" value="odeslat obrázek">
            </form>
        </section>

        <section class="images">
            <article>
            <?php foreach ($all_image as $image ):?>
                   <div class ="photos-box">
                        <div class="image-box">
                            <img src=<?="../uploads/" . $user_id . "/" . $image["image_name"]?>>
                        </div>
                        <div class="photos-buttons">
                            <a class="btn-download btn" href=<?="../uploads/" . $user_id . "/" . $image["image_name"]?> download>Stáhnout</a>
                            <a class="btn-delete btn" href="delete-photo.php?id=<?=$user_id?>&image_name=<?=$image["image_name"]?>" >Smazat</a>
                        </div>
                   </div>


                <?php endforeach;?>
                               
            </article>
        </section>
    </main>

    <?php require "../assets/footer.php" ?> 
    <script src="../js/script.js"></script>
</body>
</html>