<?php
    $tituloPagina = "Editar Usuario";
    include "./includes/header.php";
    include 'editar-usuario.php';


    if (!isset($_GET["id"]) || empty($_GET["id"]) || !is_numeric($_GET["id"])) {
        header("Location:administrar-usuarios.php");
    }

    $id = $_GET["id"];
    $user_query = mysqli_query($conn, "SELECT * FROM users_data WHERE user_id = {$id}");
    $login_data = mysqli_query($conn, "SELECT * FROM users_login WHERE fk_user_id = {$id}");

    $user = mysqli_fetch_assoc($user_query);
    $user_login = mysqli_fetch_assoc($login_data);


    $errors = isset($_SESSION['errors']) ? $_SESSION['errors'] : array();
    unset($_SESSION['errors']);
?>

    <section class="container my-5 py-5 bg-light">
        <div class="row">
            <h2 class="text-center fw-bold my-5 text-danger">Editar Usuario</h2>
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

        <form action="editar-usuario.php" method="POST" id="registrationForm">
            <input type="hidden" name="user_id" value="<?php echo $user['user_id']; ?>">
            <fieldset class="row g-3">
                <legend>Datos personales</legend>
                <div class="col-md-6">
                    <label for="first_names" class="form-label">Nombres</label>
                    <input type="text" class="form-control" id="first_names" name="first_names" <?php getFieldValues($user, "first_names"); ?>>
                    <?php echo showErrors($errors, "first_names"); ?>
                </div>
                <div class="col-md-6">
                    <label for="last_names" class="form-label">Apellidos</label>
                    <input type="text" class="form-control" id="last_names" name="last_names" <?php getFieldValues($user, "last_names"); ?>>
                    <?php echo showErrors($errors, "last_names"); ?>
                </div>
                <div class="col-md-6">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" <?php getFieldValues($user, "email"); ?>>
                    <?php echo showErrors($errors, "email"); ?>
                </div>
                <div class="col-md-6">
                    <label for="phone" class="form-label">Tel&eacute;fono</label>
                    <input type="tel" class="form-control" id="phone" name="phone" <?php getFieldValues($user, "phone"); ?>>
                    <?php echo showErrors($errors, "phone"); ?>
                </div>
                <div class="col-md-6">
                    <label for="birth_date" class="form-label">Fecha de Nacimiento</label>
                    <input type="date" class="form-control" id="birth_date" name="birth_date" <?php getFieldValues($user, "birth_date"); ?>>
                    <?php echo showErrors($errors, "birth_date"); ?>
                </div>
                <div class="col-md-6">
                    <label for="u_address" class="form-label">Direcci&oacute;n</label>
                    <input type="text" class="form-control" id="u_address" name="u_address" <?php getFieldValues($user, "u_address"); ?>>
                    <?php echo showErrors($errors, "u_address"); ?>
                </div>
                <div class="col-md-6">
                    <p>Genero:</p>
                    <div class="col-md-4 d-flex gap-4">
                        <div class="d-flex gap-2">
                            <input type="radio" class="form-check-input" name="radio_gender" id="m_gender" value="m" <?php getRadio($user, "gender", "M"); ?>>
                            <label class="form-check-label" for="m_gender">Masculino</label>
                        </div>
                        <div class="d-flex gap-2">
                            <input type="radio" class="form-check-input" name="radio_gender" id="f_gender" value="f" <?php getRadio($user, "gender", "F"); ?>>
                            <label class="form-check-label" for="f_gender">Femenino</label>
                        </div>
                        <div class="d-flex gap-2">
                            <input type="radio" class="form-check-input" name="radio_gender" id="o_gender" value="o" <?php getRadio($user, "gender", "O"); ?>>
                            <label class="form-check-label" for="o_gender">Otro</label>
                        </div>
                    </div>
                    <div class="row col-md-6">
                        <?php echo showErrors($errors, "radio_gender"); ?>
                    </div>
                </div>

               
            </fieldset>

            <fieldset class="row g-3 mt-5">
                <legend>Seguridad</legend>
                <?php
                    if (isset($_SESSION["logged"]) && isset($_SESSION["logged"]["u_role"]) && $_SESSION["logged"]["u_role"] === "admin")  { ?>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="username" class="form-label">Usuario:</label>
                            <input type="username" class="form-control" id="username" name="username" <?php getFieldValues($user_login, "username"); ?> disabled>
                            <?php echo showErrors($errors, "username"); ?>
                        </div>
                        <div class="col-md-6">
                            <p>Tipo de usuario:</p>
                            <div class="col-md-4 d-flex gap-4">
                                <div class="d-flex gap-2">
                                    <input type="radio" class="form-check-input" id="u_role" name="radio_role" value="user" <?php getRadio($user_login, "u_role", "user"); ?>>
                                    <label class="form-check-label" for="u_role">Usuario</label>
                                </div>
                                <div class="d-flex gap-2">
                                    <input type="radio" class="form-check-input" id="u_role" name="radio_role" value="admin" <?php getRadio($user_login, "u_role", "admin"); ?>>
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
                <div class="col-12">
                    <?php
                        if (isset($_SESSION["logged"]) && isset($_SESSION["logged"]["u_role"]) && $_SESSION["logged"]["u_role"] === "admin")  { ?>
                            <a href="administrar-usuarios.php" class="btn btn-primary">Volver</a>
                    <?php } else { ?>
                        <a href="perfil.php" class="btn btn-primary">Volver</a>
                    <?php }?>
                    
                    <button type="submit" id="actualizar" class="btn btn-success" name="actualizar">Actualizar</button>
                </div>
            </fieldset>
            
          </form>
    </section> 

    
<?php
    include $includesPath . "/footer.php";
?>
