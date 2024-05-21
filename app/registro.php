<?php
    include 'recibir-registro.php';

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="En NeoGymnasion, nos inspiramos en la fortaleza y disciplina de los antiguos guerreros espartanos y luchadores griegos, así como en los principios del estoicismo, para crear un espacio único donde el cuerpo y la mente se fortalecen en armonía.">
    <meta name="keywords" content="gimnacio, disciplina, guerrero, estoicismo, salud, armonia">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Noticias del Gym | NeoGymnasion</title>

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
                <a class="navbar-brand text-light fw-bold fs-1 text-uppercase" href="../index.html"><span class="text-primary">Neo</span>Gymnasion</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse bg-clr-500" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item px-2">
                            <a class="nav-link" aria-current="page" href="../index.html">Inicio</a>
                        </li>

                        <li class="nav-item px-2">
                            <a class="nav-link" href="../views/noticias.html">Noticias</a>
                        </li>
                        <li class="nav-item px-2">
                            <a class="nav-link" href="../views/registro.html">Registro</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav> <!-- Nav bar section End -->
    </header> <!-- Header section End -->

    <!-- Registration form Begin -->
    <section class="container my-5 py-5 bg-light">
        <div class="row">
            <h2 class="text-center fw-bold my-5">Formulario de Registro</h2>
        </div>

        <form action="" method="POST" id="registrationForm">

            <fieldset class="row g-3">
                <legend>Datos personales</legend>
                <div class="col-md-6">
                    <label for="first_names" class="form-label">Nombres</label>
                    <input type="text" class="form-control" id="first_names" name="first_names" <?php setFieldValues($errors, "first_names"); ?>>
                    <?php echo showErrors($errors, "first_names"); ?>
                </div>
                <div class="col-md-6">
                    <label for="last_names" class="form-label">Apellidos</label>
                    <input type="text" class="form-control" id="last_names" name="last_names" <?php setFieldValues($errors, "last_names"); ?>>
                    <?php echo showErrors($errors, "last_names"); ?>
                </div>
                <div class="col-md-6">
                  <label for="email" class="form-label">Email</label>
                  <input type="email" class="form-control" id="email" name="email" <?php setFieldValues($errors, "email"); ?>>
                  <?php echo showErrors($errors, "email"); ?>
                </div>
                <div class="col-md-6">
                  <label for="phone" class="form-label">Tel&eacute;fono</label>
                  <input type="tel" class="form-control" id="phone" name="phone" <?php setFieldValues($errors, "phone"); ?>>
                  <?php echo showErrors($errors, "phone"); ?>
                </div>
                <div class="col-md-6">
                    <label for="birth_date" class="form-label">Fecha de Nacimiento</label>
                    <input type="date" class="form-control" id="birth_date" name="birth_date" <?php setFieldValues($errors, "birth_date"); ?>>
                    <?php echo showErrors($errors, "birth_date"); ?>
                </div>
                <div class="col-md-6">
                    <label for="u_address" class="form-label">Direcci&oacute;n</label>
                    <input type="text" class="form-control" id="u_address" name="u_address" <?php setFieldValues($errors, "u_address"); ?>>
                    <?php echo showErrors($errors, "u_address"); ?>
                </div>

                <div class="col-md-4 d-flex gap-4 mt-4">
                    <div class="d-flex gap-2">
                        <input type="radio" class="form-check-input" name="radio_gender" id="m_gender" value="m" <?php isChecked($errors, "radio_gender", "m"); ?>>
                        <label class="form-check-label" for="m_gender">Masculino</label>
                    </div>
                    <div class="d-flex gap-2">
                        <input type="radio" class="form-check-input" name="radio_gender" id="f_gender" value="f" <?php isChecked($errors, "radio_gender", "f"); ?>>
                        <label class="form-check-label" for="f_gender">Femenino</label>
                    </div>
                    <div class="d-flex gap-2">
                        <input type="radio" class="form-check-input" name="radio_gender" id="o_gender" value="o" <?php isChecked($errors, "radio_gender", "o"); ?>>
                        <label class="form-check-label" for="o_gender">Otro</label>
                    </div>
                </div>
                <div class="row col-md-6">
                    <?php echo showErrors($errors, "radio_gender"); ?>
                </div>
            </fieldset>

            <fieldset class="row g-3 mt-5">
                <legend>Seguridad</legend>
                <div class="col-md-6">
                    <label for="passwd" class="form-label">Contrase&ntilde;a</label>
                    <input type="password" class="form-control" id="passwd" name="password1">
                </div>
                <div class="col-md-6">
                    <label for="passwd2" class="form-label">Repetir Contrase&ntilde;a</label>
                    <input type="password" class="form-control" id="passwd2" name="password2">
                </div>
                <div class="col-md-6">
                    <?php echo showErrors($errors, "password1"); ?>
                </div>
            </fieldset>

            

            <fieldset class="row g-3 mt-5">
                <legend>Aceptar T&eacute;rminos y Condiciones</legend>
                <div class="col-12">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="aceptarTerminos" name="aceptarTerminos" value="x" <?php isChecked($errors, "aceptarTerminos", "x"); ?>>
                    <label class="form-check-label" for="aceptarTerminos">
                        He le&iacute;do y acepto los <a href="#" class="gen-link" title="Enlace para leer los terminos">T&eacute;rminos</a> y <a href="#" class="gen-link" title="Enlace para leer condiciones">Condiciones</a>
                    </label>
                    <div class="col-md-6">
                        <?php echo showErrors($errors, "aceptarTerminos"); ?>
                    </div>
                  </div>
                </div>
                <div class="col-12">
                  <button type="submit" id="registrarse" class="btn btn-primary" name="registrarse">Registrarse</button>
                </div>
            </fieldset>
            
          </form>
    </section> <!-- Registration form End -->

    
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
    </footer> <!-- Footer section End -->
    <!-- Loading Boostrap JS bundle -->
    <script src="../resources/js/bootstrap.bundle.js"></script>
</body>
</html>
