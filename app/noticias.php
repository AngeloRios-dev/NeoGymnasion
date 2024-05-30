<?php
    include "./includes/header.php";

    // Definir el número de resultados por página
    $results_per_page = 6;

    // Determinar el número total de noticias
    $count_query = "SELECT COUNT(*) AS total FROM NeoGymnasion.news";
    $count_result = mysqli_query($conn, $count_query);
    $row = mysqli_fetch_assoc($count_result);
    $total_results = $row['total'];

    // Determinar el número de páginas disponibles
    $total_pages = ceil($total_results / $results_per_page);

    // Determinar la página actual
    $page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
    if ($page < 1) {
        $page = 1;
    } elseif ($page > $total_pages) {
        $page = $total_pages;
    }

    // Determinar el índice del primer resultado en la página actual
    $start_from = ($page - 1) * $results_per_page;

    // Consulta para obtener las noticias y los nombres de los usuarios, limitada por paginación
    $query = "
        SELECT 
            n.news_id,
            n.news_title, 
            n.news_img, 
            n.news_text, 
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
            n.news_date DESC
        LIMIT 
            $start_from, $results_per_page
    ";

    $result = mysqli_query($conn, $query);

    if (!$result) {
        echo "Error al realizar la consulta: " . mysqli_error($conn);
        exit();
    }
?>
    
    <div class="container mt-5 pt-5">
        <div class="row m-5">
            <h2 class="text-center text-white mb-5">Últimas Noticias</h2>
            <div class="row d-flex">
                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                    <div class="col-12 col-md-4 mb-3">
                        <div class="card h-100">
                            <img src="<?php echo $resourcesPath ?>/uploads/<?php echo htmlspecialchars($row['news_img']); ?>" class="card-img-top news-img-top img-fluid" alt="<?php echo htmlspecialchars($row['news_title']); ?>">
                            <div class="card-body">
                                <a href="ver-noticia.php?id=<?= $row["news_id"]; ?>" class="nav-link">
                                    <h5 class="card-title"><?php echo htmlspecialchars($row['news_title']); ?></h5>
                                </a>
                                <p class="card-text"><?php echo htmlspecialchars($row['news_text']); ?></p>
                                <a href="ver-noticia.php?id=<?= $row["news_id"]; ?>" class="link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover">Leer más...</a>
                            </div>
                            <div class="card-footer">
                                <p class="card-text text-muted d-flex justify-content-between">
                                    <small>Autor: <?php echo htmlspecialchars($row['first_names']) ." ". htmlspecialchars($row['last_names']); ?></small>
                                    <small>Fecha: <?php echo htmlspecialchars($row['news_date']); ?></small>
                                </p>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>

            <!-- Paginación -->
            <nav aria-label="Page navigation">
                <ul class="pagination justify-content-center">
                    <?php if ($page > 1): ?>
                        <li class="page-item"><a class="page-link" href="noticias.php?page=<?php echo $page - 1; ?>">Anterior</a></li>
                    <?php endif; ?>

                    <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                        <li class="page-item <?php if ($i == $page) echo 'active'; ?>">
                            <a class="page-link" href="noticias.php?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                        </li>
                    <?php endfor; ?>

                    <?php if ($page < $total_pages): ?>
                        <li class="page-item"><a class="page-link" href="noticias.php?page=<?php echo $page + 1; ?>">Siguiente</a></li>
                    <?php endif; ?>
                </ul>
            </nav>
        </div>
    </div>

<!-- Footer section Begin -->
<?php
    include "./includes/footer.php";
    mysqli_free_result($result);
    mysqli_free_result($count_result);
?>
