<?php

// Start the session

include("db.php");

// Check if the user has submitted the form to create an account


// Check if the form has been submitted
if (isset($_POST['submit'])) {
  // Get the form data
  $username = mysqli_real_escape_string($conn, $_POST['Uname']);
  $password = mysqli_real_escape_string($conn, $_POST['Password']);

  // Check if the username and password are not empty
  if (empty($username) || empty($password)) {
    echo "Error: The broker and password fields cannot be empty.";
  } else {
    // Hash the password
    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    // Check if the username already exists in the database
    $query = "SELECT * FROM user WHERE User_Name = '$username'";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0) {
      // The username already exists, so display an error message
      echo "Error: Broker exists already.";
    } else {
      // The username is available, so create the account
      $query = "INSERT INTO user (User_Name, Pass_Word) VALUES ('$username', '$password_hash')";
      mysqli_query($conn, $query);
	  header("Location: Login.htm");
      echo "Your account has been created successfully.";
	  
    }
  }
}
?>
