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
        @media print
{    
    .no-print, .no-print *
    {
        display: none !important;
    }
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
 $sql = "SELECT * FROM client, client_location WHERE client.Client_ID = client_location.Client_ID AND client.Client_ID=$id";
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
    <a href='logOut.php'><button type='button' class='clientLocationButton' media='print'>Log Out</button></a>
        <table class='upperTable'>
            <tr><th>Client:</th><td>"; echo $row['Client_First_Name'] . " " . $row['Client_Last_Name']; echo"</td><th>Broker:</th><td>";
            $sql2 = "SELECT Name FROM user WHERE User_Name='$username';";
            $result2 = mysqli_query($conn, $sql2);
            $row2 = mysqli_fetch_assoc($result2);
            echo $row2['Name']; 
            //grabbed the name of the broker and displayed on the page
            echo "</td></tr>
            <tr><th>Customer ID:</th><td>";
            echo $row['Client_ID']; echo "</td></tr>
            <tr><th>Company:</th><td>";echo $row['Alias']; echo"</td></tr>
            <tr><th>Provider:</th><td>";echo $row['Provider']; echo"</td></tr>
            <tr><th>Notes:</th><td>";echo $row['Notes']; echo"</td></tr>
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
                                elseif ($placeholder >=1) echo $placeholder;
                                echo"</td>";
                    }       }
                }
        echo "</table>
    </div>";
?>
</body>

</html>