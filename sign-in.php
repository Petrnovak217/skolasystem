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

    <main id="sign-in-main">
        <section class="sign-in-form">
                <h1>Přihlášení</h1>
                <form action="admin/login.php" method="POST">
                    <input type="email" name="login-email" class="email" placeholder="E-mail" autofocus required>
                    <input type="password" name="login-password" class="password" placeholder="Password" required>
                    <input type="submit" value="Příhlásit">
                </form>
        </section>
       </main>

    <?php require "assets/footer.php" ?>
    <script src="js/script.js"></script>
</body>
</html>