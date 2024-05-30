<?php
include "./includes/header.php";

// Función para verificar la existencia de la noticia
function validateNews($conn, $news_id) {
    $query = "SELECT * FROM NeoGymnasion.news WHERE news_id = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "i", $news_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $news = mysqli_fetch_assoc($result);
    mysqli_stmt_close($stmt);
    return $news;
}

// Verifica si se ha enviado el ID de la noticia a eliminar
if (isset($_GET["id"]) && is_numeric($_GET["id"])) {
    $news_id = $_GET["id"];
    $news = validateNews($conn, $news_id);
    if (!$news) {
        header("Location: administrar-noticias.php");
        exit();
    }
} else {
    header("Location: administrar-noticias.php");
    exit();
}
?>

<section class="d-flex align-items-center min-vh-100">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-4">
                <div class="card h-100 shadow-sm border-0">
                    <div class="card-header fw-bold text-center">
                        <h2 class="card-title"><?php echo htmlspecialchars($news["news_title"]); ?></h2>
                        <h6 class="card-subtitle text-body-secondary"><?php echo htmlspecialchars($news["news_date"]); ?></h6>
                    </div>
                    <div class="card-body">
                        <p class="card-text my-3">
                            <span class="fw-bold">Imagen:</span>
                            <img src="<?php echo $resourcesPath ?>/uploads/<?php echo htmlspecialchars($news['news_img']); ?>" class="img-fluid" alt="<?php echo htmlspecialchars($news['news_title']); ?>"><br><br>
                            <span class="fw-bold">Texto:</span>
                            <?php echo htmlspecialchars($news["news_text"]); ?><br><br>
                            La noticia está a punto de ser eliminada. ¿Estás seguro?
                        </p>
                        <div class="card-footer d-flex flex-column">
                            <form method="post" action="borrar-noticia-handler.php">
                                <input type="hidden" name="news_id" value="<?php echo $news_id; ?>">
                                <button type="submit" name="confirm_delete" class="btn btn-danger">Sí, eliminar</button>
                                <a href="administrar-noticias.php" class="btn btn-secondary">Cancelar</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
include "./includes/footer.php";
?>
