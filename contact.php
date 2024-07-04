<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bean & Brain Cafe</title>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/contact.css">
</head>
<body>

<?php
require_once("includes/db_connect.php");
include_once("template/nav.php");

if(isset($_POST["send_message"])){
    $fullname = mysqli_real_escape_string($conn, $_POST["fullname"]);
    $mail = mysqli_real_escape_string($conn, $_POST["email_address"]);
    $subject = mysqli_real_escape_string($conn, $_POST["subject_line"]);
    $message = mysqli_real_escape_string($conn, $_POST["message"]);

$insert_message = "INSERT INTO messages
(sender_name, sender_email, subject_line, text_message)
VALUES ('$fullname' ,'$mail', '$subject', '$message')";

if ($conn->query( $insert_message) === TRUE) {
   header("Location:view_messages.php");
   exit();
} else {
echo "Error: " . $insert_message . "<br>" . $conn->error;
}
}
?>

<section id="contact">
    
    <h1>Talk to us.</h1>
    
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
            <option value="Other">Other</option>
        </select><br>

        <label for="message">Message:</label>
        <textarea id="message" name="message" required></textarea><br>

        <button type="submit" name="send_message">Send Message</button>
    </form>
</section>

</body>
<?php include_once("template/footer.php"); ?>
</html>
