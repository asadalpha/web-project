<?php
session_start();

// Auto-login using cookies
if (!isset($_SESSION['user_id']) && isset($_COOKIE['user_id'])) {
    // Regenerate session ID to prevent session fixation attacks
    session_regenerate_id(true);

    // Assign values from cookies to session variables
    $_SESSION['user_id'] = $_COOKIE['user_id'];
    $_SESSION['first_name'] = $_COOKIE['first_name'];
}

// Optional: Set cookies securely (for new logins)
if (isset($_SESSION['user_id']) && !isset($_COOKIE['user_id'])) {
    $cookie_lifetime = 86400 * 30; // 30 days
    setcookie('user_id', $_SESSION['user_id'], time() + $cookie_lifetime, '/', '', true, true); // HttpOnly, Secure, SameSite
    setcookie('first_name', $_SESSION['first_name'], time() + $cookie_lifetime, '/', '', true, true); // HttpOnly, Secure, SameSite
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Hotel Booking System</title>
    <link href="style.css" rel="stylesheet" />
</head>
<body>
    <nav>
        <div class="nav-logo">Allure</div>
        <ul class="nav-links">
            <?php if (isset($_SESSION['user_id'])): ?>
                <li>Welcome, <?php echo htmlspecialchars($_SESSION['first_name']); ?></li>
                <li><a href="logout.php">Logout</a></li>
            <?php else: ?>
                <li><a href="login.html">Login</a></li>
            <?php endif; ?>
        </ul>
    </nav>
</body>
</html>
