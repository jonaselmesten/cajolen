
<?php 

/*
Jonas Elmesten
Webbprogrammering 7,5hp - Projekt
Datateknik HT18
*/

session_start();

require("check_if_logged_in.php"); 
require("config_db.php");

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

?>

<?php

//The code below adds a new post to one of the forums
if(isset($_POST)) {

    //Gather all relevant information for a post
    $userId = $_SESSION["id"];
    $forumId = $_POST["forum-id"];
    $title = $_POST["post-title"];
    $text = $_POST["post-text"];
    $date = date("Y-m-d H:i:s");


    /*We will add a new post and the first entry at the same time - 
    so it will be done in a transaction

    First the post itself, then it's first entry
    */

    $connection = mysqli_connect(SERVER_DB, USERNAME_DB, PW_DB, NAME_DB);

    if (!mysqli_connect_errno()) {

        $success = TRUE;

        mysqli_autocommit($connection, FALSE);

        //Part one of transaction
        $stmt = mysqli_prepare($connection, $addNewPostSQL);
        mysqli_stmt_bind_param($stmt, 'iis', $forumId, $userId, $title);

        if(!mysqli_stmt_execute($stmt)) {
            $success = FALSE;
            echo mysqli_error($connection);
            echo "FEL 1 <br>";
        }
            

        //Post was added successfully
        //End of part one
        mysqli_stmt_close($stmt);


        //Part two of transaction
        $stmt = mysqli_prepare($connection, $addNewEntrySQL);
        $postId = mysqli_insert_id($connection);

        echo "postID:" . $postId . "<br>";

        mysqli_stmt_bind_param($stmt, 'iiiss', $forumId, $userId, $postId, $text, $date);

        if(!mysqli_stmt_execute($stmt)) {
            echo mysqli_error($connection);
            echo "FEL 2 <br>";
            $success = FALSE;
        }
        
        //Post was added successfully
        //End of part two
        mysqli_stmt_close($stmt);

        //Commit the changes if everything was successful
        //Else rollback
        if($success) {
            
            echo "SUCCESS";
            mysqli_commit($connection);
            header( "Location: ../forums.php?forum=" . $forumId);
            exit();
        }else {
            echo "ERROR";
            mysqli_rollback($connection);
        }

    }
    
mysqli_close($connection);
}
?>