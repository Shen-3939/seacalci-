<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and retrieve form data
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);

    // Email configuration
    $to = "seacalci.asixa@gmail.com"; // Change to your email
    $from = "no-reply@asixamarine.com"; // Must be from your domain

    $headers = "From: $from\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

    // Custom subject line
    $finalSubject = "Asixa Marine Contact Form- " . $subject;

    // Email body
    $emailBody = "
    <html>
    <head><title>Contact Form Submission</title></head>
    <body>
        <h2>Asixa Marine Contact Form Submission</h2>
        <p><strong>Name:</strong> $name</p>
        <p><strong>Email:</strong> $email</p>
        <p><strong>Phone:</strong> $phone</p>
        <p><strong>Subject:</strong> $subject</p>
        <p><strong>Message:</strong><br>$message</p>
    </body>
    </html>";

    // Send the email and show alert
    if (mail($to, $finalSubject, $emailBody, $headers)) {
        echo "<script>
            alert('Message sent successfully!');
            window.location.href='index.html';
        </script>";
        exit();
    } else {
        echo "<script>
            alert('Failed to send the message. Please try again.');
            window.location.href='index.html';
        </script>";
        exit();
    }
}
?>
