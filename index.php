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
    <link rel="stylesheet" href="resources/css/style.css">

</head>
<body class="bg-dark">
    <header> <!-- seccion header -->
        <!-- barra de navegacion -->
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
    <!-- <section class="py-5">
        <div class="container my-5">
            <div class="row">
                <div class="col-lg-12 mb-5">
                    <div class="text-white text-uppercase text-center">
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
    </section>  -->
    <!-- Choose Your Destiny Section End -->

    <!-- Classes section begin -->
    <section class="bg-dark">
        <div class="container my-5">
            <div class="row">
                <div class="col-lg-12 my-5">
                    <div class="text-center text-uppercase text-white">
                        <span class="text-primary fw-bold">Clases</span>
                        <h2>Lo que te ofrecemos</h2>
                    </div>
                </div>
            </div>

            <div class="row gy-4">

                <div class="col-12 col-lg-3">
                    <div class="card h-100 shadow-sm border-0">
                        <img src="resources/img/classes/class-1.jpg" class="card-img-top img-fluid" alt="imagen de franela destacada">
                        <div class="card-body d-flex flex-column">
                            <h3 class="card-title">Plan de Nutrici&oacute;n personalizado</h3>
                            <p class="card-text">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores maxime provident atque dolor ducimus voluptate!
                            </p>
                            <a href="#" class="btn btn-dark mt-auto">Ver Mas</a>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-lg-3">
                    <div class="card h-100 shasow-sm border-0">
                        <img src="resources/img/classes/class-2.jpg" alt="Mujer haciendo ejercicios de flexibilidad" class="card-img-top img-fluid">
                        <div class="card-body d-flex flex-column">
                            <h3 class="card-title">Entrenador Personal</h3>
                            <p class="card-text">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores maxime provident atque dolor ducimus voluptate!
                            </p>
                            <a href="#" class="btn btn-dark mt-auto">Ver Mas</a>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-lg-3">
                    <div class="card h-100 shadow-sm border-0">
                        <img src="resources/img//classes/class-3.jpg" alt="tres personas entrenando" class="card-img-top img-fluid">
                        <div class="card-body d-flex flex-column">
                            <h3 class="card-title">Clases Grupales</h3>
                            <p class="card-text">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores maxime provident atque dolor ducimus voluptate!
                            </p>
                            <a href="#" class="btn btn-dark mt-auto">Ver Mas</a>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-lg-3">
                    <div class="card h-100 shadow-sm border-0">
                        <img src="resources/img//classes/class-6.jpg" alt="tres personas entrenando" class="card-img-top img-fluid">
                        <div class="card-body d-flex flex-column">
                            <h3 class="card-title">Yoga e Inteligencia Emocional</h3>
                            <p class="card-text">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores maxime provident atque dolor ducimus voluptate!
                            </p>
                            <a href="#" class="btn btn-dark mt-auto">Ver Mas</a>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-lg-6">
                    <div class="card h-100 shadow-sm border-0">
                        <img src="resources/img//classes/class-4.jpg" alt="Hombre levantando pesas" class="card-img-top img-fluid">
                        <div class="card-body d-flex flex-column">
                            <h3 class="card-title">Entrenamientos de fuerza</h3>
                            <p class="card-text">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores maxime provident atque dolor ducimus voluptate!
                            </p>
                            <a href="#" class="btn btn-dark mt-auto">Ver Mas</a>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-lg-6">
                    <div class="card h-100 shadow-sm border-0">
                        <img src="resources/img/classes/class-5.jpg" alt="dos boxeadores" class="card-img-top img-fluid">
                        <div class="card-body d-flex flex-column">
                            <h3 class="card-title">Clases de Combate</h3>
                            <p class="card-text">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores maxime provident atque dolor ducimus voluptate!
                            </p>
                            <a href="#" class="btn btn-dark mt-auto">Ver Mas</a>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </section>
    <!-- Classes section end -->

    <!-- Appointments Section Begin -->
    <section class="mt-5 pt-5">
        <div class="appointment-section set-bg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center text-white text-uppercase">
                        <h2>Asesorate con nuestros expertos</h2>
                        <a href="#" class="btn btn-outline-primary">Cita Previa</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Appointments Section End -->

    <!-- Pricing Section Begin -->
    <section class="bg-secondary py-5">
        <div class="container">
            <div class="row col-lg-12 mb-5">
                <div class="text-center text-uppercase text-white">
                    <span class="text-dark fw-bold">Nuestros Planes</span>
                    <h2>Escoje el plan que mejor te convenga</h2>
                </div>
            </div>
            <div class="row">

                <div class="col-12 col-lg-4">
                    <div class="card h-100 shadow-sm border-0">
                        <div class="card-header fw-bold text-center">Plan B&aacute;sico - "Iniciado"</div>
                        <div class="card-body d-flex flex-column">
                            <h2 class="card-title fw-bold text-center">&euro;50</h2>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">Clases grupales (Muay Thai, MMA, BJJ, Kyokushinkai Karate)</li>
                                <li class="list-group-item">Acceso a entrenamientos de fuerza</li>
                                <li class="list-group-item">Acceso a clases de yoga e inteligencia emocional</li>
                                <li class="list-group-item">Sesiones semanales de meditación guiada</li>
                            </ul>
                            <a href="#" class="btn btn-primary mt-auto">Enl&iacute;state Ahora</a>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-lg-4">
                    <div class="card h-100 shadow-sm border-0">
                        <div class="card-header fw-bold text-center">Plan Intermedio - "Guerrero"</div>
                        <div class="card-body d-flex flex-column">
                            <h2 class="cart-title fw-bold text-center">&euro;80</h2>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">Todo lo incluido en el Plan Básico</li>
                                <li class="list-group-item">Plan de nutrición personalizado</li>
                                <li class="list-group-item">Sesiones de entrenamiento personalizadas</li>
                                <li class="list-group-item">Sesiones bi-semanales de meditación guiada</li>
                            </ul>
                            <a href="#" class="btn btn-primary mt-auto">Enl&iacute;state Ahora</a>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-lg-4">
                    <div class="card h-100 shadow-sm border-0">
                        <div class="card-header fw-bold text-center">Plan Avanzado - "Heroico"</div>
                        <div class="card-body d-flex flex-column">
                            <h2 class="cart-title fw-bold text-center">&euro;120</h2>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">Todo lo incluido en los planes anteriores</li>
                                <li class="list-group-item">Acceso ilimitado a entrenamientos en combate</li>
                                <li class="list-group-item">Asesoramiento adicional de salud y bienestar</li>
                                <li class="list-group-item">Sesiones ilimitadas de meditación guiada</li>
                            </ul>
                            <a href="#" class="btn btn-primary mt-auto">Enl&iacute;state Ahora</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- Pricing Section End -->
    

    <footer class="container">

    </footer>
    <script src="resources/js/bootstrap.bundle.js"></script>
</body>
</html>