
<?php 

/*
Jonas Elmesten
Webbprogrammering 7,5hp - Projekt
Datateknik HT18

This file handles log-in and register attempts

*/

session_start();

include("sections/header.php") 

?>

<script>
    $("#header-mode").addClass("full");
</script>


<div class="container">

    <div class="container-box" style>

        <div id="login">

            <div class="container-info">
                <h1>Want to ask a <span>Question?</span></h1>
                <p class="text-area-medium">Log in to connect with other experienced members.</p>
                <b id="message-login" class="text-area-medium"></b>
            </div>
    
            <br>
                
                <form id="login-form" method="POST">
    
                    <input class="field" type="text" id="username" placeholder="Username">
                    <br>
                    <input class="field" type="password" id="password" placeholder="Password">
                    <br>
                    <input class="standard-button" type="submit" id="login-button" value="Login">
        
                </form>

                <a class="white-background-link" id="register-link">Register</a>

        </div>

        <div id="register">

            <div class="container-info">
                <h1>Are you <span>Ready?</span></h1>
                <p class="text-area-medium"><?php echo $loginMessage ="Just enter the information below and you'll be set!" ?></p>
                <b id="message-reg" class="text-area-medium"></b>
            </div>
            
            <br>

            <form id="register-form" method="POST">
    
                    <input class="field" type="text" id="username-reg" placeholder="Username">
                    <br>
                    <input class="field" type="text" id="firstname-reg" placeholder="First name">
                    <br>
                    <input class="field" type="password" id="password-reg" placeholder="Password">
                    <br>
                    <input class="field" type="text" id="email-reg" placeholder="E-mail">
                    <br>
                    <input class="standard-button" type="submit" id="register-button" value="Register">
        
            </form>

            <a class="white-background-link" id="go-back-link">Go back</a>
    

        </div>

        <div id="logged-in">

            <div class="container-info">
                <h1>Welcome <span id="name-span"></span></h1>
                <p>You are now logged in! You can now use the forums below.</p>
            </div>

            <?php include("sections/forum_pic_row.php"); ?>
    
        </div>

    </div>
</div>


<?php include("sections/footer.html") ?>

