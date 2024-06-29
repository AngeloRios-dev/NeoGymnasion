<?php
include "./includes/connection.php";
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}


// Verifica si se ha confirmado la eliminación de la cita
if (isset($_POST['confirm_delete'])) {
    $appointment_id = $_POST['appointment_id'];

    // Elimina la cita de la tabla de citas
    $delete_appointment = "DELETE FROM NeoGymnasion.appointments WHERE appointment_id = ?";
    $stmt_appointment = mysqli_prepare($conn, $delete_appointment);
    mysqli_stmt_bind_param($stmt_appointment, "i", $appointment_id);
    mysqli_stmt_execute($stmt_appointment);

    // Redirige según el rol del usuario
    if (isset($_SESSION["logged"]["u_role"]) && $_SESSION["logged"]["u_role"] === "admin") {
        header("Location: administrar-citas.php");
    } else {
        header("Location: citaciones.php");
    }
    exit();
} else {
    // Si no se ha confirmado la eliminación, redirige según el rol del usuario
    if (isset($_SESSION["logged"]["u_role"]) && $_SESSION["logged"]["u_role"] === "admin") {
        header("Location: administrar-citas.php");
    } else {
        header("Location: citaciones.php");
    }
    exit();
}
?>