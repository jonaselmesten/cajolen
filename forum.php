

<?php 

/*
Jonas Elmesten
Webbprogrammering 7,5hp - Projekt
Datateknik HT18

This file shows all posts in a specific forum

*/

session_start();

include("sections/header.php");
require("includes/check_if_logged_in.php");
require("includes/config_db.php");

?>

<script>
    $("#header-mode").addClass("full");
</script>

<?php

//Look at url and go to the selected forum
if(isset($_REQUEST["forum"])) {
    header("Location: forums.php?forum=" . $_REQUEST["forum"]);
    unset($_REQUEST["forum"]);
    exit();
}

//The code below gets 3 of the latest posts from each forum
$connection = mysqli_connect(SERVER_DB, USERNAME_DB, PW_DB, NAME_DB);

if(!mysqli_connect_errno()) {

    //Place the result in an array
    if($result = mysqli_query($connection, $getForumPostSQL)) {

        $array = mysqli_fetch_all($result, MYSQLI_ASSOC);
        mysqli_free_result($result);
    }
}
mysqli_close($connection);



//This function will be called by each forum below and add the result from above
function printPosts($forumId) {

    global $array;

    foreach($array AS $row) {
        if($row['forum_id'] == $forumId)
            echo "<li><a class='white-background-link' href='view_post.php?forum="
            . $forumId . "&post=" 
            . $row["post_id"] . "'>" 
            . $row["post_title"] . "</a></li>";
    }
}

?>



<div class="container">
    <div class="container-box">

        <div class="container-info">
            <h1>Got a<span>Question?</span></h1>
            <p class="text-area-medium">Enter one of the forums below and ask away!</p>
        </div>

    </div>
</div>

<hr>

<div>
    <ul class="forum-list">

        <li>
            <!--Java forum-->
            <div class="container forum-box">
            
                <a href="forums.php?forum=1">
                    <div class="align-center rounded-box link-box" >
                        <img src="img/java.png" class="forum-picture" alt="Java logo">
                        <p>Java</p>
                    </div>
                </a>

                <div class="container-list">
                    <b>Latest posts in Java:</b>
                    <ul class="forum-post-list forum-list">
                        <?php printPosts(1); ?>
                    </ul>
                </div>

            </div>
        </li>

        <li>
            <!--C++ forum-->
            <div class="container forum-box">
            
                <a href="forums.php?forum=2">
                    <div class="align-center rounded-box link-box" >
                        <img src="img/c++.png" class="forum-picture" alt="C++ logo">
                        <p>C++</p>
                    </div>
                </a>

                <div class="container-list">
                    <b>Latest posts in C++:</b>
                    <ul class="forum-post-list forum-list">
                        <?php printPosts(2); ?>
                    </ul>
                </div>

            </div>
        </li>

        <li>
            <!--JavaScript forum-->
            <div class="container forum-box">
            
                <a href="forums.php?forum=3">
                    <div class="align-center rounded-box link-box" >
                        <img src="img/js.png" class="forum-picture" alt="JavaScript logo">
                        <p>JavaScript<p>
                    </div>
                </a>
                
                <div class="container-list">
                    <b>Latest posts in JavaScript:</b>
                    <ul class="forum-post-list forum-list">
                        <?php printPosts(3); ?>
                    </ul>
                </div>

            </div>
        </li>

        <li>
            <!--Python forum-->
            <div class="container forum-box">
            
                <a href="forums.php?forum=4">
                    <div class="align-center rounded-box link-box" >
                        <img src="img/python.png" class="forum-picture" alt="Python logo">
                        <p>Python</p>
                    </div>
                </a>

                <div class="container-list">
                    <b>Latest posts in Python:</b>
                    <ul class="forum-post-list forum-list">
                        <?php printPosts(4); ?>
                    </ul>
                </div>

            </div>
        </li>
    </ul>
</div>


<?php include("sections/footer.html") ?>