<?php

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

require 'config.php';

function sendMail($email, $name, $mesage) {


$mail = new PHPMailer(true);

$mail->isSMTP();

$mail->SMTPAuth = true;

$mail->Host = MAILHOST;

$mail->Username = USERNAME;

$MAIL->Password = PASSWORD;
$mail->SmtpSecure = PHPMailer::ENCRYPTION_STARTTLS;

$mail->Port =587;

$mail->setFrom(SEND_FROM, SEND_FROM_NAME);

$mail->addAddress($email);

$mail->addReplyTo(ADD_REPLY, REPLY-TO-NAME);

$mail->IsHTML(true);

$mail->Body = $message;
$mail->AltBody = $message;

if(!$mail->send()){
    return "Email not send. Please try again";
}else {
    return "success";
}


}
