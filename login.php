<?php
session_start();
include("./Components/db_connect.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $username = trim($_POST['username']);
  $password = $_POST['password'];

  // Validate inputs
  if (empty($username) || empty($password)) {
    die("Please enter both username and password.");
  }

  // Check if user exists
  $stmt = $conn->prepare("SELECT id, username, password FROM users WHERE username = ?");
  $stmt->bind_param("s", $username);
  $stmt->execute();
  $stmt->store_result();

  if ($stmt->num_rows === 1) {
    $stmt->bind_result($id, $dbUsername, $hashedPassword);
    $stmt->fetch();

    if (password_verify($password, $hashedPassword)) {
      // Success — set session
      $_SESSION['user_id'] = $id;
      $_SESSION['username'] = $dbUsername;

      echo "<script>
                alert('Login successful!');
                window.location.href = 'index.php';
            </script>";
    } else {
      echo "<script>alert('Incorrect password.');</script>";
    }
  } else {
    echo "<script>alert('User not found.');</script>";
  }

  $stmt->close();
  $conn->close();
} else {
  echo "Invalid request.";
}
?>