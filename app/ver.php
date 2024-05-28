<?php
    include "./includes/header.php";
    include "redirect.php";
    if (!isset($_GET["id"]) || empty($_GET["id"]) || !is_numeric($_GET["id"])) {
        header("Location:administrar-usuarios.php");
    }

    $id = $_GET["id"];
    $user_query = mysqli_query($conn, "SELECT * FROM users_data WHERE user_id = {$id}");
    $login_data = mysqli_query($conn, "SELECT * FROM users_login WHERE fk_user_id = {$id}");

    $user = mysqli_fetch_assoc($user_query);
    $user_login = mysqli_fetch_assoc($login_data);
?>

        <!-- Table to display user information Begin-->
    <div class="container py-5 my-5">
        <div class="row py-5">
            <table class="table table-striped text-dark">
            <tr>
                    <th scope="row">ID:</th>
                    <td><?= $user["user_id"]; ?></td>
                </tr>
                <tr>
                    <th scope="row">Nombres:</th>
                    <td><?= $user["first_names"]; ?></td>
                </tr>
                <tr>
                    <th scope="row">Apellidos:</th>
                    <td><?= $user["last_names"]; ?></td>
                </tr>            
                <tr>
                    <th scope="row">Email:</th>
                    <td><?= $user["email"]; ?></td>
                </tr>
                <tr>
                    <th scope="row">Tel&eacute;fono:</th>
                    <td><?= $user["phone"]; ?></td>
                </tr>
                <tr>
                    <th scope="row">Fecha Nacimiento:</th>
                    <td><?= $user["birth_date"]; ?></td>
                </tr>
                <tr>
                    <th scope="row">Direcci&oacute;n:</th>
                    <td><?= $user["u_address"]; ?></td>
                </tr>
                <tr>
                    <th scope="row">Genero:</th>
                    <td>
                        <?php
                            if ($user["gender"] == "M") {
                                echo "Masculino";
                            }
                            if ($user["gender"] == "F") {
                                echo "Feminino";
                            } else {
                                echo "Sin espesificar";
                            }
                        ?>
                    </td>
                </tr>
                <tr>
                    <th scope="row">Rol:</th>
                    <td><?= $user_login["u_role"]; ?></td>
                </tr>
            </table>
            <div class="row">
                <div class="d-flex gap-3">
                    <a href="administrar-usuarios.php" class="btn btn-primary">Volver</a>
                    <a href="editar.php?id=<?= $user["user_id"]; ?>" class="btn btn-warning">Editar</a>
                    <a href="borrar-usuario.php?id=<?= $user["user_id"]; ?>" class="btn btn-danger">Borrar</a>
                </div>
            </div>
        </div>
    </div> <!-- Table to display user information End-->

    
<!-- Footer section Begin -->
<?php
    include $includesPath . "/footer.php";
?>