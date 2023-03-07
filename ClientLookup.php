<!doctype html> 

<html> 
<head>
<?php include("db.php"); ?>
<?php checkForUser();?>
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
    }
    echo "<div class ='Search'>
        <form method='post' action=''>
        <input type='number' id='clCode' name='clCode' placeholder='Client Code' required>
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

if (isset($_POST['searched'])){
	$id = $_POST['clCode'];
	searchLine($id);
} else if ($resultSetup or isset($_POST['reset'])) {
		while ($row = $resultSetup->fetch_assoc())  {
			$id = $row['Client_ID'];
            lineLoop($id);
		}
}
function searchLine($id){
	$sql = "SELECT * FROM client, client_location WHERE client.Client_ID = client_location.Client_ID AND client.Client_ID=$id";
    $result = mysqli_query($GLOBALS['conn'], $sql);
    $row = mysqli_fetch_assoc($result);

    if ($result->num_rows > 0) {
    echo "<tr><td>
<form method='get' action='CoverageList.php'>
<input type='submit' name='clientValue' value='{$row['Client_ID']}'></td>
	<td>"; echo $row['Alias']; echo"</td>
    <td>"; echo $row['Phone_Number']; echo"</td>
    <td>"; echo $row['Location_Phone']; echo"</td>
    <td>"; echo $row['Email_Address']; echo "</td>
    <td>"; echo $row['Mailing_Address'];echo "</td>
    <td>"; echo $row['Physical_Address']; echo"</td>
    <td>"; echo $row['Notes']; echo"</td>
    </tr>";
    }   else{
echo "<tr><td>ERROR</td>
<td>NO</td>
<td>CLIENT</td> 
<td>CODE</td> 
<td>FOUND</td>
<td></td>
<td></td>
<td></td>
    </tr>";}
	}

function lineLoop($id){
	$sql = "SELECT * FROM client, client_location WHERE client.Client_ID = client_location.Client_ID AND client.Client_ID=$id";
    $result = mysqli_query($GLOBALS['conn'], $sql);
    $row = mysqli_fetch_assoc($result);

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
    }
	
	?>
    </table>



    </div>

    <body>



    </body>
    </html>
