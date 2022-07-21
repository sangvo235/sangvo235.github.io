// Prevent any global variables being declared within function
"use strict";

// Calling stored data from local storage to result.html

function info_recall() { 
        document.getElementById("studentid_r").textContent = localStorage.getItem("studentid");
        document.getElementById("firstname_r").textContent = localStorage.getItem("firstname");
        document.getElementById("lastname_r").textContent = localStorage.getItem("lastname");
        document.getElementById("score_r").textContent = localStorage.getItem("score");
}

// Matching student ID, checking and retrieving number of attempts data

function checkstudent() {
    var count = 1
    var retry = document.getElementById("retry")
    var studentid = localStorage.getItem("studentid")

    if (localStorage.getItem(studentid)===null) {
        localStorage.setItem(studentid, 1)
    }
    else {
        localStorage.setItem(studentid, 
                    parseInt(localStorage.getItem(studentid)) + 1) // passing of string data to int
                        count += 1
                        retry.style.display = "none" // removal of Try Again! link if user has 2 attempts
    }
    document.getElementById("count_r").textContent = count;
    return count

}

function init() {
    checkstudent();
    info_recall();
}
    
window.onload = init;
    