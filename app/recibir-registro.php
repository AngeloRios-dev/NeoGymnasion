<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
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


// function isChecked($errors, $field, $value) {
//     if (isset($errors) && count($errors) >= 1 && isset($_POST[$field]) && $_POST[$field] === $value) {
//         echo "checked";
//     }
// }
function isChecked($field, $value) {
    if (isset($_POST[$field]) && $_POST[$field] == $value) {
        echo "checked";
    }
}


function checkEmailExists($email) {
    global $conn; // Debes asegurarte de que la conexión a la base de datos esté disponible dentro de la función

    // Preparar la consulta para verificar si el correo electrónico existe
    $stmt = $conn->prepare("SELECT COUNT(*) AS count FROM users_data WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $count = $row['count'];

    $stmt->close();

    return $count > 0;
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
        $email = $_POST['email'];
    
        if (checkEmailExists($email)) {
            // El correo electrónico ya existe en la base de datos
            // Redirigir a la página de edición
            $_SESSION['fail_message'] = "Ya existe una cuenta con ese correo {$email}.";
            $errors["email"] = "Ya existe una cuenta con ese correo.";
            
        }
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

    // Asegúrate de validar que 'radio_role' está presente y tiene un valor aceptado
    if (isset($_POST['radio_role']) && in_array($_POST['radio_role'], ['user', 'admin'])) {
        $u_role = $_POST['radio_role'];
    } else {
        $u_role = 'user'; // valor por defecto o manejar el error según sea necesario
    }

    // Validar aceptación de términos y condiciones
    if(empty($_POST["aceptarTerminos"])) {
        $errors["aceptarTerminos"] = "Debes aceptar los términos y condiciones.";
    }

    // Si no hay errores, procesar el formulario
    if (empty($errors)) {
        // Iniciar una transacción
        mysqli_begin_transaction($conn);
    
        try {
            // Insertar datos del usuario en users_data
            $stmt1 = $conn->prepare("INSERT INTO NeoGymnasion.users_data (first_names, last_names, email, phone, birth_date, u_address, gender) VALUES (?, ?, ?, ?, ?, ?, ?)");
            $stmt1->bind_param("sssssss", $_POST["first_names"], $_POST["last_names"], $_POST["email"], $_POST["phone"], $_POST["birth_date"], $_POST["u_address"], $_POST["radio_gender"]);
            $stmt1->execute();
    
            // Obtener el user_id del nuevo usuario insertado
            $user_id = $conn->insert_id;
    
            // Insertar datos de login en users_login
            $hashed_password = sha1($_POST["password1"]);
            $stmt2 = $conn->prepare("INSERT INTO NeoGymnasion.users_login (fk_user_id, username, u_password, u_role) VALUES (?, ?, ?, ?)");
            $stmt2->bind_param("isss", $user_id, $_POST["email"], $hashed_password, $u_role);
            $stmt2->execute();
    
            // Confirmar la transacción
            mysqli_commit($conn);
    
            // Guardar el mensaje de éxito en la sesión
            $_SESSION['success_message'] = "Registro exitoso.";

            // Redirigir a la página de registro
            header("Location: registro.php");
            exit();

        } catch (Exception $e) {
            // Deshacer la transacción en caso de error
            mysqli_rollback($conn);
            echo "Error: " . $e->getMessage();
        }
    
        // Cerrar las declaraciones
        $stmt1->close();
        $stmt2->close();
    }

     
}
?>

