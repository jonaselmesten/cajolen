
/*
Jonas Elmesten
Webbprogrammering 7,5hp - Projekt
Datateknik HT18

This file handles forum-related actions

*/

"use strict"

//Handles what posts will be visible for the user
$(document).ready(function () {

    $("#post-list-created").toggle();
    $("#post-list-written").toggle();


    //Show all posts
    $("#show-all-button").click(function (e) { 
        
        if($("#post-list-all").is(":hidden")) {

            if($("#post-list-created").is(":visible")) {

                $("#post-list-created").slideToggle(1000, function () {
                    $("#post-list-all").slideToggle();
                });
            }
    
            if($("#post-list-written").is(":visible")) {
    
                $("#post-list-written").slideToggle(1000, function () {
                    $("#post-list-all").slideToggle();
                });
            }
        }
    });


    //Show all created by the user
    $("#show-created-button").click(function (e) { 
        
        if($("#post-list-created").is(":hidden")) {
            
            if($("#post-list-written").is(":visible")) {

                $("#post-list-written").slideToggle(1000, function () {
                    $("#post-list-created").slideToggle();
                });
            }
    
            if($("#post-list-all").is(":visible")) {
    
                $("#post-list-all").slideToggle(1000, function () {
                    $("#post-list-created").slideToggle();
                });
            }
        }
    });


    //Show all the user has written in
    $("#show-written-button").click(function (e) { 
        
        if($("#post-list-written").is(":hidden")) {
            
            if($("#post-list-created").is(":visible")) {

                $("#post-list-created").slideToggle(1000, function () {
                    $("#post-list-written").slideToggle();
                });
            }
    
            if($("#post-list-all").is(":visible")) {
    
                $("#post-list-all").slideToggle(1000, function () {
                    $("#post-list-written").slideToggle();
                });
            }
        }
    });

});
