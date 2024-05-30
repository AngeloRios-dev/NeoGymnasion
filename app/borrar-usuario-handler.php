<?php
include "./includes/connection.php";

// Verifica si se ha confirmado la eliminación del usuario
if (isset($_POST['confirm_delete'])) {
    $user_id = $_POST['user_id'];

    // Elimina el usuario de la tabla de login
    $delete_login = "DELETE FROM NeoGymnasion.users_login WHERE fk_user_id = ?";
    $stmt_login = mysqli_prepare($conn, $delete_login);
    mysqli_stmt_bind_param($stmt_login, "i", $user_id);
    mysqli_stmt_execute($stmt_login);

    // Elimina el usuario de la tabla de datos
    $delete_data = "DELETE FROM NeoGymnasion.users_data WHERE user_id = ?";
    $stmt_data = mysqli_prepare($conn, $delete_data);
    mysqli_stmt_bind_param($stmt_data, "i", $user_id);
    mysqli_stmt_execute($stmt_data);

    // Redirige a la página de administración de usuarios después de eliminar el usuario
    header("Location:administrar-usuarios.php");
    exit();
} else {
    // Si no se ha confirmado la eliminación, redirige a la página de administración de usuarios
    header("Location:administrar-usuarios.php");
    exit();
}
?>
