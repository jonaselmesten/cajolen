
<?php

/*
Jonas Elmesten
Webbprogrammering 7,5hp - Projekt
Datateknik HT18
*/

class EntryHolder {

    private $entryArray = array();
    private $forumId;
    private $postId;

    function __construct($forumId, $postId) {
        $this->forumId = $forumId;
        $this->postId = $postId;
    }

    function addPost($entry) {
        $this->entryArray[] = $entry;
    }

    function getEntry($index) {
        return $this->entryArray[$index];
    }

    function getSize() {
        return count($this->entryArray);
    }

    function getAllEntries() {
        return $this->entryArray;
    }

}

?>