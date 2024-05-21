<?php
$errors = array();

function showErrors($errors, $field) {
    if (isset($errors[$field]) && !empty($field)) {
        return '<div class="alert alert-danger">'.$errors[$field].'</div>';
    }
    
}


function setFieldValues($errors, $field) {
    if (isset($errors) && count($errors) >=1 && isset($_POST[$field])) {
        echo "value='{$_POST[$field]}'";
    }
}


function isChecked($errors, $field, $value) {
    if (isset($errors) && count($errors) >= 1 && isset($_POST[$field]) && $_POST[$field] === $value) {
        echo "checked";
    }
}


if(isset($_POST["registrarse"])){
    // Comprobar campos obligatorios
    $required_fields = array("first_names", "last_names", "email", "phone", "birth_date", "u_address", "radio_gender", "password1", "password2", "aceptarTerminos");
    foreach($required_fields as $field) {
        if(empty($_POST[$field])) {
            $errors[$field] = ucfirst(str_replace("_", " ", $field)) . " es obligatorio.";
        }
    }

    // Validar nombre
    if(!empty($_POST["first_names"]) && strlen($_POST["first_names"]) <= 100 && !is_numeric($_POST["first_names"]) && !preg_match("/[0-9]/", $_POST["first_names"])) {
        // Nombre válido
    } else {
        $errors["first_names"] = "El nombre no es válido.";
    }

    // Validar apellido
    if(!empty($_POST["last_names"]) && strlen($_POST["last_names"]) <= 100 && !is_numeric($_POST["last_names"]) && !preg_match("/[0-9]/", $_POST["last_names"])) {
        // Apellido válido
    } else {
        $errors["last_names"] = "El apellido no es válido.";
    }

    // Validar correo electrónico
    if(!empty($_POST["email"]) && filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
        // Correo electrónico válido
    } else {
        $errors["email"] = "La dirección de correo electrónico no es válida.";
    }

    // Validar número de teléfono
    if(!empty($_POST["phone"]) && is_numeric($_POST["phone"]) && strlen($_POST["phone"]) >= 9){
        // Número de teléfono válido
    } else {
        $errors["phone"] = "El número de teléfono no es válido.";
    }

    // Validar fecha de nacimiento
    if(!empty($_POST["birth_date"])){
        // Fecha de nacimiento válida
    } else {
        $errors["birth_date"] = "La fecha de nacimiento es obligatoria.";
    }

    // Validar dirección
    if(!empty($_POST["u_address"])){
        // Dirección válida
    } else {
        $errors["u_address"] = "La dirección es obligatoria.";
    }

    // Validar género
    if(!empty($_POST["radio_gender"])){
        // Género válido
    } else {
        $errors["radio_gender"] = "El género es obligatorio.";
    }

    // Validar contraseñas
    if(!empty($_POST["password1"]) && strlen($_POST["password1"]) >= 10 && $_POST["password1"] == $_POST["password2"]){
        // Contraseñas válidas y coinciden
    } else {
        $errors["password1"] = "La contraseña debe tener al menos 10 caracteres y coincidir.";
    }

    // Validar aceptación de términos y condiciones
    if(empty($_POST["aceptarTerminos"])) {
        $errors["aceptarTerminos"] = "Debes aceptar los términos y condiciones.";
    }

    // Si no hay errores, procesar el formulario
    if(empty($errors)) {
        // Procesar el formulario, por ejemplo, guardar los datos en la base de datos
        // header("Location: success.php"); // Redirigir a una página de éxito
        // exit();
    }

    if (isset($_POST["registrarse"]) && count($errors) ==0) {

        header("Location:index.php");
    }
}
?>

