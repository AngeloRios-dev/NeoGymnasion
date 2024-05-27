<?php
include "./includes/header.php";

// Verifica si se ha enviado el ID del usuario a eliminar
if (!isset($_GET["id"]) || empty($_GET["id"]) || !is_numeric($_GET["id"])) {
    header("Location:administrar-usuarios.php");
    exit();
}

$user_id = $_GET["id"];

// Verifica si el usuario existe antes de mostrar el formulario de confirmación
$user_query = mysqli_query($conn, "SELECT first_names, last_names FROM NeoGymnasion.users_data WHERE user_id = {$user_id}");
$user = mysqli_fetch_assoc($user_query);

if (!$user) {
    header("Location:administrar-usuarios.php");
    exit();
}

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
}

// Muestra el formulario de confirmación para eliminar el usuario
?>
<div class="container mt-5 pt-5">
    <form method="post" action="borrar-usuario.php">
        <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
        <p class="text-light">¿Estás seguro de que quieres eliminar el usuario <span class="fw-bold"><?php echo $user["first_names"] ." ". $user["last_names"]; ?></span>?</p>
        <button type="submit" name="confirm_delete" class="btn btn-danger">Sí, eliminar</button>
        <a href="administrar-usuarios.php" class="btn btn-secondary">Cancelar</a>
    </form>
</div>



<?php
include $includesPath . "/footer.php";
?>
