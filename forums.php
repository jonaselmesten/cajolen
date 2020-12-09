
<?php 

/*
Jonas Elmesten
Webbprogrammering 7,5hp - Projekt
Datateknik HT18

This file shows all the forums and the latest posts for respective forum

*/

session_start();

include("sections/header.php");

require("includes/check_if_logged_in.php"); 
require("includes/config_db.php");

?>

<?php

error_reporting(-1);
ini_set("display_errors", 1);

spl_autoload_register(function ($class) {
    include "classes/" . $class . ".php";
});

$postHolder = new PostHolder($_SESSION["id"], $_SESSION["username"]);



//Select the right picture & forum name among all
$forumId = (int) $_GET["forum"];

switch ($forumId) {

    case 1:
        $picture = "img/java.png";
        $forumName = "Java";
        break;

    case 2:
        $picture = "img/c++.png";
        $forumName = "C++";
        break;

    case 3:
        $picture = "img/js.png";
        $forumName = "JavaScript";
        break;

    case 4:
        $picture = "img/python.png";
        $forumName = "Python";
        break;
    
    default:
        break;
}

?>

<script>
    $("#header-mode").addClass("full");
</script>

<div class="container forum-header">
    <div class="container-box">

        <div class="container-info">

            <img src=<?php echo $picture?> class="forum-picture-top">
            <h1><span><?php echo $forumName?></span>Forum</h1>
            <p class="text-area-medium">Look at old posts or <a class="white-background-link" href="post.php?forum=" . $forumId >create a new one!</a>
            <br>Use the <a class="fas fa-plus-square icon-small" alt="Plus icon"></a> to create new posts.
            </p>
            

        </div>

    </div>
</div>

<hr>

<div class="container" id="forum-buttons">

    <div class="container-box minus-medium-icon">
    
        <a class="fas fa-plus-square icon-medium" href="post.php?forum=<?php echo $forumId ?>" alt="Plus icon"></a>
        <button class="standard-button" id="show-all-button">Show all</button>
        <button class="standard-button" id="show-created-button">Created by me</button>
        <button class="standard-button" id="show-written-button">Written in</button>

    </div>

</div>

<div>
    
    <!--Add all 3 diffrent post view-modes-->
    <ul class="forum-list" id="post-list-all">

    <?php

    //Add all posts
    
    $connection = mysqli_connect(SERVER_DB, USERNAME_DB, PW_DB, NAME_DB);

    if(!mysqli_connect_errno()) {

        $stmt = mysqli_prepare($connection, $getAllPostsSQL);
        mysqli_stmt_bind_param($stmt ,"ii" , $_SESSION["id"], $forumId);
        mysqli_stmt_execute($stmt);

        mysqli_stmt_bind_result($stmt, $postId,$caption, $autor, $latest, $entryCount, $userEntryCount);
        
        //Create and add posts to the post-holder
        while(mysqli_stmt_fetch($stmt)) {
            $post = new Post($forumId, $postId, $caption, $autor, $latest, $entryCount, $userEntryCount);
            $postHolder->addPost($post);
        }

        mysqli_stmt_close($stmt);

        if(count($postHolder->getAllPosts()) == 0) {
            echo "
            <div class='container'>
                <div class='container-box'>
                    <div class='container-info'>
                        <h1>Be the first one to create a post!</h1>
                    </div>
                </div>
            </div>
            ";
        }else {
            foreach ($postHolder->getAllPosts() as $post) {
                echo $post->getHTML();
            }
        }

    }

    mysqli_close($connection);
    
    ?>

    </ul>

    <ul class="forum-list" id="post-list-created">

    <?php

    //Add posts created by user

    if(count($postHolder->getPostsCreatedByUser()) == 0) {
        echo "
        <div class='container'>
            <div class='container-box'>
                <div class='container-info'>
                    <h1>You haven't created any posts.</h1>
                </div>
            </div>
        </div>
        ";
    }else {
        foreach ($postHolder->getPostsCreatedByUser() as $post) {
            echo $post->getHTML();
        }
    }

    ?>
    
    </ul>

    <ul class="forum-list" id="post-list-written">

    <?php

    //Add posts that the user has written in

    if(count($postHolder->getUserPosts()) == 0) {
        echo "
        <div class='container'>
            <div class='container-box'>
                <div class='container-info'>
                    <h1>You haven't written in any post created by another user yet.</h1>
                </div>
            </div>
        </div>
        ";
    }else {
        foreach ($postHolder->getUserPosts() as $post) {
            echo $post->getHTML();
        }
    }
    ?>
    
    </ul>

</div>

<?php include("sections/footer.html") ?>