<?php 
    session_start();
    // remove all session variables
    session_unset();

    // destroy the session loging the user out
    session_destroy();
    header('Location: Login.htm');
?>