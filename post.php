

<?php 

/*
Jonas Elmesten
Webbprogrammering 7,5hp - Projekt
Datateknik HT18

This file is used when the user want to add a new post to a forum

*/

session_start();

include("sections/header.php");

require("includes/check_if_logged_in.php"); 
require_once("includes/config_db.php");

$forumId = (int) $_GET["forum"];

?>

<script>
    $("#header-mode").addClass("full");
</script>

<div class="container">
    <div class="container-box">

        <div class="container-info">

            <h1>Create a new<span>Post</span></h1>
            <p class="text-area-medium">Put a good title on your post to get better answers.</p>

        </div>

    </div>
</div>

<div class="container" id="new-post-box">
    
    <div class="container-box">

        <form action="includes/add_post.php" method="POST">
        
            <input type="hidden" name="forum-id" value="<?php echo $_GET["forum"]; ?>">
            <input class="title full-width" type="text" name="post-title" placeholder="Add a title" required>
            <textarea class="full-width text-box" name="post-text" wrap="hard" maxlength="5000" required></textarea>
            <input class="standard-button" id="who-button" type="submit" value="Post">

        </form>
    </div>

</div>


<?php include("sections/footer.html") ?>