
<?php

/*
Jonas Elmesten
Webbprogrammering 7,5hp - Projekt
Datateknik HT18
*/

//Entries are the "comments" that users add to posts in the forum

class Entry {

    private $userName;
    private $entryText;
    private $date;

    function __construct($userName, $entryText, $date) {
        $this->userName = $userName;
        $this->entryText = $entryText;
        $this->date = $date;
    }

    function getEntryText() {
        return $this->entryText;
    }

    function getUserName() {
        return $this->userName;
    }

    function getDate() {
        return $this->date;
    }
}

?>