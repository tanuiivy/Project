<?php
session_start();

if (isset($_SESSION["fname"])) {
    echo 'Hey ' . $_SESSION["fname"];

    echo '<br><a href="page_03.php">Go to page 03</a>';
} else {
    header("Location: page_01.php");
    exit();
}
?>
