<!DOCTYPE html>
<html lang="en">
<head>
<?php 
include("db.php");
checkForUser();
 if (isset ($_GET['clientValue'])){
	$id1 = $_GET['clientValue'];
    $_SESSION["client"] = $id1;}
    $id =  $_SESSION["client"];
 $sql = "SELECT * FROM client, client_location WHERE client.Client_ID = client_location.Client_ID AND client.Client_ID='$id'";
 $result = mysqli_query($conn, $sql);
 $row = mysqli_fetch_assoc($result);
?>
<link rel="stylesheet" href="Menu.css">

<body style="background-color:#5168ac;" text="white"> 
<title>Joel Reimer</title>
<meta charset="utf-8">
</head>
<section class="header">
    <h1>Schwartz Reliance Insurance</h1>

</section>
<body>
<div class="nav"> 
    <h2>Client Menu</h2>
    <?php
    echo "<h3> Client: " . $row['Client_First_Name'] . " " . $row['Client_Last_Name'] . "</h3>";
    echo "<h3> Company: " . $row['Alias'] . "</h3>"; 
    echo "<h3> Customer ID: " . $row['Client_ID'] . "</h3>"; 
    ?>
    <div class="Menu">
        <div class="Menu">
            <button class="button" onclick="document.location='CoverageList.php'"style="vertical-align: middle;"><span>Coverage List</span></button><br><br>
            <button class="button" onclick="document.location='ClientEdit.php'"style="vertical-align: middle;"><span>Edit Client</span></button><br><br>
            <button class="button" onclick="document.location='ClientLookup.php'"style="vertical-align: middle;"><span>Client Lookup</span></button><br><br>
        </div>
    </div>
</div>
<?php 
function checkForUser(){
    session_start();
    if(!$_SESSION["user"]){
        header("Location: login.htm");
        die();
    }
}

?>
</html>




