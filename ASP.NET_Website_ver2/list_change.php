<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="description" content="Quiz Supervisor Queries" />
    <meta name="keywords" content="HTML, CSS, ASP.NET" />
    <meta name="author" content="Sang Vo"  />
    <link href ="styles/style.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap" rel="stylesheet">
    <script src="scripts/quiz.js"></script>
    <script src="scripts/enhancements.js"></script>
    <title>Change Student Results</title>
</head>

<body>
<?php
include("menu.inc")  
?>
<div class="searching_heading">
<h1>Change student attempts below!</h1>
</div>

<div class="search_box">
<form method="post" action="list_change.php">
	<fieldset>
        <legend>Student Search</legend>
        <p>	<label for="ssearch">Student ID: </label>
			<input type="text" name="ssearch" id="ssearch" placeholder="Please enter a student id... " size="20"/></p>
        <p>	<label for="ssearch">Attempt No: </label>
            <input type="text" name="selattempt" id="selattempt" placeholder="Please enter select attempt... " size="20"/></p>
        <p>	<label for="ssearch">New Score: </label>
		    <input type="text" name="newscore" id="newscore" placeholder="Please enter new score... " size="20"/></p>
		<p>	<input type="submit" value="Change" /></p>

	</fieldset>
</div>
</form>

    
<div class="list_student">
<?php

// Set up the SQL command to add the data into the table


// CHECK IF ENTRIES EXIST //
// Student ID
if (isset($_POST["ssearch"])) {
	$ssearch = htmlspecialchars($_POST["ssearch"]);
    $selattempt = htmlspecialchars($_POST["selattempt"]);
    $newscore = htmlspecialchars($_POST["newscore"]);
    $flag = 0;

// DATABASE CONNECTION //
	// db_details
    require_once('settings.php');
    
	$conn = @mysqli_connect($host,
		$user,
		$pwd,
		$sql_db
	);
  
	// Checks if connection is successful
	if (!$conn) {
		// Displays an error message
		echo "<p class=\"wrong\">Database connection failure</p>"; // Might not show in a production script 
	} else {
		// Upon successful connection
		
        $sql_table="quizresults";
	
		// Set up the SQL command to add the data into the table

        // $query_first = "select sid, score, attempt from $sql_table where sid = $ssearch and attempt = $selattempt";
        // $fetch = mysqli_query($conn, $query_first);

        $query = "update $sql_table set score = $newscore where sid = $ssearch and attempt = $selattempt";
		$result = mysqli_query($conn, $query) or die(mysqli_error());
    }
}
    ?>

</div>


<?php
include("footer.inc")  
?>

</body>
</html>