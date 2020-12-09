
<?php

/*
Jonas Elmesten
Webbprogrammering 7,5hp - Projekt
Datateknik HT18
*/

class PostHolder {

    private $postArray = array();
    private $userId;
    private $userName;

    function __construct($userId, $userName) {
        $this->userId = $userId;
        $this->userName = $userName;
    }

    function addPost($post) {
        $this->postArray[] = $post;
    }

    function getPost($index) {
        return $this->postArray[$index];
    }

    function getSize() {
        return count($this->postArray);
    }

    function getAllPosts() {
        return $this->postArray;
    }

    function getPostsCreatedByUser() {

        $array = array();

        foreach ($this->postArray as $post) {

            if($post->getAuthor() === $this->userName) {
                $array[] = $post;
            }
        }

        return $array;
    }

    //Returns all posts the user has written in that is not created by the user
    function getUserPosts() {

        $array = array();

        foreach ($this->postArray as $post) {

            if($post->getUserWriteCount() > 0 && $post->getAuthor() != $this->userName) {
                $array[] = $post;
            }
        }

        return $array;
    }
}

?>