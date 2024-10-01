<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader or manually include the files
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check which form was submitted
    if (isset($_POST['form_type']) && $_POST['form_type'] === 'comment') {
        // Comment form submission
        $name = isset($_POST['name']) ? htmlspecialchars(trim($_POST['name'])) : '';
        $comment = isset($_POST['comment']) ? htmlspecialchars(trim($_POST['comment'])) : '';

        if (empty($name) || empty($comment)) {
            echo "Please fill in both your name and comment.";
            exit;
        }

        $toEmail = 'karlheydenrych83@gmail.com'; // Your email address

        // Create a new PHPMailer instance
        $mail = new PHPMailer(true);
        try {
            // Server settings
            $mail->isSMTP(); // Set mailer to use SMTP
            $mail->Host = 'smtp.gmail.com'; // Specify main and backup SMTP servers
            $mail->SMTPAuth = true; // Enable SMTP authentication
            $mail->Username = 'karlheydenrych83@gmail.com'; // Your Gmail address
            $mail->Password = 'your_app_password'; // Use an App Password instead of your Gmail password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Enable TLS encryption
            $mail->Port = 587; // TCP port to connect to

            // Recipients
            $mail->setFrom('karlheydenrych83@gmail.com', 'Karl'); // Your email and name
            $mail->addAddress($toEmail); // Add a recipient (your email)

            // Content
            $mail->isHTML(true); // Set email format to HTML
            $mail->Subject = 'New Comment from ' . $name;
            $mail->Body    = "Name: $name<br>Comment: $comment";
            $mail->AltBody = "Name: $name\nComment: $comment"; // Plain text for non-HTML email clients

            // Send the email
            $mail->send();
            echo "<h2>Thank you for your comment, $name!</h2>";
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    } else {
        // Contact form submission
        $name = isset($_POST['name']) ? htmlspecialchars(trim($_POST['name'])) : '';
        $email = isset($_POST['email']) ? htmlspecialchars(trim($_POST['email'])) : '';
        $message = isset($_POST['message']) ? htmlspecialchars(trim($_POST['message'])) : '';

        if (empty($name) || empty($email) || empty($message)) {
            echo "Please fill in all required fields.";
            exit;
        }

        $toEmail = 'karlheydenrych83@gmail.com'; // Your email address

        // Create a new PHPMailer instance
        $mail = new PHPMailer(true);
        try {
            // Server settings
            $mail->isSMTP(); // Set mailer to use SMTP
            $mail->Host = 'smtp.gmail.com'; // Specify main and backup SMTP servers
            $mail->SMTPAuth = true; // Enable SMTP authentication
            $mail->Username = 'karlheydenrych83@gmail.com'; // Your Gmail address
            $mail->Password = 'wpzbrjxjbespmbuv'; // Use an App Password instead of your Gmail password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Enable TLS encryption
            $mail->Port = 587; // TCP port to connect to

            // Recipients
            $mail->setFrom('karlheydenrych83@gmail.com', 'Karl'); // Your email and name
            $mail->addAddress($toEmail); // Add a recipient (your email)

            // Content
            $mail->isHTML(true); // Set email format to HTML
            $mail->Subject = 'New Message from ' . $name;
            $mail->Body    = "Name: $name<br>Email: $email<br>Message: $message";
            $mail->AltBody = "Name: $name\nEmail: $email\nMessage: $message"; // Plain text for non-HTML email clients

            // Send the email
            $mail->send();
            echo "<h2>Thank you for your message, $name!</h2>";
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
}
?>

