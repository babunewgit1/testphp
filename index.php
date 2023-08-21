<!DOCTYPE html>
<html>
<head>
    <title>Contact Us</title>
</head>
<body>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $recipient = "babuhp80@gmail.com"; // Change this to your recipient's email address
        $subject = "Contact Us";

        $name = $_POST["name"];
        $email = $_POST["email"];
        $message = $_POST["message"];

        // Sanitize the inputs
        $name = htmlspecialchars($name, ENT_QUOTES, 'UTF-8');
        $email = htmlspecialchars($email, ENT_QUOTES, 'UTF-8');
        $message = htmlspecialchars($message, ENT_QUOTES, 'UTF-8');

        // Create email headers
        $headers = "From: $email" . "\r\n" .
                   "Reply-To: $email" . "\r\n" .
                   "X-Mailer: PHP/" . phpversion();

        // Construct the email body
        $email_body = "Name: $name\n\nEmail: $email\n\nMessage:\n$message";

        // Send the email
        if (mail($recipient, $subject, $email_body, $headers)) {
            echo "<p>Email sent successfully!</p>";
        } else {
            echo "<p>Email could not be sent.</p>";
        }
    }
    ?>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br>

        <label for="message">Message:</label>
        <textarea id="message" name="message" rows="5" cols="40" required></textarea><br>

        <button type="submit">Submit</button>
    </form>
</body>
</html>
