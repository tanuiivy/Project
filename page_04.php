<?php
session_start();

if (isset($_SESSION["fname"])) {
    unset($_SESSION["fname"]);
    session_destroy(); 

    header("Location: page_03.php");
    exit();
}
?>
