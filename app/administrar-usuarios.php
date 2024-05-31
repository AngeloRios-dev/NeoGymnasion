<?php
    include "./includes/header.php";
    include "./includes/req_admin.php";
    $users = mysqli_query($conn, "SELECT user_id FROM users_data");

    $users_count = mysqli_num_rows($users);
    if ($users_count > 0) {
        $row_per_page = 10;
        $page = false;

        if (isset($_GET["page"])) {
            $page = $_GET["page"];
        }

        if (!$page) {
            $start = 0;
            $page = 1;
        } else {
            $start = ($page -1) * $row_per_page;
        }

        $total_pages = ceil($users_count / $row_per_page);

        $query = "SELECT user_id, first_names, last_names, email FROM users_data ORDER BY user_id ASC LIMIT {$start}, {$row_per_page};";
        $users = mysqli_query($conn, $query);
    } else {
        echo "No hay usuarios";
    }

?>



    <!-- Table to display user information Begin-->
    <div class="container py-5 my-5 bg-light">
        <div class="row align-items-center pt-5">
            <div class="col-md-6">
                <h2 class="fw-bold text-danger">Administrar Usuarios</h2>
            </div>
            <div class="col-md-6 text-end">
                <a href="crear-usuario.php" class="btn btn-primary">Crear Usuario</a>
            </div>
        </div>
        <div class="row py-5">
            <table class="table table-striped text-dark">
                <tr>
                    <th scope="col">Nombres</th>
                    <th scope="col">Apellidos</th>
                    <th scope="col">Email / Usuario</th>
                    <th scope="col">Acci&oacute;n</th>
                </tr>
                <?php 
                    while ($user = mysqli_fetch_assoc($users)){ ?>
                        <tr>
                            <td><?= $user["first_names"]; ?></td>
                            <td><?= $user["last_names"]; ?></td>
                            <td><?= $user["email"]; ?></td>
                            <td>
                                <a href="ver.php?id=<?= $user["user_id"]; ?>" class="btn btn-success">Ver</a>
                                <a href="editar.php?id=<?= $user["user_id"]; ?>" class="btn btn-warning">Editar</a>
                                <a href="borrar-usuario.php?id=<?= $user["user_id"]; ?>" class="btn btn-danger">borrar</a>
                            </td>
                        </tr>
                <?php } ?>
            </table>
            <?php if ($users_count >=1) { ?>
                <nav aria-label="Users page navigation">
                    <ul class="pagination text-light">
                        <li class="page-item"><a class="page-link" href="?page=<?= ($page -1); ?>">Anterior</a></li>
                        <?php for ($i = 1; $i <= $total_pages; $i++) { ?>
                            <?php if ($page == $i) { ?>
                                <li class="page-item disabled"><a class="page-link" href="#"><?= $i; ?></a></li>
                            <?php } else { ?>
                                <li class="page-item"><a class="page-link" href="?page=<?= $i; ?>"><?= $i; ?></a></li>
                            <?php } ?>
                        <?php } ?>
                        <?php $next_page = $page +1; if ($next_page <= $total_pages) { ?>
                            <li class="page-item"><a class="page-link" href="?page=<?= $page + 1; ?>">Siguiente</a></li>
                        <?php } else { ?>
                            <li class="page-item disabled"><a class="page-link" href="#">Siguiente</a></li>
                        <?php } ?>
                    </ul>
                </nav>
            <?php } ?>
        </div>
    </div> <!-- Table to display user information End-->

    
<!-- Footer section Begin -->
<?php
    include $includesPath . "/footer.php";
?>