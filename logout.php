<?php
session_start();
session_unset();
session_destroy();
setcookie("user", "", time() - 3600, "/"); // Clear cookie
header("Location: login/login.php");
exit();
?>