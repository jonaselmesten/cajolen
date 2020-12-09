
<?php

/*
Jonas Elmesten
Webbprogrammering 7,5hp - Projekt
Datateknik HT18
*/

//Destroy the session and go to index-page
Session_start();
Session_destroy();
header( "Location: ../index.php");

?>