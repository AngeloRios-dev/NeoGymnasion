<?php
    $tituloPagina = "Administrar Citas";
include "./includes/header.php";
include "./includes/req_admin.php";

// Función para limpiar datos
function cleanData($data) {
    return htmlspecialchars($data, ENT_QUOTES);
}

$search_email = isset($_GET['search_email']) ? cleanData($_GET['search_email']) : '';

// Consulta base
$appointments_query_base = "
    SELECT 
        a.appointment_id, 
        a.appointment_date, 
        a.appointment_reason, 
        u.first_names, 
        u.last_names, 
        u.email
    FROM 
        NeoGymnasion.appointments AS a
    JOIN 
        NeoGymnasion.users_data AS u 
    ON 
        a.fk_user_id = u.user_id
";

// Añadir filtro de correo si se ha proporcionado
if (!empty($search_email)) {
    $appointments_query_base .= " WHERE u.email LIKE '%$search_email%'";
}

// Ejecutar la consulta completa para obtener el número total de citas
$appointments_result = mysqli_query($conn, $appointments_query_base);
$appointments_count = mysqli_num_rows($appointments_result);

if ($appointments_count > 0) {
    $row_per_page = 6;
    $page = false;

    if (isset($_GET["page"])) {
        $page = $_GET["page"];
    }

    if (!$page) {
        $start = 0;
        $page = 1;
    } else {
        $start = ($page - 1) * $row_per_page;
    }

    $total_pages = ceil($appointments_count / $row_per_page);

    // Añadir límite a la consulta
    $query = $appointments_query_base . " ORDER BY a.appointment_date ASC LIMIT {$start}, {$row_per_page}";

    $appointments_result = mysqli_query($conn, $query);
} else {
    echo "No hay citas";
}
?>

<div class="container py-5 my-5 bg-light">
    <div class="row align-items-center pt-5">
        <div class="col-md-6">
            <h2 class="fw-bold text-danger">Administrar Citas</h2>
        </div>
        <div class="col-md-6 text-end">
            <form class="d-inline" action="" method="GET">
                <input type="text" name="search_email" placeholder="Buscar por email" class="form-control d-inline w-auto" value="<?php echo isset($_GET['search_email']) ? htmlspecialchars($_GET['search_email']) : ''; ?>">
                <button type="submit" class="btn btn-primary">Buscar</button>
            </form>
            <a href="crear-cita.php" class="btn btn-primary">Crear Cita</a>
        </div>
    </div>
    <div class="row my-5">
        <table class="table table-striped text-dark">
            <tr>
                <th scope="col">Fecha</th>
                <th scope="col">Motivo</th>
                <th scope="col">Nombre</th>
                <th scope="col">Usuario</th>
                <th scope="col">Acci&oacute;n</th>
            </tr>
            <?php 
                while ($appointment = mysqli_fetch_assoc($appointments_result)) { ?>
                    <tr>
                        <td><?= htmlspecialchars($appointment["appointment_date"]); ?></td>
                        <td><?= htmlspecialchars($appointment["appointment_reason"]); ?></td>
                        <td><?= htmlspecialchars($appointment["first_names"]) . " " . htmlspecialchars($appointment["last_names"]); ?></td>
                        <td><?= htmlspecialchars($appointment["email"]); ?></td>
                        <td>
                            <a href="editar-cita.php?id=<?= $appointment["appointment_id"]; ?>" class="btn btn-warning">Editar</a>
                            <a href="borrar-cita.php?id=<?= $appointment["appointment_id"]; ?>" class="btn btn-danger">Borrar</a>
                        </td>
                    </tr>
            <?php } ?>
        </table>
        <?php if ($appointments_count > 0) { ?>
            <nav aria-label="Page Navigation">
                <ul class="pagination text-light">
                    <li class="page-item <?= ($page <= 1) ? 'disabled' : ''; ?>">
                        <a class="page-link" href="?page=<?= ($page - 1); ?><?= isset($_GET['search_email']) ? '&search_email=' . htmlspecialchars($_GET['search_email']) : ''; ?>">Anterior</a>
                    </li>
                    <?php for ($i = 1; $i <= $total_pages; $i++) { ?>
                        <?php if ($page == $i) { ?>
                            <li class="page-item active"><a class="page-link" href="#"><?= $i; ?></a></li>
                        <?php } else { ?>
                            <li class="page-item"><a class="page-link" href="?page=<?= $i; ?><?= isset($_GET['search_email']) ? '&search_email=' . htmlspecialchars($_GET['search_email']) : ''; ?>"><?= $i; ?></a></li>
                        <?php } ?>
                    <?php } ?>
                    <li class="page-item <?= ($page >= $total_pages) ? 'disabled' : ''; ?>">
                        <a class="page-link" href="?page=<?= $page + 1; ?><?= isset($_GET['search_email']) ? '&search_email=' . htmlspecialchars($_GET['search_email']) : ''; ?>">Siguiente</a>
                    </li>
                </ul>
            </nav>
        <?php } ?>
    </div>
</div>

<!-- Insertar el Footer -->
<?php
    include $includesPath . "/footer.php";
?>
