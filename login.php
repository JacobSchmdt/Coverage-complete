<?php
session_start(); // Start session

// Check if form is submitted
if (isset($_POST['submit'])) {

    // Include database connection
    require_once 'db.php';

    // Sanitize user input
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Check if fields are empty
    if (empty($username) || empty($password)) {
        $_SESSION['error'] = "Username and password are required.";
        header("Location: Login.htm");
        exit();
    }

    // Hash the password
    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    // Check if username and password match
    $sql = "SELECT * FROM users WHERE username='$username' AND password='$hashed_password'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        // Login successful
        $row = mysqli_fetch_assoc($result);
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['username'] = $row['username'];
        header("Location: ClientCreation.html");
        exit();
    } else {
        // Login failed
        $_SESSION['error'] = "Invalid username or password.";
        header("Location: Login.htm");
        exit();
    }
} else {
    header("Location: Login.htm");
    exit();
}
?>
