
<?php

/*
Jonas Elmesten
Webbprogrammering 7,5hp - Projekt
Datateknik HT18
*/

session_start();

require("check_if_logged_in.php"); 
require("config_db.php");

?>

<?php

//Handles adding an entry to a post
if(isset($_POST)) {

    //Gather all the relevant information for an entry
    $forumId = $_POST["forum-id"];
    $postId = $_POST["post-id"];
    $userId = $_SESSION["id"];
    $text = $_POST["entry-text"];
    $date = date("Y-m-d H:i:s");

    $connection = mysqli_connect(SERVER_DB, USERNAME_DB, PW_DB, NAME_DB);

    if(!mysqli_connect_errno()) {
        
        $stmt = mysqli_prepare($connection, $addNewEntrySQL);
        mysqli_stmt_bind_param($stmt, "iiiss", $forumId, $userId, $postId, $text, $date);


        //Execute the query and go back to the same page again
        if(mysqli_stmt_execute($stmt)) {
            
            header( "Location: ../view_post.php?forum=" . $forumId . "&post=" . $postId);
            exit();

        }else {
            echo "ERROR";
        }

        mysqli_stmt_close($stmt);
    }
    
    mysqli_close($connection);
}

?>