<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Client Editor</title>
    <link rel="stylesheet" href="ClientCreation.css">
  <?php
include("db.php");
//opens database
checkForUser();
//does user check
?>
<!--
    <script src="Client_Creation.js"></script>
		<div id="mySidebar" class="sidebar">
		<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
		<a href="#">Account</a>
		<a href="#">Search History</a>
		<a href="#">Clients</a>
		<a href="#">FAQ</a>
	</div>
	
	<div id="main">
		<button class="openbtn" onclick="openNav()">&#9776; Open Sidebar</button>
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
	</script> -->
  </head>
  <section class="header">
    <h1>Schwartz Reliance Insurance</h1>

</section>
<body>
    <div class="nav">

        <h2> Client Editor</h2>

	<form action="" target="_self" method="POST">
	<?php
    function checkForUser(){
        session_start();
        if(!$_SESSION["user"]){
            header("Location: login.htm");
            die();
        }
    } 
	$username = $_SESSION["user"];
	$id = $_SESSION["client"];
	$query = "SELECT User_ID FROM user WHERE User_Name='$username';";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
echo "Broker ID:"; echo $row['User_ID']; echo "<br></br>";

$sql2 = "SELECT * FROM client WHERE Client_ID = '$id'";
$result2 = mysqli_query($GLOBALS['conn'], $sql2);
$row2 = mysqli_fetch_assoc($result2);
$sql3 = "SELECT * FROM client_location WHERE Client_ID = '$id'";
$result3 = mysqli_query($GLOBALS['conn'], $sql3);
$row3 = mysqli_fetch_assoc($result3);
	
		
		echo "<label for 'Fname'>First Name</label>
		<input type='text' id='Fname' name='Fname' value='{$row2['Client_First_Name']}' required placeholder='First Name'><br><br>";

		echo "<label for 'Lname'>Last Name</label>
		<input type='text' id='Lname' name='Lname' value='{$row2['Client_Last_Name']}' required placeholder='Last Name'><br><br>";

		echo "<label for 'Company'>Company</label>		
		<input type='text' id='Company' name='Company' value='{$row3['Alias']}' required placeholder='Company'><br><br>";

		echo "<label for 'Provider'>Provider</label>
		<input type='text' id='Provider' name='Provider' value='{$row3['Provider']}' required placeholder='Provider'><br><br>";
		
		echo "<label for 'Client_Code'>Client Code</label>	
		<input type='text' id='Client_Code' name='' value='{$row2['Client_ID']}' readonly ><br><br>";
		echo "<label for 'Description'>Description</label>
		<textarea id='Description' name='Description' rows='4' cols='100' placeholder='Description'>{$row2['Notes']}</textarea><br>";
?>
		<div class="form-group">
		<?php
		
		$sqlSetup = "SELECT Category_ID FROM category";
        $resultSetup = $conn->query($sqlSetup);		
        while ($row = $resultSetup->fetch_assoc()){
		$categoryID = $row['Category_ID'];
		lineLoop($categoryID, $id);
		}
		
		function lineLoop($categoryID, $id){
                    $sql = "SELECT * FROM category WHERE Category_ID=$categoryID";
                    $result = mysqli_query($GLOBALS['conn'], $sql);
                    $row = mysqli_fetch_assoc($result);
                    if ($result->num_rows > 0) {
						$sql4 = "SELECT * FROM location_category WHERE Location_ID = '$id'";
						$result4 = mysqli_query($GLOBALS['conn'], $sql4);
						$row4 = mysqli_fetch_assoc($result4);
						echo $row['Category_Name'];
						echo "<input type='checkbox' name='{$row['Category_Name_Insert']}' value='1'"; if($row4[$row['Category_Name_Insert']] > 0) echo "checked='checked'"; echo"> <br> ";
					}
		}
		?>
		<input type="submit" name="Save" class="btnSave" value="Submit">
	    </form>
		</div>
		<button class="button" onclick="document.location='ClientLookup.php'"style="vertical-align: middle;"><span>Client Lookup</span></button>
		<button class="button" onclick="document.location='ClientMenu.php'"style="vertical-align: middle;"><span>Client Menu</span></button>
		
<?php


	if (isset($_POST['Save'])) {
	//WIPES all inputs for SQL Injection protection
$CFName = mysqli_real_escape_string($conn, $_POST['Fname']);
$CLName = mysqli_real_escape_string($conn, $_POST['Lname']);
$CCode = mysqli_real_escape_string($conn, $_POST['Client_Code']);
$mailingAddress = $emailAddress = $phoneNumber = $consent = (NULL);
$companyName = mysqli_real_escape_string($conn, $_POST['Company']);
$description = mysqli_real_escape_string($conn, $_POST['Description']);
$prov = mysqli_real_escape_string($conn, $_POST['Provider']);
$brokerID = $_SESSION["user"];



//queries to insert and update specific tables to ensure data shows up in proper places
$query2 = "UPDATE client SET Company_Name = '$companyName', Client_First_Name = '$CFName', Client_Last_Name = '$CLName', Notes = '$description'
 WHERE Client_ID = '$id'";

 $query3 = "UPDATE client_location SET Alias = '$companyName', Provider = '$prov'
 WHERE Location_ID = '$id'";
  
 $bruh = mysqli_query($conn, $query2) && mysqli_query($conn, $query3);


$sqlSetup = "SELECT Category_ID FROM category";
$resultSetup = $conn->query($sqlSetup);
    while ($row = $resultSetup->fetch_assoc())  {
		$categoryID = $row['Category_ID'];
		$sql = "SELECT * FROM category WHERE Category_ID=$categoryID";
		$result = mysqli_query($GLOBALS['conn'], $sql);
		$row = mysqli_fetch_assoc($result);
		$myballs = 0;
		if (isset($_POST[$row['Category_Name_Insert']])){
			$myballs = $_POST[$row['Category_Name_Insert']];
		}else {
			$myballs = 0;
		}
		$placeholder = $row['Category_Name_Insert'];
		$insertQuery = "UPDATE location_category
		SET $placeholder = $myballs
		WHERE Location_ID = '$id'";
		$result = mysqli_query($GLOBALS['conn'], $insertQuery);
}
    header("Location: ClientMenu.php");
	/*
 //Ensures that all the queries are successful
if(mysqli_query($conn, $query2) && mysqli_query($conn, $query3) && mysqli_query($conn, $query4) && mysqli_query($conn, $query5) && mysqli_query($conn, $query6)){
    header("Location: ClientLookup.php");
    echo '<script>alert("Client Created Successfully");<script>';
}
//Displays error if database cannot be modified 
else {
    echo "Error inserting Client";
}*/
	}
	
	
	?>
</body>
</html>
