<?php $page_title = 'Bienvenidos';?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="En NeoGymnasion, nos inspiramos en la fortaleza y disciplina de los antiguos guerreros espartanos y luchadores griegos, así como en los principios del estoicismo, para crear un espacio único donde el cuerpo y la mente se fortalecen en armonía.">
    <meta name="keywords" content="gimnacio, disciplina, guerrero, estoicismo, salud, armonia">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $page_title; ?> | NeoGymnasion</title>

    <!-- css styles using bootstrap -->
    <link rel="stylesheet" href="resources/css/bootstrap.css">
    <!-- Iconos Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body class="bg-dark">
    <header> <!-- seccion header -->
        <!-- barra de navegacion -->
        <nav class="navbar navbar-dark navbar-expand-lg fixed-top">
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
                            <a class="nav-link" href="./views/clases.php">Clases</a>
                        </li>
                        <li class="nav-item px-2">
                            <a class="nav-link" href="./views/noticias.php">Noticias</a>
                        </li>
                        <li class="nav-item px-2">
                            <a class="nav-link" href="./views/citas.php">Citas</a>
                        </li>
                        <li class="nav-item px-2">
                            <a class="nav-link" href="./views/perfil.php">Perfil</a>
                        </li>
                        <li class="nav-item px-2">
                            <a class="nav-link" href="./views/logout.php">Cerrar Sesi&oacute;n</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav> <!-- FIN barra de navegacion -->


    </header> <!-- FIN seccion header -->

<!-- carousel section -->
<div id="carouselE" class="carousel slide" data-bs-ride="carousel">

    <!-- carousel indicator buttons -->
    <!-- <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselE" data-bs-slide-to="0" class="active" aria-current="true" aria-label="1"></button>
        <button type="button" data-bs-target="#carouselE" data-bs-slide-to="1" aria-current="true" aria-label="2"></button>

    </div>  -->
    <!-- END carousel indicator buttons -->

    <!-- Carousel images -->
    <div class="carousel-inner">

        <div class="carousel-item active">
            <img src="resources/img/hero/hero-1.jpg" class="d-block w-100 img-fluid" alt="Foto de hombre levantando pesas" width="1920" height="1040">

            <div class="row carousel-caption">
                <div class="col-lg-12">
                    <div class="text-uppercase">
                        <span>Entrena como un guerrero</span>
                        <h1>forja tu cuerpo, <strong class="text-primary">sé imparable</strong>.</h1>
                        <a href="#" class="btn btn-primary">Get info</a>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="carousel-item">
            <img src="resources/img/hero/hero-2.jpg" class="d-block w-100 img-fluid" alt="Foto de hombre levantando pesas" width="1920" height="1040">

            <div class="row carousel-caption">
                <div class="col-lg-12">
                    <div class="text-uppercase">
                        <span>Entrena como un guerrero</span>
                        <h1>forja tu cuerpo, <strong class="text-primary">sé imparable</strong>.</h1>
                        <a href="#" class="btn btn-primary">Get info</a>
                    </div>
                </div>
            </div>
        </div>

    </div> <!-- END Carousel images -->

    <button class="carousel-control-prev" type="button" data-bs-target="#carouselE" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>

    <button class="carousel-control-next" type="button" data-bs-target="#carouselE" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>

</div> <!-- END carousel section -->

    <!-- ChoseUs Section Begin -->
    <section>
        
    </section>
    <!-- ChoseUs Section End -->
    

    <footer class="container">

    </footer>
    <script src="resources/js/bootstrap.bundle.js"></script>
</body>
</html>