<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../assets/vendor/src/Exception.php';
require '../assets/vendor/src/PHPMailer.php';
require '../assets/vendor/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $mail = new PHPMailer(true);

    try {

        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'caddyai55@gmail.com';
        $mail->Password   = 'tajhxldgfnfomlqd';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        // Sender is your business email
        $mail->setFrom('caddyai55@gmail.com', 'Cape Town Shuttle Services');

        // Email goes to you
        $mail->addAddress('caddyai55@gmail.com');

        // Customer email for replies
        $mail->addReplyTo($_POST['email'], $_POST['name']);

        $mail->Subject = 'New Booking Enquiry';

        $mail->Body =
            "Name: " . $_POST['name'] . "\n" .
            "Email: " . $_POST['email'] . "\n" .
            "Subject: " . $_POST['subject'] . "\n\n" .
            "Message:\n" . $_POST['message'];

        $mail->send();

        echo "OK";

    } catch (Exception $e) {
        echo "Mailer Error: " . $mail->ErrorInfo;
    }
}
?>