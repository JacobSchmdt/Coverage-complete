<?php
session_start();

include("db.php");

if (isset($_POST['save_multiple_checkbox'])) {

$nameInsured = mysqli_real_escape_string($db, $_POST['Iname']);
$companyName = mysqli_real_escape_string($db, $_POST['Company']);
$location = mysqli_real_escape_string($db, $_POST['location']);
$business = mysqli_real_escape_string($db, $_POST['businessType']);
$description = mysqli_real_escape_string($db, $_POST['Description']);
$consent = $_POST['Consent'];

$allConsent = implode(", ",$consent);

if (empty($nameInsured) && empty($companyName) && empty($location) && empty($business) && empty($description) && empty($consent)) {
    echo "Error: Fields cannot be empty";
  } else {

$query = "INSERT INTO client (clientName, companyName, locationName, businessType, clientDescription, consentData) VALUES ('$nameInsured', '$companyName', '$location', '$business', '$description', '$allConsent')";

if(mysqli_query($db, $query)){
    echo "Client Created Successfully";
    header("Location: ClientLookup.html");
}
else {
    echo "Error inserting Client";
}
}
}
?>
