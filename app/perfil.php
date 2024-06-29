<?php
    $tituloPagina = "Perfil de Usuario";
    include "includes/header.php";

    $username = $_SESSION["logged"]["username"];
    $user_id = $_SESSION["logged"]["fk_user_id"]; 
    // Usar una consulta preparada para mayor seguridad
    $stmt = $conn->prepare("SELECT * FROM users_data WHERE email = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $user_data = $result->fetch_assoc();

    $stmt->close();

    $user_fields = [
        "Tel&eacute;fono" => "phone",
        "Direcci&oacute;n" => "u_address",
        "Fecha de nacimiento" => "birth_date",
    ];

?>

    <section class="bg-dark">
        <div class="container my-5 py-md-5">
            <div class="row">
                <div class="col-lg-12 my-5">
                    <div class="text-center text-uppercase text-white">
                        <span class="text-primary fw-bold">Perfil de usuario</span>
                        <h2>Tus datos personales</h2>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">

                <div class="col-12 col-md-4">
                    <div class="card h-100 shadow-sm border-0">
                        <div>
                            <img src="<?php echo $resourcesPath."/img/banner-bg.jpg"; ?>" alt="imagen de fondo para perfil" class="card-img-top img-fluid">
                            <img src="<?php echo $resourcesPath."/img/general/default-profile-pic.jpg"; ?>" alt="profile pic" class="profile-img border-3 border-primary">
                        </div>
                        <div class="card-body">
                            <div class="text-center mb-3">
                                <h3 class="card-title">
                                    <?php
                                        if (isset($_SESSION["logged"])) { ?>
                                            <?php echo $user_data["first_names"] ." ". $user_data["last_names"]; ?>
                                    <?php } ?>
                                </h3>
                                <h6 class="card-subtitle text-body-secondary">
                                    <?php
                                        if (isset($_SESSION["logged"])) { ?>
                                            <?php echo $user_data["email"]; ?>
                                    <?php } ?>
                                </h6>
                            </div>
                            <div class="card-text">
                                <p>
                                    <?php
                                        if (isset($_SESSION["logged"])) {
                                            foreach ($user_fields as $label => $field) { ?>
                                                    <span class="fw-bold"><?php echo $label; ?>:</span>
                                                    <?php echo $user_data[$field] .  "<br>"; ?> 
                                            <?php }
                                        }
                                    ?>
                                </p>
                            </div>
                            <div class="card-footer">
                                <a href="editar.php?id=<?php echo $user_id; ?>" class="link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover">[Editar Perfil]</a>
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