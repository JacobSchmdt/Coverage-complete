<?php
session_start();

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

$query = "
INSERT INTO client (Name, Review_Consent) VALUES ('$nameInsured', '$allConsent');
INSERT INTO location_category (Client_Location, Business_Type) VALUES ('$location', '$business');
INSERT INTO client_location (Alias) VALUES ('$companyName');
INSERT INTO option (Description) VALUES ('$description');
";

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
