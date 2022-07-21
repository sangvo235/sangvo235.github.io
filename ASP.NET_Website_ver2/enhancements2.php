<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8"/>
    <meta name="description" content="Introductory Home Page"/>
    <meta name="keywords" content="HTML, CSS, ASP.NET"/>
    <meta name="author" content="Sang Vo"/>
    <link href ="styles/style.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap" rel="stylesheet">
    <title>Enhancements 2</title>
</head>

<body>
<?php
include("header.inc")  
?>
  
<article><div class="h2_change"><h2>Enhancements 2</h2></div>
<section id="enhancement_1">
<h2>Enhancement #1</h2>
<p>The first enhancement is the usage of a timer within quiz.html.</p>
<a href="quiz.html">Timer for Quiz</a>
 <p>A time of 90 seconds displayed as both minutes and second is displayed.
    The time starts within 1 second of the quiz page loading.
    After the time has elasped the user's form is locked and they are unable to submit.
    This is achieved by obtaining the quiz form id & using the element[i].disabled function to disable the page. 
    The parseInt() function is important in achieving this through the conversion of strings to integers.</p>
<p><a href="https://stackoverflow.com/questions/55150449/javascript-quiz-timer">Source for quiz timer</a></p>
</section>

<section id="enhancement_2">
<h2>Enhancement #2</h2>
<p>The second enhancement is the usage of a timed confetti explosion within the result.html.</p>
<a href="result.html">Confetti Explosion</a>
<p>A timed confetti explosion for 9.5 seconds after 0.5 second of loading is applied on the results page.
   Adapted from the source video, I made several changes to the overall angle, colour, shape, width and speed of the confetti to in with the theme of the webpage.  
</p>
<p><a href="https://www.youtube.com/watch?v=quSR_ZrVz6Y">Source for timed confetti explosion</a></p>
<br>
</section>
</article>

<?php
include("footer.inc")  
?>
</body>
</html>