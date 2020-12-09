
<?php

/*
Jonas Elmesten
Webbprogrammering 7,5hp - Projekt
Datateknik HT18
*/


//Handle sending e-mails
if(isset($_POST)) {

    $mail = "joel1803@student.miun.se";
    $subject = "Cajolen - Mail from " . $_POST["username"];
    $message = $_POST["text"];
    $email = $_POST["email"];

    $headers = "From:" . $email;

    if(mail($mail, $subject, $message, $headers))
        echo "SENT";
    else
        echo "MAIL_ERROR";
}

?>