<?php
session_start();

// If user is already logged in, redirect to index.php
if (isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

// Check if login form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check credentials (validate against database)
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Assuming you have a database connection and a users table
    // Perform the necessary database query to validate user credentials

    // For demonstration purposes, let's assume the user "admin" with password "password" is valid
    if ($username === 'admin' && $password === 'password') {
        // Store user information in session
        $_SESSION['user_id'] = 1;
        $_SESSION['username'] = $username;

        // Redirect to the protected page
        header("Location: index.php");
        exit();
    } else {
        echo "Invalid username or password";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username" required><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br><br>
        <input type="submit" value="Login">
    </form>
</body>
</html>
