<?php


    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'vendor/PHPMailer/src/Exception.php';
    require 'vendor/PHPMailer/src/PHPMailer.php';
    require 'vendor/PHPMailer/src/SMTP.php';

    $first_name = ""; 
    $second_name = ""; 
    $email = "";
    $message = "";



    if($_SERVER["REQUEST_METHOD"] === "POST"){
        $first_name = $_POST["first_name"];
        $second_name = $_POST["second_name"];
        $email = $_POST["email"];
        $message = $_POST["message"];

        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host      = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth  = true;                                   //Enable SMTP authentication
            $mail->Charset = "UTF-8";
            $mail->Encroling = "base64";
            $mail->Username  = 'petrnovak217@gmail.com';                     //SMTP username
            $mail->Password  = 'rmtxbctgcjdstcce';                               //SMTP password
            $mail->SMTPSecure= "ssl";            //Enable implicit TLS encryption
            $mail->Port      = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
        
            //Recipients
            $mail->setFrom('petrnovak217@gmail.com');
            $mail->addAddress('petrnovak217@gmail.com');     //Add a recipient
    
        
            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Helpdesk';
            $mail->Body = "
            <strong>Jméno:</strong> {$first_name} {$second_name}<br>
            <strong>Email:</strong> {$email}<br>
            <strong>Zpráva:</strong><br>
            <p>{$message}</p>
            ";

            $mail->send();
            echo 'zpráva odeslána';

        } catch (Exception $e) {
            echo "Zpráva nebyla odeslána: {$mail->ErrorInfo}";
        }
        
    }


?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css">
    <title>Kontakt</title>
</head>
<body>

    <?php require "assets/header.php" ?>

    <main id="helpDesk-main">
        <section id="helpDesk-form">
            <form action="" method="POST">
                <input 
                    type="text" 
                    name="first_name" 
                    placeholder="Křestní jméno" 
                    value="<?=htmlspecialchars($first_name)?>"
                    autofocus
                    required><br/>
                <input 
                type="text" 
                    name="second_name" 
                    placeholder="Příjmení" 
                    value="<?=htmlspecialchars($second_name)?>"
                    required><br/>
                <input 
                    type="text" 
                    name="email" 
                    placeholder="E-mail" 
                    value="<?=htmlspecialchars($email)?>"
                    required><br/>
                <textarea name="message" rows=5 required placeholder="Napište nám"><?=htmlspecialchars($message)?></textarea><br/>
                <input type="submit" value="Odeslat dotaz">
            </form>
        </section>
    </main>

    <?php require "assets/footer.php" ?> 
    <script src="js/script.js"></script>
</body>
</html>