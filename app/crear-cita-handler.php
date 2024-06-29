<?php
include "./includes/connection.php";
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fk_user_id = $_POST['fk_user_id']; // Este será el ID del usuario logueado si no es admin
    $fk_searched_user_id = isset($_POST['fk_searched_user_id']) ? $_POST['fk_searched_user_id'] : null; // ID del usuario encontrado
    $appointment_date = $_POST['appointment_date'];
    $appointment_reason = $_POST['appointment_reason'];

    // Verificar que los datos no estén vacíos
    if (empty($appointment_date) || empty($appointment_reason)) {
        $_SESSION['fail_message'] = "Todos los campos son obligatorios.";
        header("Location: crear-cita.php");
        exit();
    }

    // Determinar el ID de usuario correcto para la cita
    $final_user_id = $_SESSION['logged']['u_role'] === "admin" && !empty($fk_searched_user_id) ? $fk_searched_user_id : $fk_user_id;

    // Insertar la nueva cita en la base de datos
    $query = "INSERT INTO NeoGymnasion.appointments (fk_user_id, appointment_date, appointment_reason) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, 'iss', $final_user_id, $appointment_date, $appointment_reason);

    if (mysqli_stmt_execute($stmt)) {
        $_SESSION['success_message'] = "Cita creada exitosamente.";
    } else {
        $_SESSION['fail_message'] = "Error al crear la cita. Por favor, intente nuevamente.";
    }

    mysqli_stmt_close($stmt);
    header("Location: crear-cita.php");
    exit();
}
?>
