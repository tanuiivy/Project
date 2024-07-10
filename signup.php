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
    
    // Add your verification code here...

    if(!isset($_SESSION["error"])){
        $insert_user = "INSERT INTO users (fullname, email_address, username, passphrase, genderID) VALUES ('$fullname', '$mail', '$username', '$pass', '$gen')";

        if ($conn->query($insert_user) === TRUE) {
            header("Location: view_messages.php");
            exit();
        } else {
            echo "Error: " . $insert_user . "<br>" . $conn->error;
        }
    }
}
?>

<section id="contact">
    <h1>Sign Up.</h1>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="contacts_form">
        <label for="fn">Fullname:</label>
        <input type="text" id="fn" placeholder="Fullname" name="fullname" maxlength="50" required autofocus><br>

        <label for="em">Email Address:</label>
        <input type="email" id="em" placeholder="Email Address" name="email_address" maxlength="50" required><br>
        <?php if(isset($_SESSION["wrong_email_format"])) { echo '<span class="error_form">'.$_SESSION["wrong_email_format"].'</span>'; unset($_SESSION["wrong_email_format"]); } ?>

        <label for="un">Username:</label>
        <input type="text" id="un" placeholder="Username" name="username" maxlength="50" required><br>

        <label for="pass">Password:</label>
        <input type="password" id="pass" placeholder="Password" name="passphrase" required><br>

        <label for="gen">Gender:</label>
        <select name="genderID" id="gen" required>
            <option value="">--Select Gender--</option>
            <?php
                $sel_gen = "SELECT * FROM gender ORDER BY gender ASC";
                $sel_gen_res = $conn->query($sel_gen);
                while($sel_gen_row = $sel_gen_res->fetch_assoc()){
            ?>
                <option value="<?php echo $sel_gen_row["genderID"]; ?>"><?php echo $sel_gen_row["gender"]; ?></option>
            <?php
                }
            ?>
        </select>
        <button type="submit" name="signup">Sign Up</button>
    </form>
</section>

</body>
<?php include_once("template/footer.php"); ?>
</html>


