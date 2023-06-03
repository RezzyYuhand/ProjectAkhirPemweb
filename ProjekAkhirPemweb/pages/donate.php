<?php
// Check if the form is submitted
if(isset($_POST['tombol-donate'])) {
  // Retrieve the username and donation amount from the form
  $username = $_POST['username'];
  $donationAmount = $_POST['amount'];

  // Validate the input (you can add more validation if needed)
  if (empty($username) || empty($donationAmount)) {
    echo 'Please enter a username and donation amount.';
    exit;
  }

  // Create a connection to the database (replace with your database credentials)
  $servername = 'localhost';
  $usernameDB = 'root';
  $passwordDB = 'hasfirasya';
  $dbname = 'projectakhir';

  $conn = new mysqli($servername, $usernameDB, $passwordDB, $dbname);

  // Check the connection
  if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
  }

  // Sanitize the user input
  $username = mysqli_real_escape_string($conn, $username);
  $donationAmount = mysqli_real_escape_string($conn, $donationAmount);

  // Prepare a statement to select the donate column based on the username
  $stmt = $conn->prepare("SELECT donate FROM project WHERE username = ?");
  $stmt->bind_param("s", $username);
  $stmt->execute();
  $result = $stmt->get_result();

  // Check if the username exists in the table
  if ($result->num_rows > 0) {
    // Fetch the current donation amount
    $row = $result->fetch_assoc();
    $currentDonation = $row['donate'];

    // Calculate the new donation amount
    $newDonation = $currentDonation + $donationAmount;

    // Prepare the SQL query to update the donate column with the new donation amount
    $sql = "UPDATE project SET donate = ? WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("is", $newDonation, $username);

    // Execute the query
    if ($stmt->execute()) {
      echo 'Donation added successfully.';
    } else {
      echo 'Error adding donation: ' . $stmt->error;
    }

    // Close the statement
    $stmt->close();
  } else {
    echo 'Username not found in the database.';
  }

  // Close the database connection
  $conn->close();
}
?>