<!DOCTYPE html>
<html>
<head>


<?php include("db.php"); ?>
<?php checkForUser(); ?>

    <title>Coverage Report</title>
    <!--<link rel="stylesheet" type="text/css" href="/CoverageReport.css">-->
    <style>
        .sriHeading {
            text-align: right;
            width: 100%;
            background-color: #5168AC;
        }

        .upperTable {
            text-align: left;
            width: 100%;
        }

        td {
            border-bottom: 1px solid black;
        }

        .lowerTable {
            text-align: center;
            width: 100%;
        }
    </style>
</head>
<body style="background-color: #5168AC;">

    <div class="sriHeading"><h1>Schwartz Reliance Insurance</h1></div>
    <div style="background-color: lightgray;">
        <table class="upperTable">
            <tr><th>Client:</th><td><?php clName() ?></td><th>Broker:</th><td><?php brName() ?></td></tr>
            <tr><th>Client Code:</th><td><?php clCode() ?></td></tr>
            <tr><th>Name of holder:</th><td><?php incomplete() ?></td></tr>
            <tr><th>Email:</th><td><?php clEmail() ?></td></tr>
            <tr><th>Phone:</th><td><?php clPhone() ?></td></tr>
            <tr><th>Policy ID:</th><td><?php plID() ?></td></tr>
            <tr><th>Provider:</th><td><?php incomplete() ?></td></tr>
        </table><br>
        <table border="1" bgcolor="white" class="lowerTable">
            <tr><th>Coverage</th><th>Description</th><th>Amount Covered</th></tr>
        </table>
    </div>
    <?php
    function checkForUser(){
        session_start();
        if(!$_SESSION["user"]){
            header("Location: login.htm");
            die();
        }
    }    
   
    function brName(){
    $username = $_SESSION["user"];
    $sql = "SELECT Name FROM user WHERE User_Name='$username';";
    $result = mysqli_query($GLOBALS['conn'], $sql);
    $row = mysqli_fetch_assoc($result);

    echo $row['Name'];
    }

    function clName(){
    $sql = "SELECT Name FROM client WHERE Client_ID='1';";
    $result = mysqli_query($GLOBALS['conn'], $sql);
    $row = mysqli_fetch_assoc($result);

    echo $row['Name'];
    }

    function clCode(){
    $sql = "SELECT Client_ID FROM client WHERE Client_ID='1';";
    $result = mysqli_query($GLOBALS['conn'], $sql);
    $row = mysqli_fetch_assoc($result);

    echo $row['Client_ID'];
    }

    function hdName(){
    }

    function clEmail(){
    $sql = "SELECT Email_Address FROM client WHERE Client_ID='1';";
    $result = mysqli_query($GLOBALS['conn'], $sql);
    $row = mysqli_fetch_assoc($result);

    echo $row['Email_Address'];
    }

    function clPhone(){
    $sql = "SELECT Phone_Number FROM client WHERE Client_ID='1';";
    $result = mysqli_query($GLOBALS['conn'], $sql);
    $row = mysqli_fetch_assoc($result);

    echo $row['Phone_Number'];
    }

    function plID(){
    $sql = "SELECT Policy_ID FROM policy WHERE Policy_ID='1';";
    $result = mysqli_query($GLOBALS['conn'], $sql);
    $row = mysqli_fetch_assoc($result);

    echo $row['Policy_ID'];
    }

    function prName(){
    }
    
    function incomplete(){
        echo "Bakob's Balls";
    }
    
?>
</body>

</html>