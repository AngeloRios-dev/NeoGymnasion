<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    
    include "./includes/connection.php";
    include "./includes/req_admin.php";

        // Obtener el nombre del archivo actual
        $currentFileName = basename($_SERVER['PHP_SELF']);
        // Establecer el recurso según el nombre del archivo
        if ($currentFileName === 'index.php') {
            $homePath = '.';
        } else {
            $homePath = '..';
        }
        $resourcesPath = $homePath . "/resources";
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $news_title = mysqli_real_escape_string($conn, $_POST['news_title']);
        $news_text = mysqli_real_escape_string($conn, $_POST['news_text']);
        $fk_user_id = intval($_POST['fk_user_id']);  // Usar el valor de la sesión

        // Calcula la fecha actual
        $news_date = date("Y-m-d");
    
        // Verificar que el directorio 'uploads' exista
        $target_dir = $resourcesPath . "/uploads/";
        if (!is_dir($target_dir)) {
            mkdir($target_dir, 0777, true);
        }
    
        // Manejo del archivo de imagen
        $news_img = basename($_FILES['news_img']['name']);
        $target_file = $target_dir . $news_img;
    
        if (move_uploaded_file($_FILES['news_img']['tmp_name'], $target_file)) {
            // Inserción de datos en la base de datos
            $insert_news = "INSERT INTO NeoGymnasion.news (news_title, news_img, news_text, news_date, fk_user_id) VALUES (?, ?, ?, ?, ?)";
    
            if ($stmt = mysqli_prepare($conn, $insert_news)) {
                mysqli_stmt_bind_param($stmt, "ssssi", $news_title, $news_img, $news_text, $news_date, $fk_user_id);
                mysqli_stmt_execute($stmt);
    
                if (mysqli_stmt_affected_rows($stmt) > 0) {
                    $_SESSION['success_message'] = "Noticia registrada correctamente.";

                } else {
                    $_SESSION['fail_message'] = "Error al registrar la noticia: " . mysqli_stmt_error($stmt);
                }
    
                mysqli_stmt_close($stmt);
            } else {
                $_SESSION['fail_message'] = "Error preparando la consulta: " . mysqli_error($conn);
            }
        } else {
            $_SESSION['fail_message'] = "Error al subir la imagen.";
        }
        
    }

    // Redirigir de vuelta al formulario
    header("Location: crear-noticia-form.php");
    exit();
?>
