<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if (
    isset($_POST['name']) &&
    isset($_POST['email']) &&
    isset($_POST['subject']) &&
    isset($_POST['message'])
) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $em = "Invalid email format";
        header("Location: index.php?error=$em");
        exit;
    }

    if (empty($name) || empty($subject) || empty($message)) {
        $em = "Fill out all required entry fields";
        header("Location: index.php?error=$em");
        exit;
    }

    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'mailertestacc89@gmail.com';
        $mail->Password = 'clqkwyyibsftfhan';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;


        $mail->setFrom($email, $name);
        $mail->addAddress('mailertestacc89@gmail.com', "Test Account");
        $mail->addReplyTo($email, $name);

        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = $message;

        $mail->send();
        $sm = 'Message has been sent';
        header("Location: index.php?success=$sm");
        exit;
    } catch (Exception $e) {
        $em = "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        header("Location: index.php?error=$em");
        exit;
    }
} else {
    $em = "Something went wrong!";
    header("Location: index.php?error=$em");
    exit;
}

?>