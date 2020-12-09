
<?php 

/*
Jonas Elmesten
Webbprogrammering 7,5hp - Projekt
Datateknik HT18
*/

require("config_db.php"); 

?>

<?php

//The code below handles the registration of new users
if(!empty($_POST)) {

    $connection = mysqli_connect(SERVER_DB, USERNAME_DB, PW_DB, NAME_DB);

    if(!mysqli_connect_errno()) {

        $usernameValid = false;
        $emailValid = false;

        //See if username is occupied
        if($stmt = mysqli_prepare($connection, $checkUsernameSQL)) {

            $username_p = trim($_POST["username"]);
            mysqli_stmt_bind_param($stmt,"s" , $username_p);
            mysqli_stmt_execute($stmt);

            mysqli_stmt_store_result($stmt);

            if(mysqli_stmt_num_rows($stmt) > 0) {
                $usernameValid = false;
            }else {
                $usernameValid = true;
            }

            mysqli_stmt_free_result($stmt);
            mysqli_stmt_close($stmt);
        }


        //See if mail is occupied
        if($stmt = $connection->prepare($checkEmailSQL)) {

            $email_p = trim($_POST["email"]);
            mysqli_stmt_bind_param($stmt,"s" , $email_p);
            mysqli_stmt_execute($stmt);

            mysqli_stmt_store_result($stmt);

            if(mysqli_stmt_num_rows($stmt) > 0) {
                $emailValid = false;
            }else {
                $emailValid = true;
            }
            
            mysqli_stmt_free_result($stmt);
            mysqli_stmt_close($stmt);
        }

        //Both email and username was free - add user to database
        if($usernameValid && $emailValid) {

            if($stmt = mysqli_prepare($connection, $registerUserSQL)) {

                $firstname_p = trim($_POST["firstname"]);
                $password_p = trim($_POST["password"]);

                //Hash the password so it's not stored as it is
                $password_hash = password_hash($password_p, PASSWORD_DEFAULT);
                    
                mysqli_stmt_bind_param($stmt, "ssss", $username_p, $firstname_p, $email_p, $password_hash);
                mysqli_stmt_execute($stmt);
                
                mysqli_stmt_close($stmt);

                echo "SUCCESS";
            }else {
                echo "ERROR";
            }

        }else {

            if(!$usernameValid && !$emailValid) {
                echo "INVALID_USERNAME_EMAIL";
            }else if(!$usernameValid) {
                echo "INVALID_USERNAME";
            }else if(!$emailValid) {
                echo "INVALID_EMAIL";
            }
        }
    }
}
mysqli_close($connection);
?>

