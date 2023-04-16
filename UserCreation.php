<!DOCTYPE html>
<html lang="en">
<head>
<?php
include("db.php");
//opens database
checkForUser();
//does user check
?>
    <title>User Creation</title>
    <link rel="stylesheet" href="login.css">
    <meta charset="utf-8">
</head>
<section class="header">
    <h1>Swartz Reliance Insurance</h1>
</section>
<body>
    <div class="nav">
        <div class="Image">
            <image src="logo.jpg" alt="" height="200px" width="200px"></image>
        </div>
        <div class="LoginBox">
            <form action='' method='post'>
                <label for='username'>Username:</label>
                <input type='text' id='username' name='username' required>
                <br></br>
                <label for='password'>Password:</label>
                <input type='password' id='password' name='password' required>
				<br>
				<label for='username'>Confirm:</label>
				<input type='password' id='passwordconfirm' name='passwordconfirm' required>
                <br><br>
				<label for='username'>Name:</label>
				<input type='test' id='name' name='name' required>
                <br>
                <label for='username'>Phone Number:</label>
				<input type='number' id='phone' name='phone' required>
                <br>
				<label for='info'>Lethbridge:</label>
				<input type="radio" id="Lethbridge" name="city[]" value="Lethbridge" required>
				<label for='info'>Coaldale:</label>
				<input type="radio" id="Coaldale" name="city[]" value="Coaldale">
                <br><br>
				<label for='username'>Admin:</label>
				<input type="radio" id="Admin" name="usertype[]" value="Admin" required>
				<br>
				<label for='username'>Broker:</label>
				<input type="radio" id="User" name="usertype[]" value="Broker">
				<br>
				<br>
                <input type='submit' name='submit' value='Create Account'>
                <button class="button" onclick="document.location='logOut.php'"style="vertical-align: middle;"><span>Log Out</span></button><br><br>
            </form>
        </div>
    </div>
</body>

</html>
</form>
</body>
<?php 

            function checkForUser(){
        session_start();
        if(!$_SESSION["user"]){
            header("Location: login.htm");
            die();
        }
    }

if (isset($_POST['submit'])) {
  // Get the form data
  $username = mysqli_real_escape_string($conn, $_POST['username']);
  $password = mysqli_real_escape_string($conn, $_POST['password']);
  $passwordConfirm = mysqli_real_escape_string($conn, $_POST['passwordconfirm']);
  $selectedUser = $_POST['usertype'];
  $selectedCity = $_POST['city'];
  $name = mysqli_real_escape_string($conn, $_POST['name']);
  $phone = mysqli_real_escape_string($conn, $_POST['phone']);
  $userString = implode(",", $selectedUser);
  $cityString = implode(",", $selectedCity);
  $default2 = "bot";
  $default3 = "bot";
  $default4 = "123";

  // Check if the username and password are not empty
if (empty($username) || empty($password) || empty($passwordConfirm)) {
  echo "Error: The input fields cannot be empty.";
} elseif ($password != $passwordConfirm){
    echo "Password fields need to be the same";
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
      $query = "INSERT INTO user (User_Name, Pass_Word, User_Type, Name, Physical_Address, Email_Address, Phone_Number) VALUES ('$username', '$password_hash', '$userString', '$name', '$cityString', '$default3', '$phone')";
      mysqli_query($conn, $query);
	  header("Location: Menu.php");
      
	  
    }
  }
}

?>
</html>