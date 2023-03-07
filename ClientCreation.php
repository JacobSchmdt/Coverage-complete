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

if (isset($_POST['save_multiple_checkbox'])) {

$nameInsured = mysqli_real_escape_string($conn, $_POST['Iname']);
$companyName = mysqli_real_escape_string($conn, $_POST['Company']);
$location = mysqli_real_escape_string($conn, $_POST['location']);
$business = mysqli_real_escape_string($conn, $_POST['businessType']);
$description = mysqli_real_escape_string($conn, $_POST['Description']);
$consent = $_POST['Consent'];

$allConsent = implode(", ",$consent);

if (empty($nameInsured) || empty($companyName) || empty($location) || empty($business) || empty($description) || empty($consent)) {
    echo "Error: Fields cannot be empty";
  } else {

$query = "INSERT INTO client (Name) VALUES ('$nameInsured')";

if(mysqli_query($conn, $query)){
    echo "Client Created Successfully";
    header("Location: ClientLookup.html");
}
else {
    echo "Error inserting Client";
}
}
}
?>
