<?php
session_start();

// Check if user is logged in, if not, redirect to login page
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// User is logged in, display content
echo "Welcome, ".$_SESSION['username']."! This is the protected page.";
?>
<br>
<a href="logout.php">Logout</a>
