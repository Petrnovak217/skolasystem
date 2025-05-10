
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css">
    <title>Document</title>
</head>
<body>
    <?php require "assets/header.php" ?>

    <main id="registration-main">
        <section class="registration-form">

            <h1>Zaregistruj se zde</h1>

            <form action="admin/after-registration.php" method="POST">
                <input type="text" name="first_name" placeholder="Křestní jméno" autofocus required></br>
                <input type="text" name="second_name" placeholder="Přímení" required></br>
                <input type="email" name="email" placeholder="E-mail" required></br>
                <input type="password" name="password" placeholder="Heslo" class="password-reg" required><br>
                <input type="password" name="password" placeholder="Ověření hesla" class="con-password-reg" required><br>
                <p class="result-text"></p>
                <input type="submit" value="Zaregistrovat se">
            </form>
        </section>
    </main>

    <?php require "assets/footer.php" ?>
    <script src="js/script.js"></script>
    <script src="js/control_pasword.js"></script>
</body>
</html>