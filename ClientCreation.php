<?php
//session_start();
checkForUser();
            function checkForUser(){
        session_start();
        if(!$_SESSION["user"]){
            header("Location: login.htm");
            die();
        }
    }
include("db.php");

//if (isset($_POST['save_multiple_checkbox'])) {

$nameInsured = mysqli_real_escape_string($conn, $_POST['Iname']);
$mailingAddress = mysqli_real_escape_string($conn, $_POST['Mailing_Address']);
$emailAddress = mysqli_real_escape_string($conn, $_POST['Email_Address']);
$phoneNumber = mysqli_real_escape_string($conn, $_POST['Phone_Number']);
$companyName = mysqli_real_escape_string($conn, $_POST['Company']);
$description = mysqli_real_escape_string($conn, $_POST['Description']);
$consent = $_POST['Consent'];

//$allConsent = implode(", ",$consent);



$query = "INSERT INTO client (Mailing_Address, Company_Name, Client_Name, Email_Address, Phone_Number, Coverage_Review, Notes)
 VALUES ('$mailingAddress','$companyName','$nameInsured','$emailAddress','$phoneNumber','$allConsent','$nameInsured')";
 
//$query = "INSERT INTO client_location "

//$query= "INSERT INTO policy "

if(mysqli_query($conn, $query)){
    echo "Client Created Successfully";
    header("Location: ClientLookup.php");
}
else {
    echo "Error inserting Client";
}

?>
