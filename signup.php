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

if(isset($_POST["signup"])){
    $fullname = mysqli_real_escape_string($conn, $_POST["fullname"]);
    $mail = mysqli_real_escape_string($conn, $_POST["email_address"]);
    $username = mysqli_real_escape_string($conn, $_POST["username"]);
    $pass = mysqli_real_escape_string($conn, $_POST["passphrase"]);
    $gen = mysqli_real_escape_string($conn, $_POST["genderID"]);
    
    // verify that the fullname contains only letters, space, and a single quotion

// verify that the email has the correct format

if(!filter_var($mail, FILTER_VALIDATE_EMAIL)){
    $_SESSION["wrong_email_format"] = "wrong email format";
    $_SESSION["error"] = "";
}

// verify that the email domain is authorized (strathmore.edu, gmail.com, yahoo.com, etc)

// verify that the email address does not exist already in the database

// verify that the username does not exist already in the database

// verify that the password is identical to the repeat password

// verify that the password length is between 4 and 8 characters



if(!isset($_SESSION["error"])){
    $insert_message = "INSERT INTO messages (sender_name, sender_email, subject_line, text_message) VALUES
     ('$fullname' ,'$mail', '$subject', '$message')";

    if ($conn->query($insert_message) === TRUE) {
        header("Location: view_messages.php");
        exit();
    } else {
        echo "Error: " . $insert_message . "<br>" . $conn->error;
    }
}
}
?>

<section id="contact">
    
    <h1>Sign Up.</h1>
    
    <form action="<?php print htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="contacts_form">
        <label for="fn">Fullname:</label>
        <input type="text" id="fn" placeholder="Fullname" name="fullname" maxlength="50" required autofocus><br>

        <label for="em">Email Address:</label>
        <input type="email" id="em" placeholder="Email Address" name="email_address" maxlength="50" required><br>
            <?php if(isset($_SESSION["wrong_email_format"])) 
            { print '<span class="error_form">'.$_SESSION["wrong_email_format"].'</span>'; unset($_SESSION["wrong_email_format"]); } ?>

        <label for="un">Username:</label>
        <input type="text" id="un" placeholder="Username" name="username" maxlength="50" required><br>

        <label for="pass">Password:</label>
        <input type="password" id="pass" placeholder="Password" name="passphrase" required><br>

        <label for="gen">Gender:</label>
        <select name="genderID" id="gen" required>
            <option value="">--Select Gender--</option>

            <?php
                $sel_gen = "SELECT * FROM genders ORDER BY gender ASC";
                $sel_gen_res = $conn->query($sel_gen);
                while($sel_gen_row = $sel_gen_res->fetch_assoc()){
            ?>
                <option value="<?php print $sel_gen_row["genderID"]; ?>"><?php print $sel_gen_row["gender"]; ?></option>
            <?php
            }
            ?>
        </select>
        <button type="submit" name="send_message">Send Message</button>
    </form>
</section>

</body>
<?php include_once("template/footer.php"); ?>
</html>

