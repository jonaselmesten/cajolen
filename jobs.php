
<?php

/*
Jonas Elmesten
Webbprogrammering 7,5hp - Projekt
Datateknik HT18

This file is for searchin job listings and adding them dynamically

*/

session_start();

include("sections/header.php"); 

?>

<script>
    $("#header-mode").removeClass("full");
</script>


<div class="bkg-area" aria-label="Background with big office building">

    <div class="bkg align-center overlay" id="bkg-2">

        <div class="container"  id="bkg">
            <div class="bkg-text">

                <h1>Looking for work?</h1>
                <a class="transparent-button" id="search-it-button">Search after IT-jobs</a>

            </div>
        </div>

    </div>
</div>


<div class="container">
    <div class="container-box">

        <div class="container-info">


                <section>

                <h2>Let us help<span>You!</span></h2>

                    <p class="text-area-medium">We have joblistings from all around the globe. Companies that are looking for you!
                    Please feel free to try our <a class="white-background-link" href="https://jooble.org/">Jooble</a>-powered search engine, and you will find any kind of 
                    job that you can think of! Just fill in a location or a word - or both - and search away! You will also have a link to the listing itself if you would like to 
                    apply for the position. 
                    </p>
                    <br>
                    <b>Enough talking - let's go!</b>

                </section>

        </div>
    
    </div>
</div>


<div class="container">
    <div class="job-search">

        <b id="empty-msg" class="text-area-medium">Fill in one or both of the fields!</b>

        <div class="job-search-field">
            <input type="search" class="field" placeholder="Location..." id="location-search">
            <input type="search" class="field" placeholder="Keyword..." id="word-search">
            <input type="button" class="search-button" id="search-button" value="Search">
        </div>

    </div>
</div>


<div class="result-container" >
    <p id="result-count"></p>
</div>


<!--Top of jobs-->
<div class="result-container">
    <a class="white-background-link prev">Prev</a>
    <a class="white-background-link next">Next</a>
</div>


<!--This list will hold all the jobs-->
<div class="container">
    <ul class="job-list" id="job-list">

    </ul>
</div>


<!--Bottom of jobs-->
<div class="result-container">
    <a class="white-background-link prev">Prev</a>
    <a class="white-background-link next">Next</a>
</div>


<!--When no result-->
<div class="container" id="no-result">
    <div class="container-box">
        <div class="container-info">
            <h1><span>No result!</span></h1>
        </div>
    </div>
</div>


<!--When error-->
<div class="container" id="error">
    <div class="container-box">
        <div class="container-info">
            <h1><span>Error!</span>Something went wrong.</h1>
        </div>
    </div>
</div>

<?php include("sections/footer.html") ?>

 

