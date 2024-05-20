<?php
    include './includes/connection.php';
    if (!isset($_GET["id"]) || empty($_GET["id"]) || !is_numeric($_GET["id"])) {
        header("Location:administrar-usuarios.php");
    }

    $id = $_GET["id"];
    $user_query = mysqli_query($conn, "SELECT * FROM users_data WHERE user_id = {$id}");
    $user = mysqli_fetch_assoc($user_query);
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
        <div class="row py-5">
            <table class="table table-striped text-dark">
                <tr>
                    <th scope="row">Nombres:</th>
                    <td><?= $user["first_names"]; ?></td>
                </tr>
                <tr>
                    <th scope="row">Apellidos:</th>
                    <td><?= $user["last_names"]; ?></td>
                </tr>            
                <tr>
                    <th scope="row">Email</th>
                    <td><?= $user["email"]; ?></td>
                </tr>
                <tr>
                    <th scope="row">Tel&eacute;fono</th>
                    <td><?= $user["phone"]; ?></td>
                </tr>
                <tr>
                    <th scope="row">Fecha Nacimiento</th>
                    <td><?= $user["birth_date"]; ?></td>
                </tr>
                <tr>
                    <th scope="row">Direcci&oacute;n</th>
                    <td><?= $user["u_address"]; ?></td>
                </tr>
                <tr>
                    <th scope="row">Genero</th>
                    <td><?= $user["gender"]; ?></td>
                </tr>
            </table>
            <div class="row">
                <div class="d-flex gap-3">
                    <a href="administrar-usuarios.php" class="btn btn-primary">Volver</a>
                    <a href="administrar-usuarios.php" class="btn btn-warning">Editar</a>
                    <a href="administrar-usuarios.php" class="btn btn-danger">Borrar</a>
                </div>
            </div>
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
