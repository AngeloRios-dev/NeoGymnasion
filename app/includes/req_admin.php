<?php 
    if (!isset($_SESSION["logged"]) || !isset($_SESSION["logged"]["u_role"]) || $_SESSION["logged"]["u_role"] !== "admin") {
        header("Location: ingresar.php");
        exit(); 
    }
?>