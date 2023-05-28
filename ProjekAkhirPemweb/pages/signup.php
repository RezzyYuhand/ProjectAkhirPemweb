<?php
class DatabaseConnection {
    private $host = 'localhost';
    private $database = 'projectakhir';
    private $username = 'root';
    private $password = 'hasfirasya'; // Replace with your actual database password

    private $connection;

    public function __construct() {
        // Create a connection
        $this->connection = new mysqli($this->host, $this->username, $this->password, $this->database);

        // Check if the connection was successful
        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        }
    }

    public function signup($email, $password, $username) {
        // Prepare the SQL statement
        $stmt = $this->connection->prepare("INSERT INTO project (email, password, username) VALUES (?, ?, ?)");

        // Bind the parameters
        $stmt->bind_param("sss", $email, $password, $username);

        // Execute the statement
        if ($stmt->execute()) {
            echo "Signup successful!";
        } else {
            echo "Error: " . $stmt->error;
        }
    }

    public function closeConnection() {
        // Close the connection
        $this->connection->close();
    }
}

// Create an instance of the DatabaseConnection class
$db = new DatabaseConnection();

// Check if the signup form was submitted
if (isset($_POST['signup-button'])) {
    // Get the form data
    $email = $_POST['email'];
    $password = $_POST['password'];
    $username = $_POST['username'];

    // Call the signup method to insert the data into the database
    $db->signup($email, $password, $username);

    //redirect tp login.html after successful
    header("Location: login.html");
    exit;
}

// Close the database connection
$db->closeConnection();
?>
