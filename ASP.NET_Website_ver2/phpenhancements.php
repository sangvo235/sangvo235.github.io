<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8"/>
    <meta name="description" content="PHP Enhancements"/>
    <meta name="keywords" content="HTML, CSS, ASP.NET"/>
    <meta name="author" content="Sang Vo"/>
    <link href ="styles/style.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap" rel="stylesheet">
    <title>PHP Enhancements</title>
</head>

<body>
<?php
include("header.inc")  
?>

<article><div class="h2_change"><h2>PHP Enhancements</h2></div>
<section id="enhancement_1">
<h2>Enhancement #1</h2>
<p>The first enhancement is the usage of a sort button within list_all.php.</p>
<a href="list_all.php">Sort Button</a>
 <p>Created a sort button to provide the quiz supervisor with the ability to select the field on which to sort the order in which the quiz attempt records are displayed. 
     The sort button was HTML option list, allowing the supervior to sort the information in order by Attempt ID, Date & Time, Student ID, First Name, Last Name, Score and Attempt. 
     The enhancement was done by assigning by obtaining the $_POST value from the button when submitted.
     Based on the selection the query string was change, allowing for differing "order by".  
    </p>
<p>Source: Lab 10 and general knowledge learned</p>
</section>

<section id="enhancement_2">
<h2>Enhancement #2</h2>
<p>The second enhancement is the usage login page to access supervisor navigation bar and pages</p>
<a href="user_login.php">Supervisor Login Page</a>
<p>Create a table that stores unique user-ids and passwords for quiz supervisors. 
    Access to the supervisor web page should only be granted if a correct user name and password are entered. 
    Implemented knowledge from Lab 9-10 and source to create login page (user_login.php).
    The table in the date base is named : "userpw", database admin can create username and password for supervisor.
    Once correct username and password is entered, supervior gains access. 
    Changed head.inc to have link going to user_login.php instead of manage.php.
    Try this for access: username: user | password: hello
</p>
<p><a href="https://stackoverflow.com/questions/6404608/php-session-using-only-a-single-password-field-no-username">Source for Supervisor Login Page</a></p>
<br>
</section>
</article>


<?php
include("footer.inc")  
?>

</body>
</html>