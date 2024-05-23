<?php
// Iniciar la sesión al principio del script
session_start(); 
include 'includes/connection.php';
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

if(isset($_POST["actualizar"])) {
    // Comprobar campos obligatorios
    $required_fields = array("first_names", "last_names", "email", "phone", "birth_date", "u_address", "radio_gender", "radio_role");
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
    if(!empty($_POST["email"]) && filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        // Verificar si el correo electrónico ya existe en la base de datos
        $stmt_check_email = $conn->prepare("SELECT user_id FROM NeoGymnasion.users_data WHERE email = ? AND user_id != ?");
        $stmt_check_email->bind_param("si", $_POST["email"], $_POST["user_id"]);
        $stmt_check_email->execute();
        $stmt_check_email->store_result();
        
        if($stmt_check_email->num_rows > 0) {
            $errors["email"] = "La dirección de correo electrónico ya está en uso.";
        }

        $stmt_check_email->close();
    } else {
        $errors["email"] = "La dirección de correo electrónico no es válida.";
    }

    // Validar número de teléfono
    if(!empty($_POST["phone"]) && is_numeric($_POST["phone"]) && strlen($_POST["phone"]) >= 9) {
        // Número de teléfono válido
    } else {
        $errors["phone"] = "El número de teléfono no es válido.";
    }

    // Validar fecha de nacimiento
    if(!empty($_POST["birth_date"])) {
        // Fecha de nacimiento válida
    } else {
        $errors["birth_date"] = "La fecha de nacimiento es obligatoria.";
    }

    // Validar dirección
    if(!empty($_POST["u_address"])) {
        // Dirección válida
    } else {
        $errors["u_address"] = "La dirección es obligatoria.";
    }

    // Validar género
    if(!empty($_POST["radio_gender"])) {
        // Género válido
    } else {
        $errors["radio_gender"] = "El género es obligatorio.";
    }

    // Validar tipo de usuario
    if(!empty($_POST["radio_role"])) {
        // Tipo de usuario válido
    } else {
        $errors["radio_role"] = "El tipo de usuario es obligatorio.";
    }

    // Validar contraseñas solo si los campos no están vacíos
    if (!empty($_POST["password1"]) || !empty($_POST["password2"])) {
        if (!empty($_POST["password1"]) && strlen($_POST["password1"]) >= 10 && $_POST["password1"] === $_POST["password2"]) {
            $hashed_password = sha1($_POST["password1"]);
        } else {
            $errors["password1"] = "La contraseña debe tener al menos 10 caracteres y coincidir.";
        }
    }

    if (empty($errors)) {
        // Iniciar una transacción
        mysqli_begin_transaction($conn);
    
        try {
            // Actualizar datos del usuario en users_data
            $stmt1 = $conn->prepare("UPDATE NeoGymnasion.users_data SET first_names=?, last_names=?, email=?, phone=?, birth_date=?, u_address=?, gender=? WHERE user_id=?");
            $stmt1->bind_param("sssssssi", $_POST["first_names"], $_POST["last_names"], $_POST["email"], $_POST["phone"], $_POST["birth_date"], $_POST["u_address"], $_POST["radio_gender"], $_POST["user_id"]);
            $stmt1->execute();
    
            // Actualizar rol de usuario en users_login
            $stmt3 = $conn->prepare("UPDATE NeoGymnasion.users_login SET u_role=?, username=? WHERE fk_user_id=?");
            $stmt3->bind_param("ssi", $_POST["radio_role"], $_POST["email"], $_POST["user_id"]);
            $stmt3->execute();
    
            // Actualizar contraseña solo si ha sido proporcionada
            if (!empty($hashed_password)) {
                $stmt2 = $conn->prepare("UPDATE NeoGymnasion.users_login SET u_password=? WHERE fk_user_id=?");
                $stmt2->bind_param("si", $hashed_password, $_POST["user_id"]);
                $stmt2->execute();
                $stmt2->close();
            }
    
            // Confirmar la transacción
            mysqli_commit($conn);
    
            // Guardar el mensaje de éxito en la sesión
            $_SESSION['success_message'] = "Actualización exitosa.";
    
            // Redirigir a la página de edición
            header("Location: editar.php?id=" . $_POST["user_id"]);
            exit();
        } catch (Exception $e) {
            // Deshacer la transacción en caso de error
            mysqli_rollback($conn);
            echo "Error: " . $e->getMessage();
        }
    
        // Cerrar las declaraciones
        $stmt1->close();
        $stmt3->close();
    }    

}
?>
