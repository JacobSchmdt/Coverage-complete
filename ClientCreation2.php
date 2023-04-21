<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Client Creation</title>
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

        <h2> New Client Creation</h2>

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

	$query = "SELECT User_ID FROM user WHERE User_Name='$username';";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
echo "Broker ID:"; echo $row['User_ID']; echo "<br></br>";
	?>
		
		<input type="text" id="Fname" name="Fname" value="" required placeholder="First Name"><br><br>


		<input type="text" id="Lname" name="Lname" value="" required placeholder="Last Name"><br><br>

		
		<input type="text" id="Company" name="Company" value="" required placeholder="Company"><br><br>

		<input type="text" id="Provider" name="Provider" value="" required placeholder="Provider"><br><br>
		

		<input type="text" id="Client_Code" name="Client_Code" required placeholder="Client Code"><br><br>
		<!--
		<input type="text" id="Email_Adress" name="Email_Address" required placeholder="Email Address">
		<br>
		<br>
		
		<input type="number" id="Phone_Number" name="Phone_Number" required placeholder="Phone Number">
		<br>
		<br>
		-->
		<textarea id="Description" name="Description" rows="4" cols="100" placeholder="Description"></textarea><br>
	
		<div class="form-group">
		<?php
		
		$sqlSetup = "SELECT Category_ID FROM category";
        $resultSetup = $conn->query($sqlSetup);		
        while ($row = $resultSetup->fetch_assoc()){
		$categoryID = $row['Category_ID'];
		lineLoop($categoryID);
		}
		
		function lineLoop($categoryID){
                    $sql = "SELECT * FROM category WHERE Category_ID=$categoryID";
                    $result = mysqli_query($GLOBALS['conn'], $sql);
                    $row = mysqli_fetch_assoc($result);
                    if ($result->num_rows > 0) {
						echo $row['Category_Name'];
						echo "<input type='checkbox' name='{$row['Category_Name_Insert']}' value='1'> <br> ";
					}
		}
		?>
		<input type="submit" name="Save" class="btnSave" value="Submit">
        <button class="button" onclick="document.location='ClientLookup.php'"style="vertical-align: middle;"><span>Client Lookup</span></button>
		<button class="button" onclick="document.location='Menu.php'"style="vertical-align: middle;"><span>Menu</span></button>
		<button class="button" onclick="document.location='logOut.php'"style="vertical-align: middle;"><span>Log Out</span></button><br><br>		
		</div>
	    </form>
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
$query = "SELECT * FROM client WHERE Client_ID = '$CCode'";
$result = mysqli_query($conn, $query);
if (mysqli_num_rows($result) > 0) {
      echo "Error: Broker exists already.";
}else {

$query2 = "INSERT INTO client (Client_ID, Mailing_Address, Company_Name, Client_First_Name, Client_Last_Name, Email_Address, Phone_Number, Broker_ID, Notes)
 VALUES ('$CCode','$mailingAddress','$companyName','$CFName','$CLName','$emailAddress','$phoneNumber','$brokerID', '$description')";

 $query3 = "INSERT INTO client_location (Location_ID, Client_ID, Alias, Physical_Address, Location_Phone, Provider) VALUES ('$CCode', '$CCode', '$companyName', '$mailingAddress', '$phoneNumber', '$prov')";

 $query4 = "INSERT INTO client_coverage (Client_ID) VALUES ('$CCode')";

 $query5 = "INSERT INTO location_category (Location_ID) VALUES ('$CCode')";
  
 $bruh = mysqli_query($conn, $query2) && mysqli_query($conn, $query3) && mysqli_query($conn, $query4) && mysqli_query($conn, $query5);


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
		WHERE Location_ID = '$CCode'";
		$result = mysqli_query($GLOBALS['conn'], $insertQuery);
}
    header("Location: ClientLookup.php");
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
}
	
	?>
</body>
</html>