
<?php

/*
Jonas Elmesten
Webbprogrammering 7,5hp - Projekt
Datateknik HT18
*/

//A post is a single "topic" created by a user in the forum

class Post {

    private $forumId;
    private $postId;
    private $caption;
    private $author;
    private $latest;
    private $entryCount;
    private $userWriteCount;

    function __construct($forumId, $postId, $caption, $author, $latest, $entryCount, $userEntryCount) {
        
        $this->forumId = $forumId;
        $this->postId = $postId;
        $this->caption = $caption;
        $this->author = $author;
        $this->latest = $latest;
        $this->entryCount = $entryCount;
        $this->userWriteCount = $userEntryCount;
    }

    function getPostId() {
        return $this->postId;
    }

    public function getCaption() {
        return $this->caption;
    }
    
    function getAuthor() {
        return $this->author;
    }

    function getLatestEntry() {
        return $this->latest;
    }

    function getEntryCount() {
        return $this->entryCount;
    }

    function getUserWriteCount() {
        return $this->userWriteCount;
    }

    //Returns this object as HTML-code
    function getHTML() {
        
        return
        "<li>
            <div class='container forum-post-list'>
            
                <a class='white-background-link' href=view_post.php?forum=" . $this->forumId . "&post=" . $this->postId . ">$this->caption</a>
                <p><b>Answers:</b> $this->entryCount <b>Latest answer: </b>$this->latest <b>Created by user: </b>$this->author</p>
                
            </div>
        </li>";
    }
}

?>