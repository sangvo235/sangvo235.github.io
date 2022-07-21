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

<h1>Students who recieved 100% on first attempt!</h1> 

<div class="list_all">
<?php
// Function to sanitise inputs 
function sanitise_input($data) {
    $data = trim($data);                // remove leading or trailing spaces
    $data = stripslashes($data);        // remove backslashes in front of quotes
    $data = htmlspecialchars($data);    // converts HTML control characters like < to the HTML code &lt;
    return $data;
}


// CHECK IF ENTRIES EXIST //
// Student ID
if (isset ($_POST["sID"])) {
    $sid = $_POST["sID"];
    $sid = sanitise_input($sid);
}

// First Name
if (isset ($_POST["firstname"])) {
    $firstname = $_POST["firstname"];
    $firstname = sanitise_input($firstname);
}

// Last Name
if (isset ($_POST["lastname"])) {
    $lastname = $_POST["lastname"];
    $lastname = sanitise_input($lastname);
}  

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
		$query = "select sid, fname, lname, score, attempt from $sql_table where score in (5) and attempt in (1) order by sid";
			
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
				 ."<th scope=\"col\">Student ID</th>\n"
			     ."<th scope=\"col\">First Name</th>\n"
				 ."<th scope=\"col\">Last Name</th>\n"
				 ."</tr>\n";
			// retrieve current record pointed by the result pointer
			
			while ($row = mysqli_fetch_assoc($result)){
				echo "<tr>";
				echo "<td>",$row["sid"],"</td>";
				echo "<td>",$row["fname"],"</td>";  
				echo "<td>",$row["lname"],"</td>";
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
		
?>
</div>


<?php
include("footer.inc")  
?>

</body>
</html>