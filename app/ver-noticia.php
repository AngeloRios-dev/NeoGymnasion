<?php
    include "./includes/header.php";
    include "./includes/redirect.php";

    if (!isset($_GET["id"]) || empty($_GET["id"]) || !is_numeric($_GET["id"])) {
        header("Location: administrar-noticias.php");
        exit();
    }

    $id = $_GET["id"];
    $news_query = "
        SELECT 
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
        WHERE 
            n.news_id = {$id}
    ";

    $news_result = mysqli_query($conn, $news_query);

    if (!$news_result || mysqli_num_rows($news_result) == 0) {
        echo "No se encontró la noticia.";
        exit();
    }

    $news = mysqli_fetch_assoc($news_result);
?>

<div class="container mt-5 pt-5">
    <div class="row">
        <h2 class="text-center text-white pt-5 my-5">Noticia Completa</h2>
        <div class="col-12 mb-3">
            <div class="card">
                <img src="<?php echo $resourcesPath ?>/uploads/<?php echo htmlspecialchars($news['news_img']); ?>" class="card-img-top img-fluid" alt="<?php echo htmlspecialchars($news['news_title']); ?>">
                <div class="card-body">
                    <h5 class="card-title"><?php echo htmlspecialchars($news['news_title']); ?></h5>
                    <p class="card-text"><?php echo htmlspecialchars($news['news_text']); ?></p>
                </div>
                <div class="card-footer">
                    <p class="card-text text-muted d-flex justify-content-between">
                        <small>Autor: <?php echo htmlspecialchars($news['first_names']) . " " . htmlspecialchars($news['last_names']); ?></small>
                        <small>Fecha: <?php echo htmlspecialchars($news['news_date']); ?></small>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <?php
            if (isset($_SESSION["logged"]) && isset($_SESSION["logged"]["u_role"]) && $_SESSION["logged"]["u_role"] === "admin")  { ?>
                <div class="d-flex gap-3">
                    <a href="administrar-noticias.php" class="btn btn-primary">Volver</a>
                    <a href="editar-noticia.php?id=<?= $id; ?>" class="btn btn-warning">Editar</a>
                    <a href="borrar-noticia.php?id=<?= $id; ?>" class="btn btn-danger">Borrar</a>
                </div>
        <?php } else {?>
            <div class="d-flex gap-3">
                <a href="noticias.php" class="btn btn-primary">Volver</a>
            </div>
        <?php } ?>

        
    </div>
</div>

<!-- Footer section Begin -->
<?php
    include $includesPath . "/footer.php";
?>
