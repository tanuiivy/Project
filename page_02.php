<?php 

session_start();
if(isset ($_SESSION ["fname"])){
    print 'Hey '.$_SESSION["fname"];

    print'<br>
     <a href= "page_03.php">Go to page 03</a>'; 
}else{
    header("Location:page_03.php");
    exit();
}

?>
