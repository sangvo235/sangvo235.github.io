<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="description" content="Quiz Page" />
    <meta name="keywords" content="HTML, CSS, ASP.NET" />
    <meta name="author" content="Sang Vo"  />
    <link href ="styles/style.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap" rel="stylesheet">
    <script src="scripts/quiz.js"></script>
    <script src="scripts/enhancements.js"></script>
    <title>Test Yourself</title>
</head>

<body>
<?php
include("header.inc")  
?>

<div class="quiz_intro">
    <h1>Lets see if you're an ASP.NET expert!!</h1>
    <br><br><br>
    <h2>You have 90 seconds to fill in your answers...</h2>
</div>

<form id="quizform" method="POST" action="markquiz.php">
<div class="quiz_details">
	<fieldset>
		<legend>Student Details</legend>

		<p><label for="sID">Student ID</label> 
			<input name= "sID" id="sID" maxlength="10" size="10"/>
		</p>

        <p><label for="firstname">First name:</label>
            <input type="text" name= "firstname" id="firstname" maxlength="30" size="30" required="required"/>
            <label for="lastname">Last name:</label>
            <input type="text" name= "lastname" id="lastname" maxlength="30" size="30" required="required"/>
        </p>
    </fieldset>
</div>  

<div class="quiz_questions">
    <fieldset>
        <legend>Quiz Time!</legend>
        <p>Q1) What does the acronym 'ASP' in ASP.NET stand for?</p>
        <p><label for="ASP">Please enter</label> 
            <input type="text" name= "question1" id="ASP" maxlength="30" size="30"/>
        </p>
        <br>

        <p>Q2) What is the primary coding language used by ASP.NET?</p>
        <p><label for="C#">C#</label> 
            <input type="radio" id="C#" name="question2" value="C#"/>
            <label for="JavaScript">JavaScript</label> 
            <input type="radio" id="JavaScript" name="question2" value="JavaScript" />
            <label for="PHP">PHP</label> 
            <input type="radio" id="PHP" name="question2" value="PHP"/>
            <label for="Python">Python</label> 
            <input type="radio" id="Python" name="question2" value="Python"/>
        </p>
        <br>

        <p>Q3) Please select the following correct answer(s) relating to ASP.NET processing model.</p>
        <p><label for="asynchronous">Asynchronous</label> 
            <input type="checkbox" id="asynchronous" name="question3" value="asynchronous"/>
            <label for="multi">Multi-threaded</label> 
            <input type="checkbox" id="multi" name="question3" value="multi"/>
            <label for="blocking">Blocking I/O</label> 
            <input type="checkbox" id="blocking" name="question3" value="blocking"/>
            <label for="none">None are correct</label> 
            <input type="checkbox" id="none" name="question3" value="none"/>
        </p>
        <br>

        <p>Q4) What company created ASP.NET?</p>
        <p><label for="company">Only one company from the list is correct</label> 
            <select name="question4" id="company">
                <option value="Please Select">Please Select</option>
                <option value="Apple">Apple</option>	
                <option value="Amazon">Amazon</option>	
                <option value="Google">Google</option>
                <option value="Meta">Meta</option>
                <option value="Microsoft">Microsoft</option>
                <option value="Netflix">Netflix</option>		
            </select>
        </p>
        <br>

        <p>Q5) Please list one Operating System ASP.NET is compatible with.</p>
        <p><label for="comments"></label>
            <textarea id="comments" name="question5" rows="4" cols="55" placeholder="Hint: There are three different options! :)"></textarea>
        </p>
        <br>
    </fieldset>
</div>

<div class="quiz-time-left" id="quiz-time-left">
</div>

<div class="quiz_format">
<button class="quiz_submit" id="Submit" type="submit">Submit</button>
<button class="quiz_reset" id="reset" type="reset">Reset Quiz</button>
</div>
</form>


<?php
include("footer.inc")  
?>

</body>
</html>