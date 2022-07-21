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
    <title>Delete Student Attempts</title>
</head>

<body>
<?php
include("menu.inc")  
?>
<div class="searching_heading">
<h1>Delete student attempts below!</h1>
</div>

<form method="post" action="list_delete.php">
	<fieldset>
        <legend>Student Search</legend>
        <p>	<label for="ssearch">Student ID: </label>
			<input type="text" name="ssearch" id="ssearch" placeholder="Please enter a student id..." /></p>
		<p>	<input type="submit" value="Search" /></p>
	</fieldset>
</form>

    
<div class="list_student">
<?php

// Set up the SQL command to add the data into the table


// CHECK IF ENTRIES EXIST //
// Student ID
if (isset($_POST["ssearch"])){
	$ssearch = htmlspecialchars($_POST["ssearch"]);

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

        $query_first = "select sid from $sql_table where sid = $ssearch";
        $fetch = mysqli_query($conn, $query_first);

        while($row=mysqli_fetch_array($fetch)) {

            if($row[0] == $ssearch) {
                $flag = 1;
            }
        }

        if ($flag==1) {
        $query = "delete from $sql_table where sid = $ssearch";
		$result = mysqli_query($conn, $query) or die(mysqli_error());
        echo "<p>Entry succesfully deleted</p>";
        }
        else
        {
            echo "Entry with this ID not found";
        }
    }
}
    ?>

</div>


<?php
include("footer.inc")  
?>

</body>
</html>