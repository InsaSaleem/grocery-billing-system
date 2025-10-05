<?php
// MySQL connection details
$servername = "localhost";
$username = "root";         // Default username in XAMPP
$password = "";             // Default password in XAMPP is empty
$database = "grocery-billing-system";  // Change if your database has a different name

// Connect to MySQL
$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$conn) {
    die("❌ Connection failed: " . mysqli_connect_error());
}
?>