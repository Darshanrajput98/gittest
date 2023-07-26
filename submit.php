<?php
session_start();
$servername = "localhost"; // Replace with your server name
$username = "darshan"; // Replace with your MySQL username
$password = "root123"; // Replace with your MySQL password
$dbname = "feedback"; // Replace with your MySQL database name

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}


// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // Get form data
  $name = $_POST['name'];
  $email = $_POST['email'];
  $message = $_POST['message'];

  // Insert data into MySQL database
  $sql = "INSERT INTO userdata (name, email, message) VALUES ('$name', '$email', '$message')";
  if (mysqli_query($conn, $sql)) {
    $_SESSION['success'] = "Feedback submitted successfully";
  } else {
    $_SESSION['error'] = "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
}

// Redirect back to the contact page
header("Location: index.html#contact");
?>
