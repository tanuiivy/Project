<?php
session_start();

if (isset($_SESSION["fname"])) {
    echo 'Yes, the session is alive';
    echo '<br><a href="page_04.php">Destroy the session</a>';
} else {
    echo 'No, the session was destroyed';
    echo '<br><a href="page_01.php">Create a new session</a>';
}
?>
