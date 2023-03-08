<!DOCTYPE html>
<html>
<head>


<?php include("db.php"); ?>
<?php checkForUser(); ?>

    <title>Coverage Report</title>
    <!--<link rel="stylesheet" type="text/css" href="/CoverageReport.css">-->
    <style>
            button {
                transition-delay: 0.1s;
                cursor: pointer;
            }
            button:hover {
                background-color: #FFFFFF;
                color: black;
            }
            button.backButton {
                background-color: #6591C3;
                color: white;
                float: right;
                border: none;
                padding: 12px;
            }			
        .sriHeading {
            text-align: right;
            width: 100%;
            background-color: #5168AC;
        }

        .upperTable {
            text-align: left;
            width: 100%;
        }

        td {
            border-bottom: 1px solid black;
        }

        .lowerTable {
            text-align: center;
            width: 100%;
        }
        button.clientLocationButton {
            background-color: #6591C3;
            color: white;
            border: none;
            padding: 12px 60px;
        }		
    </style>
</head>
<?php
    function checkForUser(){
        session_start();
        if(!$_SESSION["user"]){
            header("Location: login.htm");
            die();
        }
    } 



 $id = $_GET['clientValue'];
 $username = $_SESSION["user"];
 $sql = "SELECT Client_Name FROM client WHERE Client_ID='$id'";
 $result = mysqli_query($conn, $sql);
 $row = mysqli_fetch_assoc($result);

echo"
<body style='background-color: #5168AC;'>
    <div class='sriHeading'><h1>Schwartz Reliance Insurance</h1></div>
    <div style='background-color: lightgray;'>
	<form method='get' action='CoverageList.php'>
    <input type='hidden' name='clientValue' value='$id'>
	<input type='submit' name='' value='Back'>
	</form>
    <a href='logOut.php'><button type='button' class='clientLocationButton'>Log Out</button></a>
        <table class='upperTable'>
            <tr><th>Client:</th><td>"; echo $row['Client_Name']; echo"</td><th>Broker:</th><td>";
            $sql = "SELECT Name FROM user WHERE User_Name='$username';";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            echo $row['Name']; echo "</td></tr>
            <tr><th>Client Code:</th><td>";
            $sql = "SELECT * FROM client WHERE Client_ID='$id'";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            echo $row['Client_ID']; echo "</td></tr>
            <tr><th>Name of holder:</th><td>";echo $row['Notes']; echo"</td></tr>
            <tr><th>Email:</th><td>";echo $row['Email_Address']; echo"</td></tr>
            <tr><th>Phone:</th><td>";echo $row['Phone_Number']; echo"</td></tr>
            <tr><th>Policy ID:</th><td>";
            $sql = "SELECT * FROM policy, client_location WHERE policy.Location_ID = client_location.Location_ID AND client_location.Client_ID = '$id'"; 
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            echo $row['Policy_ID']; echo"</td></tr>
            <tr><th>Provider:</th><td>";echo $row['Alias']; echo "</td></tr>
        </table><br>
        <table border='1' bgcolor='white' class='lowerTable'>
            <tr><th>Coverage</th><th>Description</th><th>Amount Covered</th></tr>
        </table>
    </div>";
?>
</body>

</html>