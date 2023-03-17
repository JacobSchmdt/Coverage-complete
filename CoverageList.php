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
            input::-webkit-outer-spin-button,
            input::-webkit-inner-spin-button {
                -webkit-appearance: none;
                margin: 0;
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
    } 	//check for user stuff
	$id = $_GET['clientValue'];
    $_SESSION['client'] = $id;

    //grabs client id that was passed
	echo"
    <body style='background-color: #5168AC;'>
	    <div class='sriHeading'><h1>Schwartz Reliance Insurance</h1></div>
        <div class='optionHeader'>
		<form method='get' action=''>
            <a href='ClientLookup.php'><button type='button' class='clientLocationButton'>Back to Client Search</button></a>
            <a href='logOut.php'><button type='button' class='clientLocationButton'>Log Out</button></a>
            <a href='CoverageReport.php'><button type='button' class='clientLocationButton'>SRI Coverage Report</button></a>
            <input type='hidden' name='clientValue' value='$id'>
			<input type='submit' name='saved' value='Save'>
        </div><br>
        <div class='optionList'>
            <table>
                <tr>
                    <th>Coverage Type</th><th>Selected</th><th>Limit</th>
                </tr>";
                $sqlSetup = "SELECT Coverage_ID FROM coverage";
                $resultSetup = $conn->query($sqlSetup);
                //grabs all the coverages avaliable
                while ($row = $resultSetup->fetch_assoc())  {
			        $coverageID = $row['Coverage_ID'];
                    if (isset($_GET['saved'])){
                        lineLoop($coverageID, $id);
                    }else{
                    pageLoadUp($coverageID, $id);
                    }
                } //starts lineLoop function with coverage id to display coverages

                function pageLoadUp($coverageID, $id){
                    $sql = "SELECT * FROM coverage WHERE Coverage_ID=$coverageID";
                    $result = mysqli_query($GLOBALS['conn'], $sql);
                    $row = mysqli_fetch_assoc($result);
                    if ($result->num_rows > 0) { //displays coverage info and such
                        $sql2 = "SELECT * FROM client_coverage WHERE Client_ID = $id";
                        $result2 = mysqli_query($GLOBALS['conn'], $sql2);
                        $row2 = mysqli_fetch_assoc($result2);
                        echo "<tr><td>"; echo $row['Coverage_Name']; echo"</td>";
                        echo "<td><input type='checkbox' name='{$row['Coverage_Name_Insert']}' value='1' ";if($row2[$row['Coverage_Name_Insert']] > 0) echo "checked='checked'"; echo"> </td>";
                        echo "<td>$<input type='number' name='{$row['Coverage_Limit']}'";if($row2[$row['Coverage_Name_Insert']] > 0) echo "value='{$row2[$row['Coverage_Name_Insert']]}'";else echo"value='0'"; echo"></td>";
                    }
                } //NOTICE - this code is still being worked on with inserting data back into the database	

                function lineLoop($coverageID, $id){
                    $sql = "SELECT * FROM coverage WHERE Coverage_ID=$coverageID";
                    $result = mysqli_query($GLOBALS['conn'], $sql);
                    $row = mysqli_fetch_assoc($result);
                    if ($result->num_rows > 0) { //displays coverage info and such
                        $sql2 = "SELECT * FROM client_coverage WHERE Client_ID = $id";
                        $result2 = mysqli_query($GLOBALS['conn'], $sql2);
                        $row2 = mysqli_fetch_assoc($result2);
                        echo "<tr><td>"; echo $row['Coverage_Name']; echo"</td>";
                        echo "<td><input type='checkbox' name='{$row['Coverage_Name_Insert']}' value='1' ";if(isset($_GET[$row['Coverage_Name_Insert']])) echo "checked='checked'"; echo"> </td>";
                        echo "<td>$<input type='number' name='{$row['Coverage_Limit']}'";if(isset($_GET[$row['Coverage_Limit']])) echo" value='{$_GET[$row['Coverage_Limit']]}'></td>";
                    }
                } //NOTICE - this code is still being worked on with inserting data back into the database	

            echo"</table></form></div>";
        //NOTICE - this commented out code below is for testing and might still be used later
            if (isset($_GET['saved'])){
                $sqlSetup = "SELECT Coverage_ID FROM coverage";
                $resultSetup = $conn->query($sqlSetup);
                while ($row = $resultSetup->fetch_assoc())  {
			        $coverageID = $row['Coverage_ID'];
                    sqlUpdate($coverageID, $id);
                }
            }


                function sqlUpdate($coverageID, $id){
                    $sql = "SELECT * FROM coverage WHERE Coverage_ID=$coverageID";
                    $result = mysqli_query($GLOBALS['conn'], $sql);
                    $row = mysqli_fetch_assoc($result);
                    $sql2 = "SELECT * FROM client_coverage WHERE Client_ID = $id";
                    $coverageMoney = 0;
                    if (isset($_GET[$row['Coverage_Name_Insert']]) and isset($_GET[$row['Coverage_Limit']])){
                        $coverageMoney = $_GET[$row['Coverage_Limit']];
                    } else {
                        $coverageMoney = 0;
                    }
                        $placeholder = $row['Coverage_Name_Insert'];
                        $insertQuery = "UPDATE client_coverage
                        SET $placeholder = $coverageMoney
                        WHERE Client_ID = $id";
                        $result = mysqli_query($GLOBALS['conn'], $insertQuery);
                    
                }
        echo "<!--<div class='clientLocationList'>
            <button type='button' class='clientLocationButton'>Location ##</button><br>
        </div>-->
    </body>
	";?>
</html>