
<?php

/*
Jonas Elmesten
Webbprogrammering 7,5hp - Projekt
Datateknik HT18
*/

//Make sure the user is logged in - else fo to login-page
if(!$_SESSION["loggedin"] === true || !isset($_SESSION["loggedin"])){
   header("location: login.php");
}

?>