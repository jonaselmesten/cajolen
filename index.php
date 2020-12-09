
<?php 

/*
Jonas Elmesten
Webbprogrammering 7,5hp - Projekt
Datateknik HT18

Start page

*/

session_start();

include("sections/header.php"); 

?>

<script>
    $("#header-mode").removeClass("full");
</script>

<div class="bkg-area" aria-label="Background with programming code">
    <div class="bkg align-center overlay" id="bkg-1">

        <div class="container" id="bkg">
            <div class="bkg-text">

                <h1>Welcome to Cajolen</h1>
                <a href="about.php" class="transparent-button">About us</a>

            </div>
        </div>

    </div>
</div>


<article class="container">
    <div class="container-box">
        <div class="container-info">
        
            <h2>Looking for a<span>Job?</span></h2>
            <p class="text-area-medium">Don't worry! With our help you'll be able to connect with employers all around the world. 
            The market for developers is improving by the minute, so head over to our jobs-page and start searching!</p>
        
            <a class="white-background-link" href="jobs.php">Go to jobs</a>

        </div>
    </div>
</article>


<nav class="container-picture overlay" aria-label="Background with business people">
    <div class="picture-row picture-row-bkg">
        
        <ul>
    
            <li class="picture">
                <a href="forum.php?forum=1">
                    <img src="img/java.png" alt="Java logo">
                    <p>Java</p>
                </a>
            </li>

            <li class="picture">
                <a href="forum.php?forum=2">
                    <img src="img/c++.png" alt="C++ logo">
                    <p>C++</p>
                </a>
            </li>

            <li class="picture">
                <a href="forum.php?forum=3">
                    <img src="img/js.png" alt="JavaScript logo">
                    <p>JavaScript</p>
                </a>
            </li>

            <li class="picture">
                <a href="forum.php?forum=4">
                    <img src="img/python.png" alt="Python logo">
                    <p>Python</p>
                </a>
            </li>
    
        </ul>

    </div>
</nav>


<article class="container">
    <div class="container-box">

        <div class="container-info">
            <h3>Need help with a<span>Language?</span></h3>
            <p class="text-area-medium">Create an account and learn from experienced developers in our forums. 
            There you ask for help or discuss about language-specific things - Simply a perfect place to improve your knowledge! 
            We currently offer forums in four of the most popular languages, and we aim to add even more in the future. 
            Feel free to give us a <a class="white-background-link" href="contact.php">suggestion</a> on what you would like to see.</p>

        <a class="white-background-link" href="forum.php">Go to forums</a>

        </div>


    </div>
</article>

<?php include("sections/footer.html") ?>

 

