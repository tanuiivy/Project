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

if (isset($_GET["messageID"])) {
    $messageID = $_GET["messageID"];
    $spot_msg = "SELECT * FROM messages WHERE messageID = $messageID LIMIT 1";
    $spot_msg_res = $conn->query($spot_msg);

    if ($spot_msg_res && $spot_msg_res->num_rows > 0) {
        $spot_msg_row = $spot_msg_res->fetch_assoc();
    } else {
        echo "Message not found.";
        exit();
    }
} else {
    echo "No message ID provided.";
    exit();
}

if (isset($_POST["update_message"])) {
    $fullname = mysqli_real_escape_string($conn, $_POST["fullname"]);
    $mail = mysqli_real_escape_string($conn, $_POST["email_address"]);
    $subject = mysqli_real_escape_string($conn, $_POST["subject_line"]);
    $message = mysqli_real_escape_string($conn, $_POST["text_message"]);
    $messageID = mysqli_real_escape_string($conn, $_POST["messageID"]);

    $update_message = "UPDATE messages SET 
    sender_name='$fullname', sender_email='$mail', subject_line='$subject', text_message='$message' 
    WHERE messageID=$messageID LIMIT 1";

    if ($conn->query($update_message) === TRUE) {
        header("Location: view_messages.php");
        exit();
    } else {
        echo "Error: " . $update_message . "<br>" . $conn->error;
    }
}
?>

<section id="contact">
    <h1>Update Message.</h1>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . "?messageID=" . $messageID; ?>" method="post">
        <label for="fullname">Full Name:</label>
        <input type="text" id="fullname" name="fullname" required value="<?php echo htmlspecialchars($spot_msg_row["sender_name"]); ?>"><br>

        <label for="email_address">Email:</label>
        <input type="email" id="email_address" name="email_address" required value="<?php echo htmlspecialchars($spot_msg_row["sender_email"]); ?>"><br>

        <label for="subject_line">Subject:</label>
        <select name="subject_line" id="sl" required>
            <option value="">Select Subject</option>
            <option value="Price Inquiries" <?php if ($spot_msg_row["subject_line"] == "Price Inquiries") echo "selected"; ?>>Price Inquiries</option>
            <option value="Feedback" <?php if ($spot_msg_row["subject_line"] == "Feedback") echo "selected"; ?>>Feedback</option>
            <option value="Other" <?php if ($spot_msg_row["subject_line"] == "Other") echo "selected"; ?>>Other</option>
        </select><br>

        <label for="message">Message:</label>
        <textarea id="message" name="text_message" required><?php echo htmlspecialchars($spot_msg_row["text_message"]); ?></textarea><br>

        <button type="submit" name="update_message">Update Message</button>
        <input type="hidden" name="messageID" value="<?php echo htmlspecialchars($spot_msg_row["messageID"]); ?>">
    </form>
</section>

</body>
<?php include_once("template/footer.php"); ?>
</html>
