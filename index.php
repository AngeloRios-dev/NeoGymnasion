<?php $page_title = 'Bienvenidos';?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="En NeoGymnasion, nos inspiramos en la fortaleza y disciplina de los antiguos guerreros espartanos y luchadores griegos, así como en los principios del estoicismo, para crear un espacio único donde el cuerpo y la mente se fortalecen en armonía.">
    <meta name="keywords" content="gimnacio, disciplina, guerrero, estoicismo, salud, armonia">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $page_title; ?> | NeoGymnasion</title>

    <!-- CSS styles using bootstrap -->
    <link rel="stylesheet" href="resources/css/bootstrap.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="style.css">

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
                        <span>Desarrolla tu mente como un estratega</span>
                        <h1>fortalece tu esp&iacute;ritu, <strong class="text-primary">alcanza la grandeza</strong>.</h1>
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

    <!-- Choose Your Destiny Section Begin -->
    <section class="py-5">
        <div class="container my-5">
            <div class="row">
                <div class="col-lg-12 mb-5">
                    <div class="section-title text-white text-uppercase text-center">
                        <span class="text-primary">Elige tu destino</span>
                        <h2>Supera tus l&iacute;mites</h2>
                    </div>
                </div>
            </div>
    
            <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <h3 class="text-white">Deportes de Combate</h3>
                    <p class="text-secondary">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut dolore facilisis.</p>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <h3 class="text-white">Entrenamiento Personalizado</h3>
                    <p class="text-secondary">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut dolore facilisis.</p>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <h3 class="text-white">Entrenamiento Personalisado</h3>
                    <p class="text-secondary">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut dolore facilisis.</p>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <h3 class="text-white">Tu mente, tu templo</h3>
                    <p class="text-secondary">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut dolore facilisis.</p>
                </div>
            </div>
        </div>
    </section> 
    <!-- Choose Your Destiny Section End -->

    <!-- Classes section begin -->
    <section class="py-5">
        <div class="container my-5">
            <div class="row">
                <div class="col-lg-12 my-5">
                    <div class="section-title text-center text-uppercase text-white">
                        <span class="text-primary">Clases</span>
                        <h2>Lo que podemos ofrecerte</h2>
                    </div>
                </div>
            </div>

            <div class="row d-flex justify-content-center">
                <div class="card col-lg-4 col-md-6 bg-secondary">
                    <img src="resources/img/classes/class-1.jpg" class="car-img-top" alt="mujer tomando medidas">
                    <div class="card-body">
                        <h5 class="card-title">Entrenamiento Personalizado</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis, officiis!</p>
                        <a href="#" class="btn btn-primary">Ver mas</a>
                    </div>
                </div>

                <div class="card col-lg-4 col-md-6 bg-secondary">
                    <img src="resources/img/classes/class-2.jpg" alt="Mujer haciendo estiramientos" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">Mejora tu flexibilidad</h5>
                        <p class="card-text">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Culpa, optio?</p>
                        <a href="#" class="btn btn-primary">Ver mas</a>
                    </div>
                </div>

                <div class="card col-lg-4 col-md-6 bg-secondary">
                    <img src="resources/img/classes/class-3.jpg" alt="Clase grupal" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">Clases Grupales</h5>
                        <p class="card-tex">Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis, officiis!</p>
                        <a href="#" class="btn btn-primary">Ver mas</a>
                    </div>
                </div>

            </div>
            <div class="container">

                <div class="row d-flex justify-content-center">
                <div class="card col-lg-6 col-md-6 bg-secondary">
                    <img src="resources/img/classes/class-4.jpg" alt="Hombre levantando pesas" class="card-img-top">
                    <div class="card-body">
                        <h5 class="cart-title">Entrenamientos de fuerza</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis, officiis!</p>
                        <a href="#" class="btn btn-primary">Ver mas</a>
                    </div>
                </div>

                <div class="card col-lg-6 col-md-6 bg-secondary">
                    <img src="resources/img/classes/class-5.jpg" alt="Clase de yoga" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">Yoga</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis, officiis!</p>
                        <a href="#" class="btn btn-primary">Ver mas</a>
                    </div>
                </div>
    
                </div>
            </div>

        </div>
    </section>
    <!-- Classes section end -->
    

    <footer class="container">

    </footer>
    <script src="resources/js/bootstrap.bundle.js"></script>
</body>
</html>