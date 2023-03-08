<!DOCTYPE html>
<html>
    <head>
<?php include("db.php"); ?>
<?php checkForUser(); ?>
        <title>Coverages List</title>
        <style>
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
        <div class='optionHeader'>
		<form method='get' action='CoverageReport.php'>
            <input type='hidden' name='clientValue' value='$id'>
			<input type='submit' name='' value='SRI Coverage Review'>
            <a class='leftOptionButton'>Coverage Tracker</a>
            <a class='backButton' href='ClientLookup.php'>Back To Search</a>
			</form>
        </div><br>
        <div class='optionList'>
            <table>
                <tr>
                    <th>Coverage Type</th><th>ON</th><th>Limit</th><th>Status</th><th>Date</th>
                </tr>
                <tr>
                    <td>Contents</td><td><input type='checkbox' checked></td><td>$2500000</td><td>Accepted</td><td>12/11/2022</td>
                </tr>
            </table>
        </div>
        <div class='clientLocationList'>
            <button type='button' class='clientLocationButton'>Location ##</button><br>
        </div>
    </body>
	";?>
</html>
