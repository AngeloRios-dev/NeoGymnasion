<?php
include "./includes/header.php";

// Función para limpiar datos
function cleanData($data) {
    return htmlspecialchars($data, ENT_QUOTES);
}

// Obtener el correo del usuario logueado
$login_mail = isset($_SESSION['logged']['username']) ? cleanData($_SESSION['logged']['username']) : '';

if ($login_mail) {
    // Consulta para obtener los nombres del usuario logueado
    $query = "
    SELECT 
        first_names, 
        last_names 
    FROM 
        NeoGymnasion.users_data
    WHERE 
        email = '{$login_mail}'
    ";

    $query_result = mysqli_query($conn, $query);

    if ($query_result && mysqli_num_rows($query_result) > 0) {
        $full_name = mysqli_fetch_assoc($query_result);
    } else {
        $full_name = ['first_names' => 'Nombre', 'last_names' => 'Apellido'];
    }
} else {
    $full_name = ['first_names' => 'Nombre', 'last_names' => 'Apellido'];
}

$user_name = trim($login_mail);
?>

<div class="container mt-5 pt-5 bg-light">
    <div class="row m-5">
        <h2 class="text-center fw-bold text-danger">Crear Cita</h2>
        <div class="row">
            <?php
            if (isset($_SESSION['success_message'])) {
                echo "<div class='alert alert-success text-center'>" . cleanData($_SESSION['success_message']) . "</div>";
                unset($_SESSION['success_message']);
            }
            if (isset($_SESSION['fail_message'])) {
                echo "<div class='alert alert-danger text-center'>" . cleanData($_SESSION['fail_message']) . "</div>";
                unset($_SESSION['fail_message']);
            }
            ?> 
        </div>
        <form action="crear-cita-handler.php" method="post">
            <div class="row g-3 my-3">
                <div class="form-group">
                    <label class="form-label" for="user_name"><?php echo $full_name["first_names"] . " " . $full_name["last_names"]; ?></label>
                    <input type="text" class="form-control" id="user_name" value="<?php echo $user_name; ?>" disabled>
                </div>
                <div class="form-group">
                    <label class="form-label" for="appointment_date">Fecha de la Cita</label>
                    <input type="date" class="form-control" id="appointment_date" name="appointment_date" required min="<?php echo date('Y-m-d'); ?>">
                </div>
                <div class="form-group">
                    <label class="form-label" for="appointment_reason">Motivo de la Cita</label>
                    <select class="form-control" id="appointment_reason" name="appointment_reason" required>
                        <option value="">Seleccione el motivo</option>
                        <option value="Entrenador">Entrenador</option>
                        <option value="Yoga">Yoga</option>
                        <option value="Inteligencia Emocional">Inteligencia Emocional</option>
                    </select>
                </div>
                <div class="form-group">
                    <input type="hidden" name="fk_user_id" value="<?php echo cleanData($_SESSION['logged']['fk_user_id']); ?>">
                </div>
            </div>
            <?php if (isset($_SESSION["logged"]) && isset($_SESSION["logged"]["u_role"]) && $_SESSION["logged"]["u_role"] === "admin")  { ?>
                <a href="administrar-citas.php" class="btn btn-primary">Volver</a>
            <?php } else { ?>
                <a href="citaciones.php" class="btn btn-primary">Volver</a>
            <?php } ?>
            <button type="submit" class="btn btn-success">Crear</button>
        </form>
    </div>
</div>

<!-- Footer section Begin -->
<?php
include "./includes/footer.php";
?>
