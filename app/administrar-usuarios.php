<?php
include './includes/connection.php';
$users = mysqli_query($conn, "SELECT user_id, first_names, last_names, email FROM users_data")

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
    <link rel="stylesheet" href="../resources/css/bootstrap.css">
    <!-- Iconos Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../resources/css/style.css">

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
                            <a class="nav-link" aria-current="page" href="index.html">Inicio</a>
                        </li>

                        <li class="nav-item px-2">
                            <a class="nav-link" href="./views/noticias.html">Noticias</a>
                        </li>
                        <li class="nav-item px-2">
                            <a class="nav-link" href="./views/registro.html">Registro</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav> <!-- Nav bar section End -->


    </header> <!-- Header section End -->


    <!-- Table to display user information Begin-->
    <div class="container py-5 my-5">
        <div class="row">
            <table class="table table-striped text-dark">
                <tr>
                    <th scope="col">Nombres</th>
                    <th scope="col">Apellidos</th>
                    <th scope="col">Email</th>
                    <th scope="col">Acci&oacute;n</th>
                </tr>
                <?php 
                    while ($user = mysqli_fetch_assoc($users)){ ?>
                        <tr>
                            <td><?= $user["first_names"]; ?></td>
                            <td><?= $user["last_names"]; ?></td>
                            <td><?= $user["email"]; ?></td>
                            <td>
                                <a href="ver.php?id=<?= $user["user_id"]; ?>" class="btn btn-success">Ver</a>
                                <a href="editar.php?id=<?= $user["user_id"]; ?>" class="btn btn-warning">Editar</a>
                                <a href="borrar.php?id=<?= $user["user_id"]; ?>" class="btn btn-danger">Borrar</a>
                            </td>
                        </tr>
                <?php } ?>
            </table>
        </div>
    </div> <!-- Table to display user information End-->

    
    <!-- Footer section Begin -->
    <footer class="container">
        <div class="row my-5 pt-3 border-top border-secondary">
            <div class="col-md-6 text-white">
                <p class="text-center text-md-start">
                    <span class="text-uppercase fw-bold"><span class="text-primary">Neo</span>Gymnasion</span>
                    &copy;<script>document.write(new Date().getFullYear());</script> Todos los derechos reservados.
                </p>
            </div>
            <div class="col-md-6 d-flex justify-content-center justify-content-md-end">
                <a href="https://twitter.com/" target="_blank"><i class="bi bi-twitter mx-1"></i></a>

                <a href="https://www.facebook.com/" target="_blank"><i class="bi bi-facebook mx-1"></i></a>

                <a href="https://www.linkedin.com/" target="_blank"><i class="bi bi-linkedin mx-1"></i></a>

                <a href="https://www.instagram.com/" target="_blank"><i class="bi bi-instagram mx-1"></i></a>
            </div>
        </div>
    </footer>
    <!-- Footer section End -->

    <!-- Loading Boostrap JS bundle -->
    <script src="resources/js/bootstrap.bundle.js"></script>
</body>
</html>
