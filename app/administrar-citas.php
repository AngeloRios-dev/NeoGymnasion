<?php
    include "./includes/header.php";
    include "./includes/req_admin.php";

    // Consulta para obtener las citas y los nombres de los usuarios
    $appointments_query = "
        SELECT 
            a.appointment_id, 
            a.appointment_date, 
            a.appointment_reason, 
            u.first_names, 
            u.last_names 
        FROM 
            NeoGymnasion.appointments AS a
        JOIN 
            NeoGymnasion.users_data AS u 
        ON 
            a.fk_user_id = u.user_id
    ";

    $appointments_result = mysqli_query($conn, $appointments_query);

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

        $query = "
            SELECT 
                a.appointment_id, 
                a.appointment_date, 
                a.appointment_reason, 
                u.first_names, 
                u.last_names 
            FROM 
                NeoGymnasion.appointments AS a
            JOIN 
                NeoGymnasion.users_data AS u 
            ON 
                a.fk_user_id = u.user_id
            ORDER BY 
                a.appointment_date ASC 
            LIMIT 
                {$start}, {$row_per_page}
        ";

        $appointments_result = mysqli_query($conn, $query);
    } else {
        echo "No hay citas";
    }
?>

<!-- Table to display appointments information Begin-->
<div class="container py-5 my-5 bg-light">
    <div class="row align-items-center pt-5">
        <div class="col-md-6">
            <h2 class="fw-bold text-danger">Administrar Citas</h2>
        </div>
        <div class="col-md-6 text-end">
            <a href="crear-cita-form.php" class="btn btn-primary">Crear Cita</a>
        </div>
    </div>
    <div class="row my-5">
        <table class="table table-striped text-dark">
            <tr>
                <th scope="col">Fecha</th>
                <th scope="col">Motivo</th>
                <th scope="col">Usuario</th>
                <th scope="col">Acci&oacute;n</th>
            </tr>
            <?php 
                while ($appointment = mysqli_fetch_assoc($appointments_result)){ ?>
                    <tr>
                        <td><?= htmlspecialchars($appointment["appointment_date"]); ?></td>
                        <td><?= htmlspecialchars($appointment["appointment_reason"]); ?></td>
                        <td><?= htmlspecialchars($appointment["first_names"]) . " " . htmlspecialchars($appointment["last_names"]); ?></td>
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
                        <a class="page-link" href="?page=<?= ($page - 1); ?>">Anterior</a>
                    </li>
                    <?php for ($i = 1; $i <= $total_pages; $i++) { ?>
                        <?php if ($page == $i) { ?>
                            <li class="page-item active"><a class="page-link" href="#"><?= $i; ?></a></li>
                        <?php } else { ?>
                            <li class="page-item"><a class="page-link" href="?page=<?= $i; ?>"><?= $i; ?></a></li>
                        <?php } ?>
                    <?php } ?>
                    <li class="page-item <?= ($page >= $total_pages) ? 'disabled' : ''; ?>">
                        <a class="page-link" href="?page=<?= $page + 1; ?>">Siguiente</a>
                    </li>
                </ul>
            </nav>
        <?php } ?>
    </div>
</div> <!-- Table to display appointments information End-->

<!-- Footer section Begin -->
<?php
    include $includesPath . "/footer.php";
?>