<!DOCTYPE html>
<html>
<head>


<?php include
("db.php"); 
//opens database
 checkForUser();
 //makes sure user is logged in
 ?>

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
    //checks for the user, if not logged in sent back to the login screen


 //$id = $_GET['clientValue'];
 $id = $_SESSION["client"];
 $username = $_SESSION["user"];
 $sql = "SELECT Client_Name FROM client WHERE Client_ID='$id'";
 $result = mysqli_query($conn, $sql);
 $row = mysqli_fetch_assoc($result);
 //grabs the passed ID value and also the user name of the broker for the form

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
            echo $row['Name']; 
            //grabbed the name of the broker and displayed on the page
            echo "</td></tr>
            <tr><th>Client Code:</th><td>";
            $sql = "SELECT * FROM client WHERE Client_ID='$id'";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            echo $row['Client_ID']; echo "</td></tr>
            <tr><th>Name of holder:</th><td>";echo $row['Notes']; echo"</td></tr>
            <tr><th>Email:</th><td>";echo $row['Email_Address']; echo"</td></tr>
            <tr><th>Phone:</th><td>";echo $row['Phone_Number']; echo"</td></tr>
            <tr><th>Policy ID:</th><td>";
            //ignore this comment down here it was commented out because it will be used in a later version of the program
            //$sql = "SELECT * FROM policy, client_location WHERE policy.Location_ID = client_location.Location_ID AND client_location.Client_ID = '$id'"; 
            $sql = "SELECT * FROM policy, client_location WHERE policy.Location_ID = client_location.Location_ID AND client_location.Client_ID = '1'"; 
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            //this displays more client info
            echo $row['Policy_ID']; echo"</td></tr>
            <tr><th>Provider:</th><td>";echo $row['Alias']; echo "</td></tr>
        </table><br>
        <table border='1' bgcolor='white' class='lowerTable'>
            <tr><th>Coverage</th><th>Description</th><th>Amount Covered</th></tr>";
                $sqlSetup = "SELECT Coverage_ID FROM coverage";
                $resultSetup = $conn->query($sqlSetup);
                //grabs all the coverages avaliable
                while ($row = $resultSetup->fetch_assoc())  {
			        $coverageID = $row['Coverage_ID'];
                    lineLoop($coverageID, $id);
                }

                function lineLoop($coverageID, $id){
                    $sql = "SELECT * FROM coverage WHERE Coverage_ID=$coverageID";
                    $result = mysqli_query($GLOBALS['conn'], $sql);
                    $row = mysqli_fetch_assoc($result);
                    if ($result->num_rows > 0) { //displays coverage info and such
                            $sql2 = "SELECT * FROM client_coverage WHERE Client_ID = $id";
                            $result2 = mysqli_query($GLOBALS['conn'], $sql2);
                            $row2 = mysqli_fetch_assoc($result2);
                            $placeholder = $row2[$row['Coverage_Name_Insert']];
                            if ($row2[$row['Coverage_Name_Insert']] > 0){
                                echo "<tr><td>"; echo $row['Coverage_Name']; echo"</td>
                                <td>"; echo $row['Coverage_Description']; echo"</td>
                                <td>$";
                                if ($placeholder >= 1000000000) echo round(($placeholder/1000000000), 2).' billion';
                                elseif ($placeholder >= 1000000) echo round(($placeholder/1000000), 2).' million';
                                elseif ($placeholder >= 1000) echo round(($placeholder/1000), 2).'K';
                                echo"</td>";
                    }       }
                }
        echo "</table>
    </div>";
?>
</body>

</html>