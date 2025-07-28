<?php
// contact-process.php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize input
    $name = strip_tags(trim($_POST["name"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $message = strip_tags(trim($_POST["message"]));

    // Check required fields
    if (empty($name) || empty($message) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<h2>Invalid input. Please go back and try again.</h2>";
        exit;
    }

    // Email setup
    $to = "youremail@example.com"; // Change to your email
    $subject = "New Contact Message from $name";
    $email_content = "Name: $name\n";
    $email_content .= "Email: $email\n\n";
    $email_content .= "Message:\n$message\n";

    $headers = "From: $name <$email>";

    // Send the email
    if (mail($to, $subject, $email_content, $headers)) {
        echo "<h2>Thank you! Your message has been sent successfully.</h2>";
    } else {
        echo "<h2>Oops! Something went wrong and we couldn't send your message.</h2>";
    }
} else {
    // Direct access – block it
    echo "<h2>Access Denied!</h2>";
}
?>
