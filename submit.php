<?php

// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     error_log('Received a POST request');
//     $name = $_POST["name"];
//     $email = $_POST["email"];
//     $message = $_POST["message"];

//     $to = "vanesa.taneva@gmail.com"; 
//     $subject = "New Form Submission";
//     $headers = "From: $email";

//     mail($to, $subject, $message, $headers);
//     echo "Thank you for your submission!";
// }
// $name = $_POST["name"];
// $email = $_POST["email"];
// $message = $_POST["message"];

// require "vendor/autoload.php";

// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\SMTP;

// $mail = new PHPMailer(true);

// $mail->isSMTP();
// $mail->SMTPAuth = true;

// $mail->Host = "smtp.example.com";
// $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
// $mail->Port = 587;

// $mail->Username = "ivanova.deq06@gmail.com";
// $mail->Password = "Vanesa1108";

// $mail->setFrom($email, $name);
// $mail->addAddress("ivanova.deq06@gmail.com", "Vanesa");

// $mail->isHTML(true);
// $mail->Body = $message;

// $mail->send();

// echo "email sent"; -->


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    $to = "ivanova.deq06@gmail.com"; // Replace with your email address
    $subject = "Feedback from $name";
    $headers = "From: $email";

    // Send email
    $mailSuccess = mail($to, $subject, $message, $headers);

    if ($mailSuccess) {
        echo "Thank you for your feedback! We will get back to you soon.";
    } else {
        echo "Error sending the email. Please try again later.";
    }
} else {
    // Handle invalid request method
    echo "Invalid request method.";
}


?>
