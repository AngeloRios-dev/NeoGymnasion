<?php
    $tituloPagina = "Editar Noticia";
    include "./includes/header.php";
    include "./includes/req_admin.php";

    function getNewsData($data, $field) {
        if (isset($data) && count($data) >= 1 && isset($data[$field])) {
            return htmlspecialchars($data[$field], ENT_QUOTES);
        }
        return '';
    }

    if (!isset($_GET["id"]) || empty($_GET["id"]) || !is_numeric($_GET["id"])) {
        header("Location: administrar-usuarios.php");
        exit();
    }

    $id = $_GET["id"];
    $news_query = mysqli_query($conn, "SELECT news_title, news_img, news_text FROM news WHERE news_id = {$id}");

    if (!$news_query || mysqli_num_rows($news_query) == 0) {
        echo "No se encontró la noticia.";
        exit();
    }

    $news = mysqli_fetch_assoc($news_query);
?>

<div class="container mt-5 pt-5 bg-light">
    <div class="row m-5">
        <h2 class="text-center fw-bold text-danger">Editar Noticia</h2>
        <div class="row">
            <?php
                if (isset($_SESSION['success_message'])) {
                    echo "<div class='alert alert-success text-center'>"."{$_SESSION['success_message']}"."</div>";
                    unset($_SESSION['success_message']);
                }
                if (isset($_SESSION['fail_message'])) {
                    echo "<div class='alert alert-danger text-center'>"."{$_SESSION['fail_message']}"."</div>";
                    unset($_SESSION['fail_message']);
                }
            ?> 
        </div>
        <form action="editar-noticia-handler.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="news_id" value="<?php echo $id; ?>">
            <div class="row g-3 my-3">
                <div class="form-group">
                    <label class="form-label" for="news_title">Título de la Noticia</label>
                    <input type="text" class="form-control" id="news_title" name="news_title" value="<?php echo getNewsData($news, "news_title"); ?>" required>
                </div>

                <div class="form-group">
                    <label class="form-label" for="news_text">Texto de la Noticia</label>
                    <textarea class="form-control" id="news_text" name="news_text" rows="5" required><?php echo getNewsData($news, "news_text"); ?></textarea>
                </div>

                <div class="form-group">
                    <input type="hidden" name="fk_user_id" value="<?php echo $_SESSION['logged']['fk_user_id']; ?>">
                </div>

                <div class="form-group">
                    <p>Imagen actual:</p>
                    <?php if (!empty($news['news_img'])): ?>
                        <img src="<?php echo $resourcesPath ?>/uploads/<?php echo htmlspecialchars($news['news_img']); ?>" class="img-fluid mt-3" alt="Imagen actual">
                    <?php endif; ?>
                    <div class="mt-2">
                        <label class="form-label" for="news_img">Escoger otra imagen:</label>
                        <input type="file" class="form-control-file" id="news_img" name="news_img">
                    </div>
                </div>
            </div>
            <a href="administrar-noticias.php" class="btn btn-primary">Volver</a>
            <button type="submit" class="btn btn-success">Editar Noticia</button>
        </form>
    </div>
</div>


<?php
    include "./includes/footer.php";
?>
