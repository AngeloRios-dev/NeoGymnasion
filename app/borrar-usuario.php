<?php
$tituloPagina = "Borrar Usuario";
include "./includes/header.php";

// Verifica si se ha enviado el ID del usuario a eliminar
if (!isset($_GET["id"]) || empty($_GET["id"]) || !is_numeric($_GET["id"])) {
    header("Location:administrar-usuarios.php");
    exit();
}

$user_id = $_GET["id"];

// Verifica si el usuario existe antes de mostrar el formulario de confirmación
$user_query = mysqli_query($conn, "SELECT * FROM NeoGymnasion.users_data WHERE user_id = {$user_id}");
$user = mysqli_fetch_assoc($user_query);

if (!$user) {
    header("Location:administrar-usuarios.php");
    exit();
}

$user_fields = [
    "Tel&eacute;fono" => "phone",
    "Direcci&oacute;n" => "u_address",
    "Fecha de nacimiento" => "birth_date",
];

?>
<section class="d-flex align-items-center min-vh-100">
    <div class="container">

        <div class="row justify-content-center">

            <div class="col-12 col-md-4">
                <div class="card h-100 shadow-sm border-0">
                    <div class="card-header fw-bold text-center">
                        <h2 class="card-title">
                            <?php echo $user["first_names"] ." ". $user["last_names"]; ?>
                        </h2>
                        <h6 class="card-subtitle text-body-secondary">
                        <?php echo $user["email"]; ?>  
                        </h6>
                    </div>
                    <div class="card-body">
                        <p class="card-text my-3">
                            <?php
                                if (isset($user)) {
                                    foreach ($user_fields as $label => $field) { ?>
                                            <span class="fw-bold"><?php echo $label; ?>:</span>
                                            <?php echo $user[$field] .  "<br>"; ?> 
                                    <?php }
                                }
                            ?>
                            <br>
                            El usuario esta a punto de ser eliminado. <br>
                            ¿Est&aacute;s seguro?
                            
                        </p>
                        <div class="card-footer d-flex flex-column">
                            <form method="post" action="borrar-usuario-handler.php">
                                <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
                                <button type="submit" name="confirm_delete" class="btn btn-danger">S&iacute;, eliminar</button>
                                <a href="administrar-usuarios.php" class="btn btn-secondary">Cancelar</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</section>

<?php
include $includesPath . "/footer.php";
?>
