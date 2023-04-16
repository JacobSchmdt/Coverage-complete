<?php
    $servername = "localhost";
    $username = "root";
    $password = "Password1";
    $dbname = "coveragecompletedb";
    // Create connection
    global $conn; 
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
        echo "this dont work";
    }
?>