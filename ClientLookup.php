<!doctype html> 

<html> 
<head>
    <title>Client Lookup</title>
    <style>

        .button {
            margin-top: 30px;
            background-color: lightblue;
            border: none;
            color: white;
            padding: 5px 34px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            width: 50px;
        }

        .button1 {
            margin-top: 30px;
            margin-left: 117px;
            background-color: lightblue;
            border: none;
            color: white;
            padding: 5px 34px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            width: 30px;
        }

        .button2 {
            margin-top: 30px;
            margin-left: 10px;
            background-color: lightblue;
            border: none;
            color: white;
            padding: 5px 34px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            width: 50px;
        }

        .sidebarbutton {
            margin-left: 530px;
            background-color: lightblue;
            border: none;
            color: white;
            padding: 5px 34px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            width: 200px;
        }

        body {
            background-color: White;
        }

        .flexing {
            display: flex;
            width: 35%;
            flex: 1;
            background-color: Black;
        }

        .table {
            background-color: white;
            width: 650px;
            height: 300px;
            background-color: lightblue;
            color: white;
            overflow-y: scroll;
            border: solid black;
        }

        td {
            width: 73px;
            height: 50px;
            border: 1px solid black;
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
    </style>




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



    <!-- <link rel="stylesheet" href="C:\Users\Joel\OneDrive\Documents\HTML\Swartz\ClientLookup.css"> -->

        <?php 
    $servername = "localhost";
	$username = "root";
	$password = "Password1";
	$dbname = "coveragecompletedb";
	// Create connection
    global $conn;
	$conn = mysqli_connect($servername, $username, $password, $dbname);

	// Check connection
	if (!$conn) {
	  die("Connection failed: " . mysqli_connect_error());
	}   

    if(isset($_REQUEST['submit']) and ($_REQUEST['submit'] == 'Search')){
       signIn($conn);
    }

    function clID(){
    $id = $_REQUEST['clCode'];
    $sql = "SELECT Client_ID FROM client WHERE Client_ID=$id";
    echo $id;
    //$result = mysqli_query($conn, $sql);
   // $row = mysqli_fetch_assoc($result);

   // echo $row['Client_ID'];
    }


    
    

    echo "<div class ='Search'>
        <form method='post'>
        <input type='text' id='clCode' name='clCode' placeholder='Client Code'>
        
        <input type='submit' name='submit' value='Search'>

        <a class= 'button1' href='ClientCreation.html'>New Client</a>

        </form>
    </div>

    </head>

    <div class='table'>

    <table>

    <tr>

    <th bgcolor='#CEECF5'><font color='red'>Customer ID</font></th>

    <th bgcolor='#CEECF5'><font color='red'>Company Name</font></th>

    <th bgcolor='#CEECF5'><font color='red'>Phone</font></th>

    <th bgcolor='#CEECF5'><font color='red'>Phone 2</font></th>

    <th bgcolor='#CEECF5'><font color='red'>Email</font></th>

    <th bgcolor='#CEECF5'><font color='red'>Mailing</font></th>

    <th bgcolor='#CEECF5'><font color='red'>Billing</font></th>

    <th bgcolor='#CEECF5'><font color='red'>Notes</font></th>


    </tr>

    <tr bgcolor='#D8D8D8'>

    <td>" . clID() . "</td>

    <td></td>

    <td></td>

    <td></td>

    <td></td>

    <td></td>

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