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
    <title>Quiz Supervisor Queries</title>
</head>

<body>
<?php
include("menu.inc")  
?>
<div class="searching_heading">
<h1>Search for student attempts below!</h1>
</div>

<div class="search_box">
<form method="post" action="list_student.php">
	<fieldset>
        <legend>Student Search</legend>
        <p>	<label for="ssearch">Student Details: </label>
			<input type="text" name="ssearch" id="ssearch" placeholder="Enter student id, first name or last name..." size="30"/></p>
		<p>	<input type="submit" value="Search" /></p>
	</fieldset>
</div>
</form>

    
<div class="list_student">
<?php

// Set up the SQL command to add the data into the table


// CHECK IF ENTRIES EXIST //
// Student ID
if (isset($_POST["ssearch"])){
	$ssearch = htmlspecialchars($_POST["ssearch"]);
    

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
        $query = "select attempt_id, date_time, sid, fname, lname, score, attempt from $sql_table where sid like '%$ssearch%'
            or fname like '%$ssearch%'
            or lname like '%$ssearch%'";

		// execute the query and store result into the result pointer
		$result = mysqli_query($conn, $query);


// DISPLAY SEARCH RESULTS //
		// checks if the execuion was successful
		if(!$result) {
			echo "<p class=\"wrong\">Something is wrong with ",	$query, "</p>";
		} else {
		if(mysqli_num_rows($result)>0) {
			// Display the retrieved records
			echo "<table border=\"1\">";
			echo "<tr>\n"
                 ."<th scope=\"col\">Attempt ID</th>\n"
                 ."<th scope=\"col\">Date & Time</th>\n"
				 ."<th scope=\"col\">Student ID</th>\n"
			     ."<th scope=\"col\">First Name</th>\n"
				 ."<th scope=\"col\">Last Name</th>\n"
				 ."<th scope=\"col\">Score</th>\n"
                 ."<th scope=\"col\">Attempt</th>\n"
				 ."</tr>\n";
			// retrieve current record pointed by the result pointer
			
			while ($row = mysqli_fetch_assoc($result)){
				echo "<tr>";
                echo "<td>",$row["attempt_id"],"</td>";
				echo "<td>",$row["date_time"],"</td>";
				echo "<td>",$row["sid"],"</td>";
				echo "<td>",$row["fname"],"</td>";  
				echo "<td>",$row["lname"],"</td>";
				echo "<td>",$row["score"],"</td>";
                echo "<td>",$row["attempt"],"</td>";
				echo "</tr>";
			}
			echo "</table>";
			// Frees up the memory, after using the result pointer
			mysqli_free_result($result);
		} // if successful query operation
		} // end if no rows
		// close the database connection
		mysqli_close($conn);
	} // if successful database connection
}

?>

</div>


<?php
include("footer.inc")  
?>

</body>
</html>