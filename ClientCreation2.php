
<!DOCTYPE html>
<html>
  <head>
  <?php
include("db.php");
//opens database
checkForUser();
//does user check
?>
    <meta charset="utf-8">
    <title>Client Creation</title>
	<style>
body {
  font-family: "Lato", sans-serif;
}

.sidebar {
  height: 100%;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #6591C3;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}

.sidebar a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #ffffff;
  display: block;
  transition: 0.3s;
}

.sidebar a:hover {
  color: #000;
}

.sidebar .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

.openbtn {
  font-size: 20px;
  cursor: pointer;
  background-color: #111;
  color: white;
  padding: 10px 15px;
  border: none;
}

.openbtn:hover {
  background-color: #444;
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

#main {
  transition: margin-left .5s;
  padding: 16px;
}

/* On smaller screens, where height is less than 450px, change the style of the sidenav (less padding and a smaller font size) */
@media screen and (max-height: 450px) {
  .sidebar {padding-top: 15px;}
  .sidebar a {font-size: 18px;}
}
</style>
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
<body style="background-color:#D9D9D9">	
	<form action="/ClientCreation.php" target="_self" method="POST">
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
		
		<label for="Iname">Name of Insured</label><br>
		<input type="text" id="Iname" name="Iname" value="" required><br><br>
		
		<label for="Company">Company</label><br>
		<input type="text" id="Company" name="Company" value="" required><br><br>
		
		
		<label for="Mailing_Address">Mailing Address:</label>
		<input type="text" id="Mailing_Address" name="Mailing_Address" required>
		<br>
		<br>
		<label for="Email_Adress">Email Address</label>
		<input type="text" id="Email_Adress" name="Email_Address" required>
		<br>
		<br>
		<label for="Phone_Number">Phone Number</label>
		<input type="number" id="Phone_Number" name="Phone_Number" required>
		<br>
		<br>
		
		<label for="Description">Description:</label><br>
		<textarea id="Description" name="Description" rows="4" cols="50"></textarea><br>
		
		
		
		
		<div class="form-group">
		
		<input type="checkbox" id="SRI" name="Consent[]" value="SRI Coverage Review">
		<label for="SRI">SRI Coverage Review</label><br>
		
		<input type="submit" name="save_multiple_checkbox" class="btnSave" value="Submit">
		<!--<input type="submit" value="Cancel">-->
		<a href='ClientLookup.php'><button type='button' class='clientLocationButton'>Back to Client Search</button></a>
		</div>
	</form>
</body>
</html>
