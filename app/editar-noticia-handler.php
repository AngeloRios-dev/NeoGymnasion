<?php 
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    
    include 'includes/connection.php';


    if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $news_id = intval($_POST['news_id']);
            $news_title = mysqli_real_escape_string($conn, $_POST['news_title']);
            $news_text = mysqli_real_escape_string($conn, $_POST['news_text']);
            $fk_user_id = intval($_POST['fk_user_id']);

            // Manejo del archivo de imagen
            $news_img = $_FILES['news_img']['name'];
            if (!empty($news_img)) {
                $target_dir = "uploads/";
                $target_file = $target_dir . basename($news_img);

                if (move_uploaded_file($_FILES['news_img']['tmp_name'], $target_file)) {
                    // Actualizar la noticia con nueva imagen
                    $update_query = "UPDATE news SET news_title = ?, news_img = ?, news_text = ?, fk_user_id = ? WHERE news_id = ?";
                    $stmt = mysqli_prepare($conn, $update_query);
                    mysqli_stmt_bind_param($stmt, "sssii", $news_title, $news_img, $news_text, $fk_user_id, $news_id);
                } else {
                    $_SESSION['fail_message'] = "Error al subir la imagen.";
                    header("Location: editar-noticia.php?id={$news_id}");
                    exit();
                }
            } else {
                // Actualizar la noticia sin cambiar la imagen
                $update_query = "UPDATE news SET news_title = ?, news_text = ?, fk_user_id = ? WHERE news_id = ?";
                $stmt = mysqli_prepare($conn, $update_query);
                mysqli_stmt_bind_param($stmt, "ssii", $news_title, $news_text, $fk_user_id, $news_id);
            }

            if (mysqli_stmt_execute($stmt)) {
                $_SESSION['success_message'] = "Noticia actualizada correctamente.";
            } else {
                $_SESSION['fail_message'] = "Error al actualizar la noticia: " . mysqli_stmt_error($stmt);
            }

            mysqli_stmt_close($stmt);
            header("Location: editar-noticia.php?id={$news_id}");
            exit();
    } else {
        header("Location: administrar-noticias.php");
        exit();
    }
?>