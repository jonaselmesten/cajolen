
<?php 

/*
Jonas Elmesten
Webbprogrammering 7,5hp - Projekt
Datateknik HT18

This file is used when the user want to contact the "page"

*/

session_start();
include("sections/header.php") 

?>

<script>
    $("#header-mode").addClass("full");
</script>

<div class="container">

    <div class="container-box" style>


        <div id="message-area">

            <div class="container-info">
                <h1>Something you want to tell us?<span>Let us know!</span></h1>
                <b id="empty-1">Please write something in the field below!</b>
            </div>
    
            <br>

            <div class="container-info" id="message">
                <textarea form="message-form" class="message" id="text-message" cols="100" rows="20" required></textarea>
            </div>

            <br>

            <input class="standard-button" id="who-button" type="button" value="Who are you?">

            <br>
            
        </div>
        


        <div id="information">

            <div class="container-info">
                <h1>Who are<span>You?</span></h1>
                <b id="empty-2">You need to fill in all the fields!</b>
            </div>
    
            <br>

                <form id="message-form" method="POST">
    
                    <input class="field" type="text" id="username" placeholder="Name" required>

                    <br>

                    <input class="field" type="text" id="email" placeholder="E-mail" required>

                    <br>

                    <input class="standard-button" id="send-button" type="button" value="Send">

                </form>

                <a class="white-background-link" id="go-back-link">Go back</a>
            
        </div>



        <div id="sent">

            <div class="container-info">
                <h1>Thank you for helping us become<span>Better!</span></h1>
            </div>

            <br>

            <div class="container-info">
                <p class="text-area-medium" >We'll answer your question as soon as possible! We are a bit busy right now but it should not take too long!</p>
            </div>

        </div>

        <div id="error-msg">

            <div class="container-info">
                <h1><span>Error!</span><br>Something went wrong!</h1>
            </div>

            <br>

            <div class="container-info">
                <p class="text-area-medium" >Your e-mail couldn't be sent! Please try again later!</p>
            </div>

        </div>
    

        
    </div>

</div>


<?php include("sections/footer.html") ?>