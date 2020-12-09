
<?php 

/*
Jonas Elmesten
Webbprogrammering 7,5hp - Projekt
Datateknik HT18

About page

*/

session_start();
include("sections/header.php");

?>

<script>
    $("#header-mode").addClass("full");
</script>

<div class="container">
    
    <div class="container-box">

        <div class="container-info">

        <main>

            <section>
            <h1>Cajolen?</h1>

                <p class="text-area-big">
                Cajolen was created to help people learn from each other and to be a place of oppurtunity. We wanted to offer a wide range of forums for people to use 
                and improve as developers. At the moment we only have 4, but we are working on it! Day and night! While you are waiting for another forum you might as well 
                check out our job page, where you will find oppurtunities around all the globe - or maybe even in your home town?
                </p>

            </section>


            <section>
            <h2>Updates?</h2>

                <p class="text-area-big">
                This site is still under development, so please forgive us for some of the problems you might run in to. Just be patient and you'll see that your experience of this 
                site will improve in no time! <br><b>Give us time - We give you quality.</b>
                </p>
            </section>

        </main>
            
        </div>

    </div>

</div>

<?php include("sections/footer.html") ?>