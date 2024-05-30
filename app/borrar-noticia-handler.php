<?php
include "./includes/connection.php";
    // Obtener el nombre del archivo actual
    $currentFileName = basename($_SERVER['PHP_SELF']);
    // Establecer el recurso según el nombre del archivo
    if ($currentFileName === 'index.php') {
        $homePath = '.';
    } else {
        $homePath = '..';
    }
    $resourcesPath = $homePath . "/resources";

// Verifica si se ha confirmado la eliminación de la noticia
if (isset($_POST['confirm_delete'])) {
    $news_id = $_POST['news_id'];

    // Obtener el nombre de la imagen de la base de datos
    $query = "SELECT news_img FROM NeoGymnasion.news WHERE news_id = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "i", $news_id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $news_img);
    mysqli_stmt_fetch($stmt);
    mysqli_stmt_close($stmt);

    // Eliminar la imagen si existe
    // Uncomment this to delete images.
    // $img_path = $resourcesPath . "/uploads/" . $news_img;
    // if (file_exists($img_path)) {
    //     unlink($img_path); 
    // }

    // Eliminar la noticia de la base de datos
    $delete_news = "DELETE FROM NeoGymnasion.news WHERE news_id = ?";
    $stmt = mysqli_prepare($conn, $delete_news);
    mysqli_stmt_bind_param($stmt, "i", $news_id);
    if (mysqli_stmt_execute($stmt)) {
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
        header("Location: administrar-noticias.php");
        exit();
    } else {
        echo "Error al eliminar la noticia: " . mysqli_error($conn);
    }
} else {
    header("Location: administrar-noticias.php");
    exit();
}
?>
