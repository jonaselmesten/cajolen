/*
Jonas Elmesten
Webbprogrammering 7,5hp - Projekt
Datateknik HT18

This file mainly handles the contact-page

*/

"use strict"

$(document).ready(function () {


   setTimeout(function () {
      $("#bkg").slideDown();
   }, 500);
  

   
   //Contact-page----------------------------------------------------------------
   $("#information").toggle();
   $("#sent").toggle();
   $("#bkg").toggle();
   $("#empty-1").hide();
   $("#empty-2").hide();
   $("#error-msg").toggle();


   $("#who-button").click(function (e) { 

      //Check for input
      if(!$("#text-message").val()) {
         $("#text-message").css("background-color", "rgba(255, 0, 0, 0.5)");
         $("#empty-1").show();
         return;
      }
         
      $("#message-area").slideToggle();
      $("#information").slideToggle();
   });


   $("#go-back-link").click(function (e) {
      $("#message-area").slideToggle();
     $("#information").slideToggle();
   });


   //Handle sending mails
   $("#send-button").click(function (e) { 

      var username = $("#username").val();
      var text = $("#text-message").val();
      var email = $("#email").val();

      if(!checkInput())
         return;

      //Use ajax to use POST for the mail-handler php-file
      $.ajax({
         type: "post",
         url: "includes/send_mail.php",
         data: {username:username, text:text, email:email},

         success: function (response) {

            //Handle response
            switch(response.trim()) {

               case "SENT":
                  console.log("SENT");
                  $("#information").slideToggle();
                  $("#sent").slideToggle();
               break;

               case "MAIL_ERROR":
                  $("#information").slideToggle();
                  $("#error-msg").slideToggle();
               break;

            }
         }
      });
   });
});


function checkInput() {

   var username = $("#username").val();
   var email = $("#email").val();
   var correct = true;

   $(".field").css("background-color", "transparent");

   //Turn all empty fields red
   if(!username) {
      $("#username").css("background-color", "rgba(255, 0, 0, 0.5)");
      correct = false;
   }
   if(!email) {
      $("#email").css("background-color", "rgba(255, 0, 0, 0.5)");
      correct = false;
   }

   if(!correct)
      $("#empty-2").show();

   return correct;

}