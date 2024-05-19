<?php
// Iniciar la sesión si aún no ha sido iniciada
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Verificar si se ha enviado el formulario de inicio de sesión
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Incluir el archivo de conexión a la base de datos
    require_once "connection.php";

    // Obtener el correo electrónico y la contraseña del formulario
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Consulta SQL para verificar el correo electrónico y la contraseña en la base de datos
    $sql = "SELECT * FROM users_data JOIN users_login ON users_data.user_id = users_login.fk_user_id WHERE email = ?";

    // Preparar la consulta
    $stmt = $conn->prepare($sql);

    // Bind parameters
    $stmt->bind_param("s", $email);

    // Ejecutar la consulta
    $stmt->execute();

    // Obtener el resultado de la consulta
    $result = $stmt->get_result();

    // Verificar si se encontró un usuario con el correo electrónico dado
    if ($result->num_rows == 1) {
        // Obtener los datos del usuario
        $row = $result->fetch_assoc();

        // Verificar si la contraseña ingresada coincide con la contraseña almacenada en la base de datos
        if (password_verify($password, $row["u_password"])) {
            // Iniciar la sesión del usuario
            $_SESSION["user_id"] = $row["user_id"];
            $_SESSION["username"] = $row["username"];
            $_SESSION["role"] = $row["u_role"];

            // Redirigir al usuario a una página de inicio de sesión exitoso
            // header("Location: welcome.php");
            echo "Correcto";
            exit();
        } else {
            // Contraseña incorrecta
            $error = "Contraseña incorrecta";
        }
    } else {
        // Usuario no encontrado
        $error = "El correo electrónico ingresado no está registrado";
    }

    // Cerrar la declaración y la conexión
    $stmt->close();
    $conn->close();
}
?>

<!-- Ahora puedes mostrar el formulario de inicio de sesión en tu HTML -->

