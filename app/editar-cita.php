<?php
$tituloPagina = "Editar Cita";
include "./includes/header.php";


function getAppointmentData($data, $field) {
    if (isset($data) && count($data) >= 1 && isset($data[$field])) {
        return htmlspecialchars($data[$field], ENT_QUOTES);
    }
    return '';
}


$id = $_GET["id"];
$appointment_query = mysqli_query($conn, "SELECT appointment_date, appointment_reason, fk_user_id FROM appointments WHERE appointment_id = {$id}");

if (!$appointment_query || mysqli_num_rows($appointment_query) == 0) {
    echo "No se encontró la cita.";
    exit();
}

$appointment = mysqli_fetch_assoc($appointment_query);

// Obtener la información del usuario relacionado con la cita
$user_id = $appointment['fk_user_id'];
$user_query = mysqli_query($conn, "SELECT first_names, last_names FROM users_data WHERE user_id = {$user_id}");

if (!$user_query || mysqli_num_rows($user_query) == 0) {
    echo "No se encontró el usuario.";
    exit();
}

$user = mysqli_fetch_assoc($user_query);
?>

<div class="container mt-5 pt-5 bg-light">
    <div class="row m-5">
        <h2 class="text-center fw-bold text-danger">Editar Cita</h2>
        <div class="row">
            <?php
            if (isset($_SESSION['success_message'])) {
                echo "<div class='alert alert-success text-center'>" . "{$_SESSION['success_message']}" . "</div>";
                unset($_SESSION['success_message']);
            }
            if (isset($_SESSION['fail_message'])) {
                echo "<div class='alert alert-danger text-center'>" . "{$_SESSION['fail_message']}" . "</div>";
                unset($_SESSION['fail_message']);
            }
            ?> 
        </div>
        <form action="editar-cita-handler.php" method="post">
            <input type="hidden" name="appointment_id" value="<?php echo $id; ?>">
            <div class="row g-3 my-3">
                <div class="form-group">

                    <p>Usuario: <span class="fw-bold"><?php echo $user['first_names'] . ' ' . $user['last_names']; ?></span></p>
                </div>
                <div class="form-group">
                    <label class="form-label" for="appointment_date">Fecha de la Cita</label>
                    <input type="date" class="form-control" id="appointment_date" name="appointment_date" value="<?php echo getAppointmentData($appointment, "appointment_date"); ?>" required>
                </div>
                <div class="form-group">
                    <label class="form-label" for="appointment_reason">Motivo de la Cita</label>
                    <select class="form-control" id="appointment_reason" name="appointment_reason" required>
                        <option value="Entrenador" <?php echo getAppointmentData($appointment, "appointment_reason") == 'Entrenador' ? 'selected' : ''; ?>>Entrenador</option>
                        <option value="Yoga" <?php echo getAppointmentData($appointment, "appointment_reason") == 'Yoga' ? 'selected' : ''; ?>>Yoga</option>
                        <option value="Inteligencia Emocional" <?php echo getAppointmentData($appointment, "appointment_reason") == 'Inteligencia Emocional' ? 'selected' : ''; ?>>Inteligencia Emocional</option>
                    </select>
                </div>
                <div class="form-group">
                    <input type="hidden" name="fk_user_id" value="<?php echo $_SESSION['logged']['fk_user_id']; ?>">
                </div>
            </div>
            <?php
                if (isset($_SESSION["logged"]) && isset($_SESSION["logged"]["u_role"]) && $_SESSION["logged"]["u_role"] === "admin")  { ?>
                    <a href="administrar-citas.php" class="btn btn-primary">Volver</a>
            <?php } else { ?>
                <a href="citaciones.php" class="btn btn-primary">Volver</a>
            <?php }?>
            <button type="submit" class="btn btn-success">Actualizar</button>
        </form>
    </div>
</div>


<?php
include "./includes/footer.php";
?>
