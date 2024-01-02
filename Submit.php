<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = $_POST["email"];
    $phone = $_POST["phone"];

    $uploadDir = "uploads/";
    $uploadFile = $uploadDir . basename($_FILES["resume"]["name"]);

    if (move_uploaded_file($_FILES["resume"]["tmp_name"], $uploadFile)) {
        $to = "damien.richerr@gmail.com";
        $subject = "Form Submission";

        $message = "Email: $email\n";
        $message .= "Phone Number: $phone\n";
        $message .= "Resume file: $uploadFile\n";

        $headers = "From: $email";

        if (mail($to, $subject, $message, $headers)) {
            // Email sent successfully
            header("Location: success.html");
            exit;
        } else {
            // Email sending failed
            echo "Error sending email.";
        }
    }
}
