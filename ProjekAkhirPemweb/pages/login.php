<?php
$host = 'localhost';
$database = 'projectakhir';
$username = 'root';
$password = 'hasfirasya';

// Create a connection
$connection = new mysqli($host, $username, $password, $database);

// Check if the connection was successful
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// Retrieve the submitted username/email and password from the form
$usernameEmail = $_POST['username'];
$password = $_POST['password'];

// Perform any necessary validation or sanitization on the input data

// Query the database to check if the credentials are valid
$sql = "SELECT * FROM project WHERE (username = '$usernameEmail' OR email = '$usernameEmail') AND password = '$password'";
$result = $connection->query($sql);

// Check if a matching record is found
if (mysqli_num_rows($result) == 1) {
    // Redirect to home.html
    header("Location: home.html");
    exit;
} 
else {
    echo "Invalid username or password";
}
// Close the database connection
$connection->close();
?>




