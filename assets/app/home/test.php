<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once '../../vendor/autoload.php';

$mail = new PHPMailer(true);

//Configure an SMTP
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'jdfm1991@gmail.com';
$mail->Password = 'njmuuabiohafxdib';
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
$mail->Post = 587;

// Sender information
$mail->from='jdfm1991@gmail.com';

// Multiple recipient email addresses and names
// Primary recipients

$mail->addAddress('jovannifranco@gmail.com'); 
 

$mail->isHTML(true);

$mail->Subject = 'PHPMailer SMTP test';

$mail->Body    = "PHPMailer the awesome Package\nPHPMailer is working fine for sending mail\nThis is a tutorial to guide you on PHPMailer integration";

// Attempt to send the email
if (!$mail->send()) {
    echo 'Email not sent. An error was encountered: ';
} else {
    echo 'Message has been sent.';
}

$mail->smtpClose();
