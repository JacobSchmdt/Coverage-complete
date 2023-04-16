<!DOCTYPE html>
<html lang="en">
<head>
<?php
include("db.php");
//opens database
checkForUser();
//does user check
?>
<link rel="stylesheet" href="Menu.css">

<body style="background-color:#5168ac;" text="white"> 
<title>Joel Reimer</title>
<meta charset="utf-8">
</head>
<section class="header">
    <h1>Schwartz Reliance Insurance</h1>

</section>
<body>
<div class="nav"> 
    <h2>Navigation Menu</h2>
    <div class="Menu">
        <div class="Menu">
            <button class="button" onclick="document.location='ClientLookup.php'"style="vertical-align: middle;"><span>Client Lookup</span></button><br><br>
            <button class="button" onclick="document.location='ClientCreation2.php'"style="vertical-align: middle;"><span>Client Creation</span></button><br><br>
            <button class="button" onclick="document.location='logOut.php'"style="vertical-align: middle;"><span>Log Out</span></button><br><br>
            <?php
            $sql = "SELECT * FROM user where User_Name = '{$_SESSION['user']}'";
            $result = $conn->query($sql);
            $row = mysqli_fetch_assoc($result);
            if ($row['User_Type'] == "Admin"){
                echo  "<a href='UserCreation.php'><button class='button' style='vertical-align: middle;'><span>User Creation</span></button></a>";
            }
            ?>
        </div>
    </div>
</div>
<?php 
            function checkForUser(){
        session_start();
        if(!$_SESSION["user"]){
            header("Location: login.htm");
            die();
        }
    }

?>
</html>




