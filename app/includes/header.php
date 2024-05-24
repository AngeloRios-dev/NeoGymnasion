<?php
    session_start();
    function fileName() {
        // Obtiene la ruta completa del script actual
        $rutaCompleta = $_SERVER['PHP_SELF'];
        
        // Usa basename para obtener solo el nombre del archivo de la ruta completa
        $nombreArchivo = basename($rutaCompleta);
        
        return $nombreArchivo;
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="En NeoGymnasion, nos inspiramos en la fortaleza y disciplina de los antiguos guerreros espartanos y luchadores griegos, así como en los principios del estoicismo, para crear un espacio único donde el cuerpo y la mente se fortalecen en armonía.">
    <meta name="keywords" content="gimnacio, disciplina, guerrero, estoicismo, salud, armonia">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenidos | NeoGymnasion</title>

    <!-- CSS styles using bootstrap -->
    <link rel="stylesheet" href="resources/css/bootstrap.css">
    <!-- Iconos Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="resources/css/style.css">

</head>
<body class="bg-dark">
    <header> <!-- Header section Begin -->
        <!-- Nav bar section Begin -->
        <nav class="navbar navbar-dark navbar-expand-lg fixed-top bg-dark bg-gradient">
            <div class="container">
                <a class="navbar-brand text-light fw-bold fs-1 text-uppercase" href="index.html"><span class="text-primary">Neo</span>Gymnasion</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse bg-clr-500" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item px-2">
                            <a class="nav-link" aria-current="page" href="index.php">Inicio</a>
                        </li>

                        <li class="nav-item px-2">
                            <a class="nav-link" href="./app/ingresar.php">Iniciar Sesi&oacute;n</a>
                        </li>
                        <li class="nav-item px-2">
                            <a class="nav-link" href="./app/registro.php">Registro</a>
                        </li>
                        <?php
                            if (isset($_SESSION["logged"])) { ?>
                            <li class="nav-item px-2">
                                <a class="nav-link" href="./app/logout.php">Cerrar Sesi&oacute;n</a>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </nav> <!-- Nav bar section End -->


    </header> <!-- Header section End -->