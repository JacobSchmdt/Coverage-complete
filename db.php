<?php
	session_start();
    $servername = "localhost";
    $username = "root";
    $password = "Password1";
    $dbname = "coveragecompletedb";
    // Create connection
    global $conn; 
    $conn = mysqli_connect($servername, $username, $password, $dbname);
//    global $brokerUser;
//    $brokerUser = 'RenzCatt';
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
        echo "this bitch dont work";
    }
?>