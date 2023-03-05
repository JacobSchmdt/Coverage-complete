<?php

// Start the session
session_start();

$servername = "localhost";
$username = "root";
$password = "password1";
$dbname = "data1";

// Connect to the database
$db = new mysqli($servername, $username, $password, $dbname);

// Check if the user has submitted the form to create an account


// Check if the form has been submitted
if (isset($_POST['submit'])) {
  // Get the form data
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  // Check if the username and password are not empty
  if (empty($username) || empty($password)) {
    echo "Error: The username and password fields cannot be empty.";
  } else {
    // Hash the password
    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    // Check if the username already exists in the database
    $query = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($db, $query);
    if (mysqli_num_rows($result) > 0) {
      // The username already exists, so display an error message
      echo "Error: The username is already taken.";
    } else {
      // The username is available, so create the account
      $query = "INSERT INTO users (username, password) VALUES ('$username', '$password_hash')";
      mysqli_query($db, $query);
      echo "Your account has been created successfully.";
    }
  }
}
  // User does not have an account, display the form for creating an account
  echo "<form action='login.php' method='post'>
        <label for='username'>Username:</label>
        <input type='text' id='username' name='username' required>
        <label for='password'>Password:</label>
        <input type='password' id='password' name='password' required>
        <input type='submit' name='submit' value='Create Account'>
        </form>";
		echo "<a href='accountlogin.php'>Log In</a>";

?>