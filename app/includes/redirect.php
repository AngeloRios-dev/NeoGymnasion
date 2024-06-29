<?php 
    if (!isset($_SESSION["logged"])) {
        header("Location: ingresar.php");
    }
?>