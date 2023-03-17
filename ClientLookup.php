<!doctype html> 

<html> 
<head>
<?php
include("db.php");
//opens database
checkForUser();
//does user check
?>
    <title>Client Lookup</title>
<link rel="stylesheet" href="ClientLookup.css">



<!--
    <script src="Client_Creation.js"></script>
    <div id="mySidebar" class="sidebar">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <form>
            <input type="text" id="Uname" name="Uname" placeholder="Name Insured"><br><br>
            <input type="text" id="Uname" name="Uname" placeholder="Location"><br><br>
            <input type="text" id="Uname" name="Uname" placeholder="Company"><br><br>
            <a class="button" href="">Search</a>
        </form>
    </div>

    <div id="button2">
        <button class="sidebarbutton" onclick="openNav()">&#9776; Open Sidebar</button>
    </div>

    <script>
        /* Set the width of the sidebar to 250px and the left margin of the page content to 250px */
        function openNav() {
            document.getElementById("mySidebar").style.width = "250px";
            document.getElementById("main").style.marginLeft = "250px";
        }

        /* Set the width of the sidebar to 0 and the left margin of the page content to 0 */
        function closeNav() {
            document.getElementById("mySidebar").style.width = "0";
            document.getElementById("main").style.marginLeft = "0";
        }
    </script>

-->

    <!-- <link rel="stylesheet" href="C:\Users\Joel\OneDrive\Documents\HTML\Swartz\ClientLookup.css"> -->

        <?php 
            function checkForUser(){
        session_start();
        if(!$_SESSION["user"]){
            header("Location: login.htm");
            die();
        }
    } // checks for valid user established at login page, if not found sent back to login
    echo "<div class ='Search'>
        <form method='post' action=''>
        <input type='number' id='' name='clCode' placeholder='Client Code' required>
        <input type='submit' name='searched' value='Search'>
        <a class= 'button1' href='ClientCreation.html'>New Client</a>
        <a class= 'button1' href='logOut.php'>Log Out</a>
        </form>
		
		<form method='post' action''>
		<input type='submit' name='reset' value='View All'>
		</form>
		
    </div>

    </head>

    <div class='table'>

    <table>

    <tr>

    <th>Customer ID</font></th>

    <th>Company Name</font></th>

    <th>Phone</font></th>

    <th>Phone 2</font></th>

    <th>Email</font></th>

    <th>Mailing</font></th>

    <th>Billing</font></th>

    <th>Notes</font></th>

    </tr>
";
$sqlSetup = "SELECT Client_ID FROM client";
$resultSetup = $conn->query($sqlSetup);
//grabs all client IDs 

if (isset($_POST['searched'])){
	$id = $_POST['clCode'];
	searchLine($id);
    //if the button to search for client id has been clicked, it takes the value
    //from the input and searches the database for it in the searchLine function
} else if ($resultSetup or isset($_POST['reset'])) {
		while ($row = $resultSetup->fetch_assoc())  {
			$id = $row['Client_ID'];
            lineLoop($id);
		}
        //on page loadup or if the reset button is clicked it calls the function lineLoop
        //for every client ID that exists in the database 
}
function searchLine($id){
    //this searches for an individual client code
	$sql = "SELECT * FROM client, client_location WHERE client.Client_ID = client_location.Client_ID AND client.Client_ID=$id";
    $result = mysqli_query($GLOBALS['conn'], $sql);
    $row = mysqli_fetch_assoc($result);
    //grabs a bunch of data corresponding with the client code to be displayed on the table
    if ($result->num_rows > 0) {
    echo "<tr><td>
<form method='get' action='CoverageList.php'>
<input type='submit' name='clientValue' value='{$row['Client_ID']}'></td>";
//creates a form for the row of data that when the submit button is clicked it passes
//the ID to the next page
    echo"<td>"; echo $row['Alias']; echo"</td>
    <td>"; echo $row['Phone_Number']; echo"</td>
    <td>"; echo $row['Location_Phone']; echo"</td>
    <td>"; echo $row['Email_Address']; echo "</td>
    <td>"; echo $row['Mailing_Address'];echo "</td>
    <td>"; echo $row['Physical_Address']; echo"</td>
    <td>"; echo $row['Notes']; echo"</td>
    </tr>";
    //displays a table with data pulled from the database
    }   else{
echo "<tr><td>ERROR</td>
<td>NO</td>
<td>CLIENT</td> 
<td>CODE</td> 
<td>FOUND</td>
<td></td>
<td></td>
<td></td>
    </tr>";} // this code appears when a search for a client ID is invaid
	}

function lineLoop($id){
    //dispays all clients on the table
	$sql = "SELECT * FROM client, client_location WHERE client.Client_ID = client_location.Client_ID AND client.Client_ID=$id";
    $result = mysqli_query($GLOBALS['conn'], $sql);
    $row = mysqli_fetch_assoc($result);
    //selects data
    if ($result->num_rows > 0) {
    echo "<tr><td>
<form method='get' action='CoverageList.php'>
<input type='submit' name='clientValue' value='$id'></td>
	<td>"; echo $row['Alias']; echo"</td>
    <td>"; echo $row['Phone_Number']; echo"</td>
    <td>"; echo $row['Location_Phone']; echo"</td>
    <td>"; echo $row['Email_Address']; echo "</td>
    <td>"; echo $row['Mailing_Address'];echo "</td>
    <td>"; echo $row['Physical_Address']; echo"</td>
    <td>"; echo $row['Notes']; echo"</td>
    </tr>";}
    }// same jazz as last function
	
	?>
    </table>



    </div>

    <body>



    </body>
    </html>
