<?php
    $tituloPagina = "Crea Nueva Noticia";
    include "./includes/header.php";
    include "./includes/req_admin.php";
?>

    <div class="container mt-5 pt-5 bg-light">
        <div class="row m-5">
            <h2 class="text-center">Crear Noticia</h2>
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
            <form action="crear-noticias.php" method="post" enctype="multipart/form-data">
                <div class="row g-3 my-3">
                    <div class="form-group">
                        <label class="form-label" for="news_title">Título de la Noticia</label>
                        <input type="text" class="form-control" id="news_title" name="news_title" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="news_text">Texto de la Noticia</label>
                        <textarea class="form-control" id="news_text" name="news_text" rows="5" required></textarea>
                    </div>

                    <div class="form-group">
                        <input type="hidden" name="fk_user_id" value="<?php echo $_SESSION['logged']['fk_user_id']; ?>">
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="news_img">Imagen de la Noticia</label>
                        <input type="file" class="form-control-file" id="news_img" name="news_img" required>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Crear Noticia</button>
            </form>
        </div>
    </div>
    
<?php
    include "./includes/footer.php";
?>