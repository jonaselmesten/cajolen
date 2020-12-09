
<?php

/*
Jonas Elmesten
Webbprogrammering 7,5hp - Projekt
Datateknik HT18

This file shows all the entries when the user entred a post

*/

session_start();

require("includes/check_if_logged_in.php"); 
require_once("includes/config_db.php");


error_reporting(-1);
ini_set("display_errors", 1);

spl_autoload_register(function ($class) {
    include "classes/" . $class . ".php";
});

$forumId = (int) $_GET["forum"];
$postId = (int) $_GET["post"];
$postTitle ="";

$connection = mysqli_connect(SERVER_DB, USERNAME_DB, PW_DB, NAME_DB);

//Get the title of the post
if(!mysqli_connect_errno()) {

    $stmt = mysqli_prepare($connection, $getPostTitleSQL);

    mysqli_stmt_bind_param($stmt, "ii", $forumId, $postId);
    mysqli_stmt_execute($stmt);

    $postTitle = mysqli_fetch_row($stmt->get_result())[0];
    mysqli_stmt_close($stmt);
}

mysqli_close($connection);

?>

<?php include("sections/header.php"); ?>

<script>
    $("#header-mode").addClass("full");
</script>

<div class="forum-post">

    <h1><?php echo $postTitle?></h1>

    <ul class="forum-list">

        <?php

        $entryHolder = new EntryHolder($forumId, $postId);

        $connection = mysqli_connect(SERVER_DB, USERNAME_DB, PW_DB, NAME_DB);

        //Get all the entries for the post
        if(!mysqli_connect_errno()) {

            $stmt = mysqli_prepare($connection, $getAllEntriesSQL);
            mysqli_stmt_bind_param($stmt ,"ii" , $forumId, $postId);
            mysqli_stmt_execute($stmt);

            mysqli_stmt_bind_result($stmt ,$userName , $entryText, $date);

            //Add to holder
            while(mysqli_stmt_fetch($stmt)) {
                $entryHolder->addPost(new Entry($userName, $entryText, $date));
            }

            mysqli_stmt_close($stmt);
        }

        mysqli_close($connection);

        //Print all the entries as HTML-code to the page
        foreach ($entryHolder->getAllEntries() as $entry) {

            echo
            "<li>
                <div class='entry-container'>

                    <div class='entry-title'>
                        <p><b>Written by:</b> " . $entry->getUserName() . "<b> Date: </b>" . $entry->getDate() . "</p>
                    </div>

                    <div class='entry-content'>
                        <p>" . nl2br($entry->getEntryText()) ." </p>
                    </div>
                    
                </div>
            </li>";
        }
        ?>

    </ul>

    <!--Window to write another entry to the post-->
    <div class="entry-writer">

        <form action="includes/add_entry.php" method="POST">

            <input type="hidden" name="forum-id" value=<?php echo $forumId?>>
            <input type="hidden" name="post-id" value=<?php echo $postId?>>
            <textarea name="entry-text" wrap="hard" maxlength="5000" required></textarea><br>
            <input class="entry-button" type="submit" value="Post">

        </form>

    </div>

</div>

<?php include("sections/footer.html") ?>