
<!-- 
Jonas Elmesten
Webbprogrammering 7,5hp - Projekt
Datateknik HT18
-->

<!doctype html>

<html lang="en">

<head>
    <title>Cajolen</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/d8fd233857.js"></script>
    <script src="js/jquery.js"></script>
    <script src="js/forum.js"></script>
    <script src="js/job.js"></script>
    <script src="js/login.js"></script>
</head>

<body>

    <header>

        <div class="header-area" id="header-mode">
                
                <div class="container">
                    
                    <div class="align-center">
                        
                            <a href="index.php"> <img src="img/logo.png" alt="Cajolen logo"></a>

                                <div class="align-center">
                                    
                                    <div class="main-menu">
                                        
                                        <nav class="menu-ulist">
                                            <ul>

                                                <li><a href="index.php">Home</a></li>

                                                <li><a href="about.php">About</a></li>

                                                <li><a href="forum.php">Forum</a>

                                                    <ul class="sub-menu">
                                                        <li><a href="forums.php?forum=1">Java</a></li>
                                                        <li><a href="forums.php?forum=2">C++</a></li>
                                                        <li><a href="forums.php?forum=3">JavaScript++</a></li>
                                                        <li><a href="forums.php?forum=4">Python</a></li>
                                                    </ul>

                                                </li>

                                                <li><a href="jobs.php">Jobs</a></li>

                                                <li><a href="contact.php">Contact</a></li>

                                                <?php 
                                                
                                                //Show a log out option when logged in
                                                if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
                                                    echo "<li><a href='includes/logout.php'>Log Out</a></li>";
                                                }
                                                
                                                ?>

                                            </ul>
                                        </nav>
                                    </div>
                                </div>
                        </div>
                </div>
        </div>
    </header>