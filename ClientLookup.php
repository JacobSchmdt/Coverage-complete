<!doctype html> 

<html> 
<head>
<?php include("db.php"); ?>
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
    echo "<div class ='Search'>
        <form method='post' action=''>
        <input type='text' id='clCode' name='clCode' placeholder='Client Code'>
        
        <input type='submit' name='submit' value='Search'>

        <a class= 'button1' href='ClientCreation.html'>New Client</a>

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

    <tr>

    <td>";
   if(isset($_REQUEST['submit']) and ($_REQUEST['submit'] == 'Search') and ($_REQUEST['clCode'] >= 1)){
    $id = $_REQUEST['clCode'];
	$sql = "SELECT Client_ID, Email_Address, Phone_Number, Mailing_Address FROM client WHERE Client_ID=$id";
    $result = mysqli_query($GLOBALS['conn'], $sql);
    $row = mysqli_fetch_assoc($result);
	echo $row['Client_ID'];
   }

    echo "</td>

    <td></td>

     <td>";

   if(isset($_REQUEST['submit']) and ($_REQUEST['submit'] == 'Search') and ($_REQUEST['clCode'] >= 1)){
    $id = $_REQUEST['clCode'];
	$sql = "SELECT Client_ID, Email_Address, Phone_Number, Mailing_Address FROM client WHERE Client_ID=$id";
    $result = mysqli_query($GLOBALS['conn'], $sql);
    $row = mysqli_fetch_assoc($result);
	echo $row['Phone_Number'];
   } 	
	
	echo "</td>

    <td></td>

    <td>";
	   if(isset($_REQUEST['submit']) and ($_REQUEST['submit'] == 'Search') and ($_REQUEST['clCode'] >= 1)){
    $id = $_REQUEST['clCode'];
	$sql = "SELECT Client_ID, Email_Address, Phone_Number, Mailing_Address FROM client WHERE Client_ID=$id";
    $result = mysqli_query($GLOBALS['conn'], $sql);
    $row = mysqli_fetch_assoc($result);
	echo $row['Email_Address'];
   }
echo "	</td>

    <td>";
	   if(isset($_REQUEST['submit']) and ($_REQUEST['submit'] == 'Search') and ($_REQUEST['clCode'] >= 1)){
    $id = $_REQUEST['clCode'];
	$sql = "SELECT Client_ID, Email_Address, Phone_Number, Mailing_Address FROM client WHERE Client_ID=$id";
    $result = mysqli_query($GLOBALS['conn'], $sql);
    $row = mysqli_fetch_assoc($result);
	echo $row['Mailing_Address'];
   }
echo "</td>

    <td></td>

    <td></td>


    </tr>";

    ?>

    <tr bgcolor="#CEECF5">

    <td></td>

    <td></td>

    <td></td>

    <td></td>

    <td></td>

    <td></td>

    <td></td>

    <td></td>

    </tr>

    <tr bgcolor="#D8D8D8">

    <td></td>

    <td></td>

    <td></td>

    <td></td>

    <td></td>

    <td></td>

    <td></td>

    <td></td>

    </tr>

    <tr bgcolor="#CEECF5">

    <td></td>

    <td></td>

    <td></td>

    <td></td>

    <td></td>

    <td></td>

    <td></td>

    <td></td>

    </tr>

    <tr bgcolor="#D8D8D8">

    <td></td>

    <td></td>

    <td></td>

    <td></td>

    <td></td>

    <td></td>

    <td></td>

    <td></td>

    </tr>

    <tr bgcolor="#CEECF5">

    <td></td>

    <td></td>

    <td></td>

    <td></td>

    <td></td>

    <td></td>

    <td></td>

    <td></td>



    </table>



    </div>

    <body>



    </body>
    </html>
