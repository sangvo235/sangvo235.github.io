<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="description" content="Login Page" />
    <meta name="keywords" content="HTML, CSS, ASP.NET" />
    <meta name="author" content="Sang Vo"  />
    <link href ="styles/style.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap" rel="stylesheet">
    <script src="scripts/quiz.js"></script>
    <script src="scripts/enhancements.js"></script>
    <title>Login Page</title>
</head>
<body>
<?php
include("header.inc")  
?>

<div class="searching_heading">
	<h1>All attempts are listed below!</h1> 
</div>

<div class="login_page">
    <form method="post" action="user_login.php">
        <fieldset>
            <legend>Supervisor Page</legend>
            <p>	<label for="myusername">Username: </label>
                <input type="text" name="myusername" id="myusername" /></p>
                <p>	<label for="mypassword">Password: </label>
                <input type="text" name="mypassword" id="mypassword" /></p>
            <p>	<input type="submit" value="Login" /></p>
        </fieldset>
    </form>
</div>


<?php

if(isset($_POST['myusername']) and isset($_POST['mypassword'])) {

    // username and password sent from form
    $myusername = trim($_POST['myusername']);
    $mypassword = trim($_POST['mypassword']);

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
		
	    $sql_table="userpw";
		
		// Set up the SQL command to add the data into the table
		$query = "select username, password from $sql_table where username ='$myusername' and password ='$mypassword'";
			
		// execute the query and store result into the result pointer
		$result = mysqli_query($conn, $query);

    // Mysql_num_row is counting table row
    if(mysqli_num_rows($result)>0) {

        header("location:manage.php");
    
    } else {

        echo "Wrong Username or Password";
        
        // // redirect to login page
        // header("location:user_login.php");
    }

}

if (!isset($_POST['myusername']) || !isset($_POST['mypassword'])) {
     // if username and password are not in $_POST do something else
     echo "<p>No username or password supplied!</p>";

    // redirect to login page
    header("location:user_login.php");
}
}

?>

<?php
include("footer.inc")  
?>

</body>
</html>