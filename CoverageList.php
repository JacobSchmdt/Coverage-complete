<!DOCTYPE html>
<html>
    <head>
<?php include("db.php"); ?>
<?php checkForUser(); ?>
        <title>Coverages List</title>
        <style>
		
            .sriHeading {
            text-align: right;
            width: 100%;
            background-color: #5168AC;
            }		
            div.optionHeader {
                width: 100%;
            }
            button.leftOptionButton {
                background-color: lightgray;
                border: none;
                padding: 12px;
            }
            button.backButton {
                background-color: #6591C3;
                color: white;
                float: right;
                border: none;
                padding: 12px;
            }
            div.optionList {
                background-color: lightgray;
                overflow: auto;
                width: auto;
                float: left;
            }
            div.clientLocationList {
                float: left;
            }
            button.clientLocationButton {
                background-color: #6591C3;
                color: white;
                border: none;
                padding: 12px 60px;
            }
            button {
                transition-delay: 0.1s;
                cursor: pointer;
            }
            button:hover {
                background-color: #FFFFFF;
                color: black;
            }
            table, th, td {
                border: 1px solid black;
                border-collapse: collapse;
                text-align: center;
                padding: 14px;
                width: 100%;
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
	
	
	
	echo"
    <body style='background-color: #5168AC;'>
	    <div class='sriHeading'><h1>Schwartz Reliance Insurance</h1></div>
        <div class='optionHeader'>
		<form method='get' action='CoverageReport.php'>
            <a href='ClientLookup.php'><button type='button' class='clientLocationButton'>Back to Client Search</button></a>
            <a href='logOut.php'><button type='button' class='clientLocationButton'>Log Out</button></a>
            <input type='hidden' name='clientValue' value='$id'>
			<input type='submit' name='' value='SRI Coverage Review'>
        </div><br>
        <div class='optionList'>
            <table>
                <tr>
                    <th>Coverage Type</th><th>Selected</th><th>Limit</th><th>Status</th>
                </tr>";

                $sqlSetup = "SELECT Coverage_ID FROM coverage";
                $resultSetup = $conn->query($sqlSetup);
                while ($row = $resultSetup->fetch_assoc())  {
			        $coverageID = $row['Coverage_ID'];
                    lineLoop($coverageID);
                }

                function lineLoop($coverageID){
                    $sql = "SELECT * FROM coverage WHERE Coverage_ID=$coverageID";
                    $result = mysqli_query($GLOBALS['conn'], $sql);
                    $row = mysqli_fetch_assoc($result);
                    if ($result->num_rows > 0) {
                        echo "<tr><td>"; echo $row['Coverage_Name']; echo"</td>
                        <td> <input type='checkbox' name='{$row['Coverage_Name']}' value='Accepted'> </td>
                        <td>"; echo $row['Coverage_Limit']; echo"</td>
                        <td> Accepted </td>";
                    }
                }
                echo"			
            </table>
            </form>
        </div>";
          //  if (isset($_POST['submit'])){
          //      $insertQuery = "INSERT INTO client_coverage WHERE Client_ID = $id
          //      VALUES ()
          //echo $_POST['Contents'];
        echo "<!--<div class='clientLocationList'>
            <button type='button' class='clientLocationButton'>Location ##</button><br>
        </div>-->
    </body>
	";?>
</html>