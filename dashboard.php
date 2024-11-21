<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect to login page if user is not logged in
    header("Location: login.php");
    exit();
}

// Optionally, sanitize the session data
$fname = isset($_SESSION['fname']) ? htmlspecialchars($_SESSION['fname'], ENT_QUOTES, 'UTF-8') : 'Guest';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>

<body>
    <h1>Welcome, <?php echo $fname; ?>!</h1>
    <p>Your session ID is: <?php echo session_id(); ?></p>
    <a href="logout.php">Logout</a>
    <hr>
    <!-- Include index.html content here -->
    <?php include 'index.html'; ?>
</body>

</html>