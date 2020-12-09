/*
Jonas Elmesten
Webbprogrammering 7,5hp - Projekt
Datateknik HT18
*/

"use strict"

$(document).ready(function () {

$("#register").toggle();
$("#logged-in").toggle();

$("#register-link").click(function (e) {

   $("#register").slideToggle();

   $("#login").slideToggle(function () {
      $("#message-login").html("");
      $("#login-form").trigger("reset");
      $(".field").css("background-color", "transparent");
   });
});

$("#go-back-link").click(function (e) {
   
   $("#login").slideToggle();

   $("#register").slideToggle(function () {
      $("#message-reg").html("");
      $("#register-form").trigger("reset");
      $(".field").css("background-color", "transparent");
   });
});

//Handle user log-in
$("#login-form").submit(function (e) {

   e.preventDefault();

   var username = $("#username").val();
   var password = $("#password").val();

   if(!checkLogInInput())
      return;

   //Use ajax to handle log-in attempt - then show the result directly
   $.ajax({
      type: "post",
      url: "includes/login_form.php",
      data: {username:username, password:password},

      success: function (response) {

         //Handle different results
         switch(response.trim()) {

            case "LOGGED_IN":

               $("#login").slideToggle();
               $("#name-span").html($("#username").val());
               $("#logged-in").slideToggle(function () {
                  $("#message-login").html("");
                  $("#login-form").trigger("reset");
               });

            break;

            case "INVALID_PW":
               $("#message-login").html("Invalid password.");
               $("#password").val("");
               $("#password").css("background-color", "rgba(255, 0, 0, 0.5)");
            break;

            case "NO_USER":
               $("#message-login").html("That user name does not exist.");
               $("#login-form").trigger("reset");
            break;

            case "ERROR":
               $("#login-form").trigger("reset");
               $("#message-login").html("Could not connect to database - try again later.");
            break;
            
         }
      }
   });
});

//Handle user register
$("#register-form").submit(function(e) {

   e.preventDefault();

   var username = $("#username-reg").val();
   var firstname = $("#firstname-reg").val();
   var password = $("#password-reg").val();
   var email = $("#email-reg").val();
   
   if(!checkRegisterInput())
      return;

   //Use ajax to handle register attempt - then show the result directly
   $.ajax({
      type: "post",
      url: "includes/register_form.php",
      data: {username:username, firstname:firstname, password:password, email:email},

      success: function (response) {

         //Handle different results
         switch(response.trim()) {


            case "INVALID_EMAIL":
               $("#message-reg").html("A user with that e-mail already exists.");
               $("#email-reg").val("");
               $("#email-reg").css("background-color", "rgba(255, 0, 0, 0.5)");
            break;

            case "INVALID_USERNAME":
               $("#message-reg").html("That username already exists.");
               $("#username-reg").val("");
               $("#username-reg").css("background-color", "rgba(255, 0, 0, 0.5)");
            break;

            case "INVALID_USERNAME_EMAIL":
               $("#message-reg").html("Both e-mail and the username already exists.");
               $("#username-reg").val("");
               $("#email-reg").val("");
               $("#username-reg").css("background-color", "rgba(255, 0, 0, 0.5)");
               $("#email-reg").css("background-color", "rgba(255, 0, 0, 0.5)");
            break;

            case "SUCCESS":
               $("#message-login").html("You are now registered - Try to log in!");
               $("#register").slideToggle();
               $("#login").slideToggle();
            break;

            case "ERROR":
               $("#register-form").trigger("reset");
               $("#message-reg").html("Could not connect to database - try again later.");
            break;

         }
      }
   });
});
//------------------------------------------------------------------
});

function checkLogInInput() {

var username = $("#username").val();
var password = $("#password").val();
var correct = true;

$(".field").css("background-color", "transparent");

//Turn all empty fields red
if(!username) {
   $("#username").css("background-color", "rgba(255, 0, 0, 0.5)");
   correct = false;
}
if(!password) {
   $("#password").css("background-color", "rgba(255, 0, 0, 0.5)");
   correct = false;
}

if(!correct)
   $("#message-login").html("You need to fill in all the fields!");

return correct;
}


function checkRegisterInput() {

var username = $("#username-reg").val();
var firstname = $("#firstname-reg").val();
var password = $("#password-reg").val();
var email = $("#email-reg").val();
var correct = true;

$(".field").css("background-color", "transparent");

//Turn all empty fields red
if(!username) {
   $("#username-reg").css("background-color", "rgba(255, 0, 0, 0.5)");
   correct = false;
}
if(!firstname) {
   $("#firstname-reg").css("background-color", "rgba(255, 0, 0, 0.5)");
   correct = false;
}
if(!password) {
   $("#password-reg").css("background-color", "rgba(255, 0, 0, 0.5)");
   correct = false;
}
if(!email) {
   $("#email-reg").css("background-color", "rgba(255, 0, 0, 0.5)");
   correct = false;
}

if(!correct)
   $("#message-reg").html("You need to fill in all the fields!");

return correct;
}
