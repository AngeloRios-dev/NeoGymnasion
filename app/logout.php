<?php
    session_start();
    
    // Logout
    if (isset($_SESSION["logged"])) {
        unset($_SESSION["logged"]);
        header("Location: ingresar.php");
    }
?>