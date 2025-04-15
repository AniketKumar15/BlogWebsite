<?php
$host = 'localhost';
$user = 'root'; // change if needed
$password = ''; // change if needed
$dbname = 'blogwebsite';
$table = 'users';

// Connect to MySQL server
$conn = new mysqli($host, $user, $password);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Create database if not exists
$db_check_query = "CREATE DATABASE IF NOT EXISTS $dbname";
if ($conn->query($db_check_query) === TRUE) {
  echo "Database ready.";
} else {
  die("Error creating database: " . $conn->error);
}

// Select the database
$conn->select_db($dbname);

// Check if table exists
$table_check_query = "SHOW TABLES LIKE '$table'";
$result = $conn->query($table_check_query);

if ($result->num_rows == 0) {
  // Create the users table
  $create_table_query = "
        CREATE TABLE $table (
            id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            username VARCHAR(50) NOT NULL UNIQUE,
            email VARCHAR(100) NOT NULL UNIQUE,
            password VARCHAR(255) NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )
    ";

  if ($conn->query($create_table_query) === TRUE) {
    echo "Table created.";
  } else {
    die("Error creating table: " . $conn->error);
  }
}

// Connection and setup done
// You can now use $conn for your queries

?>