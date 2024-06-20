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
    <?php include_once("template/nav.php"); ?>
    
    <section id="contact">
    <h2>CONTACT US</h2>
        <p>We'd love to hear from you! Please reach us through the following contact details.</p>
        <div class="contact-details">
        <p><strong>Address:</strong> 123 Cafe Street, Coffee Town, CT 12345</p>
        <p><strong>Phone:</strong> (254) 722-897462</p>
        <p><strong>Email:</strong> contact@bnbcafe.com</p>
    </div><br>
    <p>You can also contact us by filling in the form below.</p>
    <form action="" method="post">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br>

        <label for="message">Message:</label>
        <textarea id="message" name="message" required></textarea><br>

        <button type="submit">Send Message</button>
    </form>
</section>
<?php include_once("template/footer.php"); ?>
</body>
</html>