<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    
    // Logout
    if (isset($_SESSION["logged"])) {
        unset($_SESSION["logged"]);
        header("Location: ingresar.php");
    }
?>