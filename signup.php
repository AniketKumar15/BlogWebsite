<?php
include("./Components/db_connect.php");

// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  // Get form data
  $username = trim($_POST['username']);
  $email = trim($_POST['email']);
  $password = $_POST['password'];
  $confirm_password = $_POST['confirm_password'];

  // Basic validation
  if (empty($username) || empty($email) || empty($password) || empty($confirm_password)) {
    die("Please fill in all required fields.");
  }

  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die("Invalid email format.");
  }

  if ($password !== $confirm_password) {
    die("Passwords do not match.");
  }

  // Check if username or email already exists
  $stmt = $conn->prepare("SELECT id FROM users WHERE username = ? OR email = ?");
  $stmt->bind_param("ss", $username, $email);
  $stmt->execute();
  $stmt->store_result();

  if ($stmt->num_rows > 0) {
    die("Username or email already exists.");
  }
  $stmt->close();

  // Hash password
  $hashed_password = password_hash($password, PASSWORD_DEFAULT);

  // Insert new user
  $insert = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
  $insert->bind_param("sss", $username, $email, $hashed_password);

  if ($insert->execute()) {
    echo "<script>
        alert('Account Created Successfully');
        window.location.href = 'index.php';
      </script>";

    // Optionally redirect to login or dashboard page
    // header("Location: login.php");
  } else {
    echo "Error: " . $insert->error;
  }

  $insert->close();
  $conn->close();
} else {
  echo "Invalid request.";
}
?>