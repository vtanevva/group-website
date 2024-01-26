<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    // Create a new PHPMailer instance
    $mail = new PHPMailer(true);

    try {
        // Set up SMTP
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'ivanova.deq06@gmail.com'; // Replace with your Gmail email address
        $mail->Password = 'vmib ovzf mtug hldo'; // Replace with your Gmail password
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        // Set up email content
        $mail->setFrom($email);
        $mail->addAddress('viral.creatives1@gmail.com'); // Replace with your email address
        $mail->Subject = "Feedback from $name";
        $mail->Body = $message;

        // Send the email
        $mail->send();
        echo "Thank you for your feedback! We will get back to you soon.";
    } catch (Exception $e) {
        echo "Error sending the email: {$mail->ErrorInfo}";
    }
} else {
    // Handle invalid request method
    echo "Invalid request method.";
}
?>
