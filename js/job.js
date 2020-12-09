/*
Jonas Elmesten
Webbprogrammering 7,5hp - Projekt
Datateknik HT18

This file fetches JSON data from the job API

*/

"use strict"

var url = "https://jooble.org/api/";
var key = "e7834308-62ea-4b86-b8bb-58294ed4c78b";
var pageNumber = 1;

$(document).ready(function () {

    $("#error").toggle();
    $("#no-result").toggle();
    $("#empty-msg").toggle();
    $(".result-container").hide();


    //Search after IT and then scroll down
    $("#search-it-button").click(function (e) { 

        $("#word-search").val("It");
        search("", "It");

        $([document.documentElement, document.body]).animate({
            scrollTop: $("#job-list").offset().top
        }, 1000);
    });


    //Create a new search
    $("#search-button").click(function (e) { 

        pageNumber = 1;
        $(".next").hide();
        $(".prev").hide();
        $("#error").hide();
        $("#no-result").hide();
        $("#empty-msg").hide();

        var keywords = $("#word-search").val();
        var location = $("#location-search").val();

        $(".field").css("background-color", "transparent");

        //Turn all empty fields red
        if(!location && !keywords) {
            $("#location-search").css("background-color", "rgba(255, 0, 0, 0.5)");
            $("#word-search").css("background-color", "rgba(255, 0, 0, 0.5)");
            $("#empty-msg").show();
            return;
        }

        search(location, keywords);
    });


    //Show the next page of jobs
    $(".next").click(function (e) { 

        pageNumber++;

        var keywords = $("#word-search").val();
        var location = $("#location-search").val();

        search(location, keywords);
    });


    //Show the previous page of jobs
    $(".prev").click(function (e) { 

        pageNumber--;

        var keywords = $("#word-search").val();
        var location = $("#location-search").val();

        search(location, keywords);
    });
});


//Search jobs after location and keywords
//Adds HTML dynamically to the page
function search(location, keywords) {

    var XMLhttp = new XMLHttpRequest();
    var params = "{ keywords: '" + keywords  + "', location: '" + location  + "', page: '" + pageNumber + "' }";

    XMLhttp.open("POST", url + key, true);

    //Send header information
    XMLhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        
    //When the state changes
    XMLhttp.onreadystatechange = function() {

        //If no error - parse information retrieved
        if(XMLhttp.readyState == 4 && XMLhttp.status == 200) {

            var jsonData = JSON.parse(XMLhttp.response);
            var jobCount = jsonData.jobs.length;

            $("#job-list").empty();
            $("#error").hide();
            $("#no-result").hide();

            //The jooble API returns 20 jobs/page
            //Handle next & previous buttons and wether there was a result or not
            if(jobCount > 0) {

                $(".result-container").show();
                $("#result-count").html("<b>Result: </b>" + jsonData.totalCount);

            }else if(jobCount == 0 && pageNumber == 1) {

                $(".result-container").hide();
                $("#no-result").slideToggle();
                return;
            }
            
            //Handle what button to show - Next - Previous
            if(jobCount == 20 && (pageNumber * 20 != jsonData.totalCount))
                $(".next").show();
            else
                $(".next").hide();
            
            if(pageNumber > 1)
                $(".prev").show();
            else 
                $(".prev").hide();



            //Add all the jobs dynamically
            for(let i = 0; i < jobCount; i++) {

                jsonData.jobs[i].title;

                var listItem = document.createElement("li");
                var div = document.createElement("div");
                
                var company = document.createElement("h1");
                var title = document.createElement("h2");
                var snippet = document.createElement("p");
                var location = document.createElement("p");
                var jobType = document.createElement("p");
                var updated = document.createElement("p");
                var linkButton = document.createElement("a");
                var hr = document.createElement("hr");

                linkButton.className = "job-button";
                div.className = "job-container";

                company.innerHTML = jsonData.jobs[i].company;
                title.innerHTML = jsonData.jobs[i].title;
                snippet.innerHTML = jsonData.jobs[i].snippet;
                location.innerHTML = "<b>Location: </b>" + jsonData.jobs[i].location;
                jobType.innerHTML = "<b>Type: </b>" + jsonData.jobs[i].type;
                updated.innerHTML = "<b>Updated: </b>" + jsonData.jobs[i].updated.slice(0,10);
                linkButton.innerHTML = "Link";
                linkButton.href = jsonData.jobs[i].link;
                linkButton.target = "_blank";

                listItem.appendChild(div);
                div.appendChild(company);
                div.appendChild(title);
                div.appendChild(snippet);
                div.appendChild(location);
                div.appendChild(jobType);
                div.appendChild(updated);
                div.appendChild(linkButton);
                div.appendChild(hr);

                $("#job-list").append(listItem);
            }
        }
    }

    //Show error page
    XMLhttp.onerror = function() {
        $("#error").slideToggle();
    }
    
    XMLhttp.send(params);
}

