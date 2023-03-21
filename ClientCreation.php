<?php
//Checks if the user has a current login session
checkForUser();
            function checkForUser(){
        session_start();
        if(!$_SESSION["user"]){
            header("Location: login.htm");
            die();
        }
    }

    //Uses seperate file to connect to database with credentials
include("db.php");


//WIPES all inputs for SQL Injection protection
$CFName = mysqli_real_escape_string($conn, $_POST['Fname']);
$CLName = mysqli_real_escape_string($conn, $_POST['Lname']);
$mailingAddress = mysqli_real_escape_string($conn, $_POST['Mailing_Address']);
$emailAddress = mysqli_real_escape_string($conn, $_POST['Email_Address']);
$phoneNumber = mysqli_real_escape_string($conn, $_POST['Phone_Number']);
$companyName = mysqli_real_escape_string($conn, $_POST['Company']);
$description = mysqli_real_escape_string($conn, $_POST['Description']);
$consent = $_POST['Consent'];
$brokerID = $_SESSION["user"];



//queries to insert and update specific tables to ensure data shows up in proper places
$query2 = "INSERT INTO client (Mailing_Address, Company_Name, Client_First_Name, Client_Last_Name, Email_Address, Phone_Number, Coverage_Review, Broker_ID, Notes)
 VALUES ('$mailingAddress','$companyName','$CFName','$CLName','$emailAddress','$phoneNumber','$Consent','$brokerID', '$description')";

 $query3 = "INSERT INTO client_location (Client_ID, Alias, Physical_Address, Answers_ID, Location_Phone) VALUES ('1', '$companyName', '$mailingAddress', '1', '$phoneNumber')";

 $query4 = "UPDATE client, client_location SET client_location.Client_ID = client.Client_ID WHERE client_location.Alias = client.Company_Name";

 $query5 = "INSERT INTO client_coverage (Contents) VALUES ('0')";
 //Ensures that all the queries are successful
if(mysqli_query($conn, $query2) && mysqli_query($conn, $query3) && mysqli_query($conn, $query4) && mysqli_query($conn, $query5)){
    header("Location: ClientLookup.php");
    echo '<script>alert("Client Created Successfully");<script>';
}
//Displays error if database cannot be modified 
else {
    echo "Error inserting Client";
}

?>
