<?php
    $tituloPagina = "Administrar Noticias";
    include "./includes/header.php";
    include "./includes/req_admin.php";

    // Consulta para obtener las noticias y los nombres de los usuarios
    $news_query = "
        SELECT 
            n.news_id, 
            n.news_title, 
            n.news_date, 
            u.first_names, 
            u.last_names 
        FROM 
            NeoGymnasion.news AS n
        JOIN 
            NeoGymnasion.users_data AS u 
        ON 
            n.fk_user_id = u.user_id
    ";

    $news_result = mysqli_query($conn, $news_query);

    $news_count = mysqli_num_rows($news_result);
    if ($news_count > 0) {
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

        $total_pages = ceil($news_count / $row_per_page);

        $query = "
            SELECT 
                n.news_id, 
                n.news_title, 
                n.news_date, 
                u.first_names, 
                u.last_names 
            FROM 
                NeoGymnasion.news AS n
            JOIN 
                NeoGymnasion.users_data AS u 
            ON 
                n.fk_user_id = u.user_id
            ORDER BY 
                n.news_id ASC 
            LIMIT 
                {$start}, {$row_per_page}
        ";

        $news_result = mysqli_query($conn, $query);
    } else {
        echo "No hay noticias";
    }
?>


<div class="container py-5 my-5 bg-light">
    <div class="row align-items-center pt-5">
        <div class="col-md-6">
            <h2 class="fw-bold text-danger">Administrar Noticias</h2>
        </div>
        <div class="col-md-6 text-end">
            <a href="crear-noticia-form.php" class="btn btn-primary">Crear Noticia</a>
        </div>
    </div>
    <div class="row my-5">
        <table class="table table-striped text-dark">
            <tr>
                <th scope="col">Título</th>
                <th scope="col">Autor</th>
                <th scope="col">Fecha de Creación</th>
                <th scope="col">Acci&oacute;n</th>
            </tr>
            <?php 
                while ($news = mysqli_fetch_assoc($news_result)){ ?>
                    <tr>
                        <td><?= htmlspecialchars($news["news_title"]); ?></td>
                        <td><?= htmlspecialchars($news["first_names"]) . " " . htmlspecialchars($news["last_names"]); ?></td>
                        <td><?= htmlspecialchars($news["news_date"]); ?></td>
                        <td>
                            <a href="ver-noticia.php?id=<?= $news["news_id"]; ?>" class="btn btn-success">Ver</a>
                            <a href="editar-noticia.php?id=<?= $news["news_id"]; ?>" class="btn btn-warning">Editar</a>
                            <a href="borrar-noticia.php?id=<?= $news["news_id"]; ?>" class="btn btn-danger">Borrar</a>
                        </td>
                    </tr>
            <?php } ?>
        </table>
        <?php if ($news_count > 0) { ?>
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
</div> 

<!-- Insertar Footer -->
<?php
    include $includesPath . "/footer.php";
?>
