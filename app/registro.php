<?php
    $tituloPagina = "Pagina de Registro";
    include "./includes/header.php";
    include 'recibir-registro.php';


?>
  
    <section class="container my-5 py-5 bg-light">
        <div class="row">
            <h2 class="text-center fw-bold my-5">Formulario de Registro</h2>
                <?php
                    if (isset($_SESSION['success_message'])) {
                        echo "<div class='alert alert-success text-center'>"."{$_SESSION['success_message']}"."</div>";
                        unset($_SESSION['success_message']);
                    }
                    if (isset($_SESSION['fail_message'])) {
                        echo "<div class='alert alert-danger text-center'>"."{$_SESSION['fail_message']}"."</div>";
                        unset($_SESSION['fail_message']);
                    }
                ?> 
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
                        <input type="radio" class="form-check-input" name="radio_gender" id="m_gender" value="m" <?php isChecked("radio_gender", "m"); ?>>
                        <label class="form-check-label" for="m_gender">Masculino</label>
                    </div>
                    <div class="d-flex gap-2">
                        <input type="radio" class="form-check-input" name="radio_gender" id="f_gender" value="f" <?php isChecked("radio_gender", "f"); ?>>
                        <label class="form-check-label" for="f_gender">Femenino</label>
                    </div>
                    <div class="d-flex gap-2">
                        <input type="radio" class="form-check-input" name="radio_gender" id="o_gender" value="o" <?php isChecked("radio_gender", "o"); ?>>
                        <label class="form-check-label" for="o_gender">Otro</label>
                    </div>
                </div>
                <div class="row col-md-6">
                    <?php echo showErrors($errors, "radio_gender"); ?>
                </div>
            </fieldset>

            <fieldset class="row g-3 mt-5">
                <legend>Seguridad</legend>
                <?php
                    if (isset($_SESSION["logged"]) && isset($_SESSION["logged"]["u_role"]) && $_SESSION["logged"]["u_role"] === "admin")  { ?>
                        <div class="row">
                            <div class="col-md-6">
                                <p>Tipo de usuario:</p>
                                <div class="col-md-4 d-flex gap-4">
                                    <div class="d-flex gap-2">
                                        <input type="radio" class="form-check-input" id="u_role" name="radio_role" value="user" <?php isChecked("radio_role", "user"); ?>>
                                        <label class="form-check-label" for="u_role">Usuario</label>
                                    </div>
                                    <div class="d-flex gap-2">
                                        <input type="radio" class="form-check-input" id="u_role" name="radio_role" value="admin" <?php isChecked("radio_role", "admin"); ?>>
                                        <label class="form-check-label" for="u_role">Administrador</label>
                                    </div>
                                    <?php echo showErrors($errors, "u_role"); ?>
                                </div>
                            </div>
                        </div>
                <?php } ?>
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
                    <input class="form-check-input" type="checkbox" id="aceptarTerminos" name="aceptarTerminos" value="x" <?php isChecked("aceptarTerminos", "x"); ?>>
                    <label class="form-check-label" for="aceptarTerminos">
                        He le&iacute;do y acepto los <a href="#" class="gen-link" title="Enlace para leer los terminos">T&eacute;rminos</a> y <a href="#" class="gen-link" title="Enlace para leer condiciones">Condiciones</a>
                    </label>
                    <div class="col-md-6">
                        <?php echo showErrors($errors, "aceptarTerminos"); ?>
                    </div>
                  </div>
                </div>
                <div class="col-12">
                    <?php
                        if (isset($_SESSION["logged"]) && isset($_SESSION["logged"]["u_role"]) && $_SESSION["logged"]["u_role"] === "admin")  {
                        $button_label = "Crear Usuario";    
                    } else {
                        $button_label = "Registrarme";
                    }?>
                  <button type="submit" id="registrarse" class="btn btn-primary" name="registrarse"><?php echo $button_label;?></button>

                </div>
            </fieldset>
            
          </form>
    </section> 

<?php
    include $includesPath . "/footer.php";
?>