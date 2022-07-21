// Prevent any global variables being declared within function
"use strict";

function validate() {
    //initialize local variables
    var result = true;              // assume no errors

    // Retrieving entered data from quiz.html
    var studentid = document.getElementById("sID").value;
    var firstname = document.getElementById("firstname").value;
    var lastname = document.getElementById("lastname").value;
    var score = 0

    //verification of entered data with restricted parameters  
    if (!studentid.match(/^([0-9]{7})$|(^[0-9]{10})$/)) {
        alert("Please enter a student number that is either 7 or 10 digits long\n")
        result = false;
    }
    if (!firstname.match(/^[a-zA-Z -]{1,30}$/)) {
        alert("Your first name must only contain only alpha characters, hyphens or spaces\n")
        result = false;
    }
    if (!lastname.match(/^[a-zA-Z -]{1,30}$/)) {
        alert("Your last name must only contain only alpha characters, hyphens or spaces\n")
        result = false;
    }

    score = getScore();

    // User cannot submit if they score zero, error notfication  
    if (score == 0 ) {
        result = false;
        alert("you got 0 score")
    }

    // If validation successful can store data into local storage
    if (result) { 
        answerStorage(studentid, firstname, lastname, score)
    }

    return result;                   //if false the info will not be sent to the server

}

function answerStorage (studentid, firstname, lastname, score) {
    localStorage.setItem("studentid", studentid);
    localStorage.setItem("firstname", firstname);
    localStorage.setItem("lastname", lastname);
    localStorage.setItem("score", score);
}       

function getScore() {
    // Q1 Answer: Active Server Pages --> answer is not case sensitive 
    var v1 = document.getElementsByName('question1')[0].value.toLowerCase();
    // Q2 Answer: #C which is the first array 
    var v2 = document.getElementsByName('question2')[0].checked;
    // Q3 Answer: Multi-threaded & Blocking I/O which is the array 1 & 2
    var v3_option1 = document.getElementsByName('question3')[1].checked;
    var v3_option2 = document.getElementsByName('question3')[2].checked;
    // Q4 Answer: Microsoft
    var v4 = document.getElementsByName('question4')[0].value;
    // Q5 Answer: macOS,Windows,Linux --> answer is not case sensitive, able to split strings by ','
    var v5 = document.getElementsByName('question5')[0].value.toLowerCase().split(','); 
    // Removal of duplicate answers and only accepts 3 answers due to array arrangement below 
    var uniquev5 = v5.filter((x, i, a) => a.indexOf(x) == i)
    console.log(uniquev5)

    var score = 0;

    if (v1 == "active server pages" ) {
        score++;
    }
    if (v2 == true ) {
        score++;
    }
    if (v3_option1 == true) {
        score+=0.5;
    }
    if (v3_option2 == true ) {
        score+=0.5;     
    }
    if (v4 == "Microsoft" ) {
        score++;
    }    
    if (uniquev5[0] == "macos" || uniquev5[0] == "windows" || uniquev5[0] == "linux") {
        score+=0.33;
    }
    if (uniquev5[1] == "macos" || uniquev5[1] == "windows" || uniquev5[1] == "linux") {
        score+=0.33;
    }
    if (uniquev5[2] == "macos" || uniquev5[2] == "windows" || uniquev5[2] == "linux") {
        score+=0.33;
    }
    // Round up score as question 5 is divided by /3 for each correct answer
    if (score == 4.99) {
        score = 5;
    } 

    return score;

}

function init() {
// get ref to the HTML element
var quizForm = document.getElementById("quizform"); 
//register the event listener
quizForm.onsubmit = validate;
}

window.onload = init;