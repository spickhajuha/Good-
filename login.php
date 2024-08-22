<?php
  // Connect to MySQL database
  $conn = mysqli_connect("localhost", "username", "password", "database");

  // Check connection
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }

  // Collect form data
  $email = $_POST["email"];
  $password = $_POST["password"];

  // Validate data
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Invalid email format";
    exit;
  }

  // Store data in database
  $sql = "INSERT INTO users (email, password) VALUES ('$email', '$password')";
  if (mysqli_query($conn, $sql)) {
    echo "Login successful";
  } else {
    echo "Error: " . mysqli_error($conn);
  }

  // Close connection
  mysqli_close($conn);
?>