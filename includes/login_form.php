

<?php 

/*
Jonas Elmesten
Webbprogrammering 7,5hp - Projekt
Datateknik HT18
*/

require_once("config_db.php"); 

?>

<?php

//Handle log-in attempts
if(isset($_POST)) {

        $connection = mysqli_connect(SERVER_DB, USERNAME_DB, PW_DB, NAME_DB);

        //Handle all the diffrent results of the attempt
        if($stmt = mysqli_prepare($connection, $attemptLoginSQL)) {

            mysqli_stmt_bind_param($stmt ,"s" , $_POST["username"]);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);

            if(mysqli_stmt_num_rows($stmt) == 1) {

                mysqli_stmt_bind_result($stmt, $userId, $userName, $eMail, $hashed_password);
                mysqli_stmt_fetch($stmt);

                if(password_verify($_POST["password"], $hashed_password)) {

                    session_start();
                    
                    echo "LOGGED_IN";
                       
                    $_SESSION["loggedin"] = true;
                    $_SESSION["id"] = $userId;
                    $_SESSION["username"] = $userName;    
                    $_SESSION["email"] = $eMail;                       
                            
                }else {
                    echo "INVALID_PW";
                }
            }else {
                echo "NO_USER";
            }
            mysqli_stmt_close($stmt);
        }else {
            echo "ERROR";
        }
mysqli_close($connection);
}

?>