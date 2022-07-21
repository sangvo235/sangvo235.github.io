<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="description" content="Assignment 3 - Server-Side Programming" />
    <meta name="keywords" content="PHP, mySQL" />
    <link href ="styles/style.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap" rel="stylesheet">
    <script src="scripts/quiz.js"></script>
    <script src="scripts/enhancements.js"></script>
    <title>Mark Quiz</title>

    <!-- Description: Mark Quiz -->
    <!-- Author: Sang Vo -->
    <!-- Date: 20/05/22 -->

</head>
<body>
<div class="mark_heading">
	<h1>Mark Quiz</h1>
</div>

<div class="mark_retrieve">

<!--Begin processing-->
<?php

// Function to sanitise inputs 
function sanitise_input($data) {
    $data = strtolower($data);              // converts entry to lowercase
    $data = trim($data);                    // remove leading or trailing spaces
    $data = stripslashes($data);            // remove backslashes in front of quotes
    $data = htmlspecialchars($data);        // converts HTML control characters like < to the HTML code &lt;
    return $data;
}

function countattempt(){
    global $host, $user, $pwd, $sql_db, $sql_table, $firstname,
    $lastname, $studentid, $score, $attempt;
    $conn = mysqli_connect($host, $user, $pwd, $sql_db);

    $sql = "select attempt from $sql_table where sid = $sid"; 
    
    $result = mysqli_query($conn, $sql);

    if(!$result){
        echo "<p>Something went wrong with ", $sql, "</p>";
    }else{
        $row = mysqli_fetch_assoc($result);
        $row2 = $row['attempt'];
        $row2++;
        $attempt == $row2;
        echo "<p>$row2</p>";
    }
    return $attempt;

}

    $errMsg = "";

  // Check if process was triggered by a form submit, if not display an error message
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

    // Question 1
    if (isset ($_POST["question1"])) {
        $question1 = $_POST["question1"]; 
        $question1 = sanitise_input($question1);
    }

    // Question 2
    if (isset ($_POST["question2"])) {
        $question2 = $_POST["question2"]; 
        $question2 = sanitise_input($question2);
    }

    // Question 3
    if (isset ($_POST["question3"])) {
        $question3 = $_POST["question3"]; 
        $question3 = sanitise_input($question3);
    }

    // Question 4
    if (isset ($_POST["question4"])) {
        $question4 = $_POST["question4"]; 
        $question4 = sanitise_input($question4);
    }
    
    // Question 5
    if (isset ($_POST["question5"])) {
        $question5 = $_POST["question5"]; 
        $question5 = sanitise_input($question5);
    }

    // Student ID - Regular Expression
    if ($sid=="") {
        // .= equivalent to concatenate/append
        $errMsg .= "<p>You must enter a student ID number.</p>";
    }
    else if (!preg_match("/^([0-9]{7})$|(^[0-9]{10})$/", $sid)) {
        $errMsg .= "<p>You must enter a student ID number that is either 7 or 10 digits long.</p>";
    }
   
    // First Name - Regular Expression
    if ($firstname=="") {
        // .= equivalent to concatenate/append
        $errMsg .= "<p>You must enter your first name.</p>";
    }
    else if (!preg_match("/^[a-zA-Z -]{1,30}$/", $firstname)) {
        $errMsg .= "<p>Only alpha letters allowed in your first name.</p>";
    }

    // Last Name - Regular Expression
    if ($lastname=="") {
        $errMsg .= "<p>You must enter your last name.</p>";
    }
    else if (!preg_match("/^[a-zA-Z -]{1,30}$/", $lastname)) {
        $errMsg .= "<p>Only alpha letters allowed in your first name.</p>";
    }

    // Questions - Regular Expression
    if ($question1=="" || $question2=="" || $question3=="" || $question4=="" || $question5=="" ) {
        // .= equivalent to concatenate/append
        $errMsg .= "<p>You must answer every question.</p>";
    }

    // Error Message Output
    if ($errMsg != "") {
        echo "<p>$errMsg</p>";
    }   
    
    // If there is no error msg save entry onto database //    
if ($errMsg == "") { 

 # Calculation of score 
    $score = 0;
    if ($question1 == "active server pages" ) {
        $score++;
    }
    if ($question2 == "c#" ) {
        $score++;
    }
    if ($question3 == "multi") {
        $score+=0.5;
    }
    if ($question3 == "blocking" ) {
        $score+=0.5;     
    }
    if ($question4 == "microsoft" ) {
        $score++;
    }    
    if ($question5 == "macos" || $question5 == "windows" || $question5 == "linux") {
        $score++;
    }

// DATABASE CONNECTION //
    // db_details
    require_once('settings.php');

    // The @ operator suppresses the display of any error messages
    // mysqli_connect returns false if connection failed, otherwise a connection value
    $conn = @mysqli_connect($host,
        $user,
        $pwd,
        $sql_db
    );

    // Checks if connection is successful
    if (!$conn) {
        // Displays an error message, avoid using die() or exit() as this terminates the execution
        // of the PHP script
        echo "<p>Database connection failure</p>";  //Would not show in a production script 

    } else {
        // Upon successful connection
        
        // Get data from the form

        $sid = trim($_POST["sID"]);
        $fname = trim($_POST["firstname"]);
        $lname = trim($_POST["lastname"]);
        
        //Check the data - do more tests - not trust the user!

        $sql_table="quizresults";
        $fieldDefinition="attempt_id INT AUTO_INCREMENT PRIMARY KEY, date_time DATETIME, sid VARCHAR(10), fname VARCHAR(30), lname VARCHAR(30), score INT, attempt INT";

// CHECKING IF TABLE DOES NOT EXIST IN DATABASE ALREADY //
        // check: if table does not exist, create it
        $sqlString = "show tables like '$sql_table'";  // another alternative is to just use 'create table if not exists ...'
        $result = @mysqli_query($conn, $sqlString);
        // checks if any tables of this name
        if(mysqli_num_rows($result)==0) {
            echo "<p>Table does not exist - create table $sql_table</p>"; // Might not show in a production script 
            $sqlString = "create table " . $sql_table . "(" . $fieldDefinition . ")";; 
            $result2 = @mysqli_query($conn, $sqlString);
            // checks if the table was created
            if($result2===false) {
                echo "<p class=\"wrong\">Unable to create Table $sql_table.". msqli_errno($conn) . ":". mysqli_error($conn) ." </p>"; //Would not show in a production script 
            } else {
            // display an operation successful message
            echo "<p class=\"ok\">Table $sql_table created OK</p>"; //Would not show in a production script 
            } // if successful query operation

        } else {
            // display an operation successful message
            echo "<p>Table $sql_table already exists.</p>"; //Would not show in a production script 
        } // if successful query operation


    $conn = mysqli_connect($host, $user, $pwd, $sql_db);

    $checktable = "select * from $sql_table";
    $createtablefirsttime = mysqli_query($conn, $checktable);

    $queryattempt = "select max(attempt) from $sql_table where sid = $sid";
    $attemptresult = mysqli_query($conn,$queryattempt);

    if($row = mysqli_fetch_array($attemptresult)){
        $attempt = $row["max(attempt)"] + 1;
    }
    
    if ($attempt <= 2 && $score > 0) {
        // CREATION OF DATA IN TABLES //    
        // Set up the SQL command to add the data into the table
        $date_time = date('Y-m-d H:i:s');
        $query = "insert into $sql_table (sid, date_time, fname, lname, score, attempt) values ('$sid', '$date_time', '$fname', '$lname', '$score', '$attempt')";
        // execute the query
        $result = mysqli_query($conn, $query);
        // checks if the execution was successful
        if(!$result) {
            echo "<p class=\"wrong\">Something is wrong with ",	$query, "</p>";  //Would not show in a production script 
        } else {
            // display an operation successful message
            echo "<p class=\"ok\">Successfully added your quiz details!</p>";
        } // if successful query operation

        	// Set up the SQL command to add the data into the table
		$query = "select sid, fname, lname, score, attempt from $sql_table where sid like '$sid%' and attempt like '$attempt' order by sid, fname, lname, score, attempt";
        
        // $query = "insert into $sql_table (sid, date_time, fname, lname, score, attempt) values ('$sid', '$date_time', '$fname', '$lname', '$score', '$attempt')";

		// execute the query and store result into the result pointer
		$result = mysqli_query($conn, $query);
	
        // checks if the execuion was successful
		if(!$result) {
			echo "<p>Something is wrong with ",	$query, "</p>";
		} else {
            // Display the retrieved records
            echo "<table border=\"1\">";
            echo "<tr>\n"
                    ."<th scope=\"col\">Student ID</th>\n"
                    ."<th scope=\"col\">User Name</th>\n"
                    ."<th scope=\"col\">Score</th>\n"
                    ."<th scope=\"col\">Quiz Attempt</th>\n"
                    ."</tr>\n";
            // retrieve current record pointed by the result pointer
        
            while ($row = mysqli_fetch_assoc($result)){
                echo "<tr>";
                echo "<td>",$row["sid"],"</td>";
                echo "<td>",$row["fname"] . " " . $row["lname"],"</td>";  
                echo "<td>",$row["score"],"</td>";
                if ($row["attempt"] == 1) {
                    $link_quiz = 'quiz.php';
                    echo "<p><a href='".$link_quiz."'>Retry Quiz</a></p>";
                }
                echo "<td>",$row["attempt"],"</td>";
                echo "</tr>";
            }

            echo "</table>";

			// Frees up the memory, after using the result pointer
            mysqli_free_result($result);

		} // if successful query operation
        // close the database connection
        mysqli_close($conn);
        
    }  // if successful database connection 
    
    if ($attempt > 2) {
        $errMsg .= "<p>Sorry maximum of 2 attempts have been reached! :(</p>";
    }

    if ($score < 0.33) {
        $errMsg .= "<p>Sorry you recieved a score of 0! :(</p>";
    }
    

    if ($errMsg != "") {
        echo "<p>$errMsg</p>";
    }   

}
}

?>
</div>
</body>
</html>