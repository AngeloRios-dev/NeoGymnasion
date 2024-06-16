<?php 
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    include 'includes/connection.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $appointment_id = intval($_POST['appointment_id']);
        $appointment_date = mysqli_real_escape_string($conn, $_POST['appointment_date']);
        $appointment_reason = mysqli_real_escape_string($conn, $_POST['appointment_reason']);
        $fk_user_id = intval($_POST['fk_user_id']);

        // Actualizar la cita
        $update_query = "UPDATE appointments SET appointment_date = ?, appointment_reason = ?, fk_user_id = ? WHERE appointment_id = ?";
        $stmt = mysqli_prepare($conn, $update_query);
        mysqli_stmt_bind_param($stmt, "ssii", $appointment_date, $appointment_reason, $fk_user_id, $appointment_id);

        if (mysqli_stmt_execute($stmt)) {
            $_SESSION['success_message'] = "Cita actualizada correctamente.";
        } else {
            $_SESSION['fail_message'] = "Error al actualizar la cita: " . mysqli_stmt_error($stmt);
        }

        mysqli_stmt_close($stmt);
        header("Location: editar-cita.php?id={$appointment_id}");
        exit();
    } else {
        header("Location: administrar-citas.php");
        exit();
    }
?>
