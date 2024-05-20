<?php
    if (isset($_POST["registrarse"])) {
        if (!empty($_POST["first_names"]) && strlen($_POST["first_names"]) <= 100 && !is_numeric($_POST["first_names"]) && !preg_match("/[0-9]/", $_POST["first_names"])) {
                echo $_POST["first_names"]."</br>";
        }
        if (!empty($_POST["last_names"]) && strlen($_POST["last_names"]) <= 100 && !is_numeric($_POST["last_names"]) && !preg_match("/[0-9]/", $_POST["last_names"])) {
                echo $_POST["last_names"]."</br>";
        }
        if (!empty($_POST["email"])
            && filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
            echo $_POST["email"]."</br>";
        }
        if (!empty($_POST["phone"])) {
            echo $_POST["phone"]."</br>";
        }
        if (!empty($_POST["birth_date"])) {
            echo $_POST["birth_date"]."</br>";
        }
        if (!empty($_POST["u_address"])) {
            echo $_POST["u_address"]."</br>";
        }
        if (!empty($_POST["radio_gender"])) {
            echo $_POST["radio_gender"]."</br>";
        }
        if(!empty($_POST["password1"]) && strlen($_POST["password1"]) >= 10 && $_POST["password1"] === $_POST["password2"]){
                echo $_POST["password1"]."</br>";
        }
    }
?>