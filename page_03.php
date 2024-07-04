<?php 

session_start();

if(isset ($_SESSION ["fname"])){
    print 'Yes, the session is alive';
    print '<br><a href= "page_03.php">Destroy the session</a>';
}else{
    print 'No, the session was destroyed';
    print '<br><a hreh="page_01.php">Create a new session</a>';
}

?>