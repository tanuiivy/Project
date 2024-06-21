<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bean & Brain Cafe</title>
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="contact.css">
</head>
<body>

<?php
require_once("includes/db_connect.php");
include_once("template/nav.php");

if(isset($_POST["send_message"])){
    $fullname = $_POST["fullname"];
    $mail = $_POST["email_address"];
    $subject = $_POST["subject_line"];
    $message = $_POST["message"];

$insert_message = "INSERT INTO messages
(sender_name, sender_email, subject_line, text_message)
VALUES ('$fullname' ,'$mail', '$subject', '$message')";

if ($conn->query( $insert_message) === TRUE) {
echo "New record created successfully";
} else {
echo "Error: " . $insert_message . "<br>" . $conn->error;
}
}
?>

<section id="contact">
    <h2>CONTACT US</h2>
    <p>We'd love to hear from you! Please reach us through the following contact details.</p>
    <div class="contact-details">
        <p><strong>Address:</strong> 123 Cafe Street, Coffee Town, CT 12345</p>
        <p><strong>Phone:</strong> (254) 722-897462</p>
        <p><strong>Email:</strong> contact@bnbcafe.com</p>
    </div><br>
    <p>You can also contact us by filling in the form below.</p>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="fullname">Full Name:</label>
        <input type="text" id="fullname" name="fullname" required><br>

        <label for="email_address">Email:</label>
        <input type="email" id="email_address" name="email_address" required><br>

        <label for="subject_line">Subject:</label>
        <select name="subject_line" id="sl" required>
            <option value="">Select Subject</option>
            <option value="Price Inquiries">Price Inquiries</option>
            <option value="Feedback">Feedback</option>
        </select><br>

        <label for="message">Message:</label>
        <textarea id="message" name="message" required></textarea><br>

        <button type="submit" name="send_message">Send Message</button>
    </form>
</section>

</body>
</html>
