<?php

session_start();

include("db.php");
// Check if the form has been submitted
if (isset($_POST['submit'])) {

    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    if (empty($username) || empty($password)) {
        echo "Error: The username and password fields cannot be empty.";
      } else {
    $password_hash = password_hash($password, PASSWORD_DEFAULT);

// Query the database to check if the user exists and the password is correct
$query = "SELECT count(*) as total FROM users WHERE User_Name = '".$username."' AND Pass_Word = '".$password_hash."'";
$result = $db->query($query);

// If the query returns a result, the user exists and the password is correct
if ($result->num_rows > 0) {
	$_SESSION['userID'] = $username;
// Approve the login
header("Location: ClientLookup.html");
die;
} else {
// The login credentials are incorrect
echo "Incorrect username or password. Please try again.";
}
}
}
?>


