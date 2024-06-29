<?php
    $tituloPagina = "Borrar Cita";
include "./includes/header.php";

// Verifica si se ha enviado el ID de la cita a eliminar
if (!isset($_GET["id"]) || empty($_GET["id"]) || !is_numeric($_GET["id"])) {
    header("Location:administrar-citas.php");
    exit();
}

$appointment_id = $_GET["id"];
$redirect_url = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'administrar-citas.php';

// Verifica si la cita existe antes de mostrar el formulario de confirmación
$appointment_query = mysqli_query($conn, "
    SELECT 
        appointments.appointment_id,
        appointments.appointment_date,
        appointments.appointment_reason,
        users_data.first_names,
        users_data.last_names,
        users_data.email
    FROM 
        NeoGymnasion.appointments 
    JOIN 
        NeoGymnasion.users_data 
    ON 
        appointments.fk_user_id = users_data.user_id 
    WHERE 
        appointment_id = {$appointment_id}
");
$appointment = mysqli_fetch_assoc($appointment_query);

if (!$appointment) {
    header("Location:administrar-citas.php");
    exit();
}

?>
<section class="d-flex align-items-center min-vh-100">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-4">
                <div class="card h-100 shadow-sm border-0">
                    <div class="card-header fw-bold text-center">
                        <h2 class="card-title">
                            <?php echo $appointment["first_names"] . " " . $appointment["last_names"]; ?>
                        </h2>
                        <h6 class="card-subtitle text-body-secondary">
                            <?php echo $appointment["email"]; ?>  
                        </h6>
                    </div>
                    <div class="card-body">
                        <p class="card-text my-3">
                            <span class="fw-bold">Fecha:</span> <?php echo $appointment["appointment_date"]; ?><br>
                            <span class="fw-bold">Motivo:</span> <?php echo $appointment["appointment_reason"]; ?><br>
                            <br>
                            La cita está a punto de ser eliminada. <br>
                            ¿Estás seguro?
                        </p>
                        <div class="card-footer d-flex flex-column">
                            <form method="post" action="borrar-cita-handler.php">
                                <input type="hidden" name="appointment_id" value="<?php echo $appointment_id; ?>">
                                <button type="submit" name="confirm_delete" class="btn btn-danger">Sí, eliminar</button>
                                <a href="<?php echo $redirect_url; ?>" class="btn btn-secondary">Cancelar</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
include $includesPath . "/footer.php";
?>
