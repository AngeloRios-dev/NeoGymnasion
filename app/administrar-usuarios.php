<?php

    // include './includes/connection.php';
    include "./includes/header.php";
    include "redirect.php";
    $users = mysqli_query($conn, "SELECT user_id, first_names, last_names, email FROM users_data")

?>



    <!-- Table to display user information Begin-->
    <div class="container py-5 my-5">
        <div class="row">
            <table class="table table-striped text-dark">
                <tr>
                    <th scope="col">Nombres</th>
                    <th scope="col">Apellidos</th>
                    <th scope="col">Email / Usuario</th>
                    <th scope="col">Acci&oacute;n</th>
                </tr>
                <?php 
                    while ($user = mysqli_fetch_assoc($users)){ ?>
                        <tr>
                            <td><?= $user["first_names"]; ?></td>
                            <td><?= $user["last_names"]; ?></td>
                            <td><?= $user["email"]; ?></td>
                            <td>
                                <a href="ver.php?id=<?= $user["user_id"]; ?>" class="btn btn-success">Ver</a>
                                <a href="editar.php?id=<?= $user["user_id"]; ?>" class="btn btn-warning">Editar</a>
                                <a href="borrar-usuario.php?id=<?= $user["user_id"]; ?>" class="btn btn-danger">borrar</a>
                            </td>
                        </tr>
                <?php } ?>
            </table>
        </div>
    </div> <!-- Table to display user information End-->

    
<!-- Footer section Begin -->
<?php
    include $includesPath . "/footer.php";
?>