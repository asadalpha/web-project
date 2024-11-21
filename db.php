<?php
// Database configuration
$host = "localhost";        // Database host
$username = "root";         // Database username
$password = "";             // Database password
$dbname = "web-project";    // Database name

// Establish a database connection using MySQLi
$conn = new mysqli($host, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    // Log the error to a file (optional) and exit
    error_log("Database connection failed: " . $conn->connect_error);
    die("Database connection failed. Please try again later.");
}

// Set character set to UTF-8 for security and compatibility
if (!$conn->set_charset("utf8mb4")) {
    error_log("Error setting charset: " . $conn->error);
    die("Database connection error. Please contact the administrator.");
}

// Optional: Create a reusable query function (for cleaner queries)
function executeQuery($query, $params = [])
{
    global $conn; // Access the connection object
    $stmt = $conn->prepare($query);
    if (!$stmt) {
        error_log("Query preparation failed: " . $conn->error);
        die("An error occurred. Please try again later.");
    }

    if (!empty($params)) {
        // Dynamically bind parameters
        $stmt->bind_param(...$params);
    }

    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();

    return $result;
}

echo "Connected successfully!";
?>