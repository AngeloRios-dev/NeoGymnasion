<?php
include "./includes/header.php";
include "./includes/redirect.php";

// Función para limpiar datos
function cleanData($data) {
    return htmlspecialchars($data, ENT_QUOTES);
}

// Obtener el correo del usuario logueado
$login_mail = isset($_SESSION['logged']['username']) ? cleanData($_SESSION['logged']['username']) : '';

if ($login_mail) {
    // Consulta para obtener los nombres del usuario logueado
    $query = "
    SELECT 
        first_names, 
        last_names 
    FROM 
        NeoGymnasion.users_data
    WHERE 
        email = '{$login_mail}'
    ";

    $query_result = mysqli_query($conn, $query);

    if ($query_result && mysqli_num_rows($query_result) > 0) {
        $full_name = mysqli_fetch_assoc($query_result);
    } else {
        $full_name = ['first_names' => 'Nombre', 'last_names' => 'Apellido'];
    }
} else {
    $full_name = ['first_names' => 'Nombre', 'last_names' => 'Apellido'];
}

$user_name = trim($login_mail);
?>

<div class="container mt-5 pt-5 bg-light">
    <div class="row m-5">
        <h2 class="text-center fw-bold text-danger">Crear Cita</h2>
        <div class="row">
            <?php
            if (isset($_SESSION['success_message'])) {
                echo "<div class='alert alert-success text-center'>" . cleanData($_SESSION['success_message']) . "</div>";
                unset($_SESSION['success_message']);
            }
            if (isset($_SESSION['fail_message'])) {
                echo "<div class='alert alert-danger text-center'>" . cleanData($_SESSION['fail_message']) . "</div>";
                unset($_SESSION['fail_message']);
            }
            ?> 
        </div>
        <form action="crear-cita-handler.php" method="post">
            <div class="row g-3 my-3">
                <?php if (isset($_SESSION["logged"]["u_role"]) && $_SESSION["logged"]["u_role"] === "admin") { ?>
                    <div class="form-group">
                        <label class="form-label" for="search_email">Buscar Usuario por Correo</label>
                        <input type="email" class="form-control" id="search_email" name="search_email" placeholder="Ingrese el correo del usuario">
                        <button type="button" class="btn btn-primary mt-2" onclick="searchUserByEmail()">Buscar</button>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="user_full_name">Usuario:</label>
                        <label class="form-label fw-bold" id="user_full_name"><?php echo $full_name["first_names"] . " " . $full_name["last_names"]; ?></label>
                        <input type="text" class="form-control" id="user_name" name="user_name" value="<?php echo $user_name; ?>" disabled>
                        <input type="hidden" id="fk_searched_user_id" name="fk_searched_user_id" value="">
                        <div id="user_info" class="mt-2"></div>
                    </div>
                <?php } else { ?>
                    <div class="form-group">
                        <label class="form-label" for="user_name"><?php echo $full_name["first_names"] . " " . $full_name["last_names"]; ?></label>
                        <input type="text" class="form-control" id="user_name" value="<?php echo $user_name; ?>" disabled>
                    </div>
                <?php } ?>
                <div class="form-group">
                    <label class="form-label" for="appointment_date">Fecha de la Cita</label>
                    <input type="date" class="form-control" id="appointment_date" name="appointment_date" required min="<?php echo date('Y-m-d'); ?>">
                </div>
                <div class="form-group">
                    <label class="form-label" for="appointment_reason">Motivo de la Cita</label>
                    <select class="form-control" id="appointment_reason" name="appointment_reason" required>
                        <option value="">Seleccione el motivo</option>
                        <option value="Entrenador">Entrenador</option>
                        <option value="Yoga">Yoga</option>
                        <option value="Inteligencia Emocional">Inteligencia Emocional</option>
                    </select>
                </div>
                <div class="form-group">
                    <input type="hidden" id="fk_user_id" name="fk_user_id" value="<?php echo cleanData($_SESSION['logged']['fk_user_id']); ?>">
                </div>
            </div>
            <?php if (isset($_SESSION["logged"]) && isset($_SESSION["logged"]["u_role"]) && $_SESSION["logged"]["u_role"] === "admin") { ?>
                <a href="administrar-citas.php" class="btn btn-primary">Volver</a>
            <?php } else { ?>
                <a href="citaciones.php" class="btn btn-primary">Volver</a>
            <?php } ?>
            <button type="submit" class="btn btn-success">Crear</button>
        </form>
    </div>
</div>

<!-- Footer section Begin -->
<?php
include "./includes/footer.php";
?>

<!-- AJAX Script -->
<script>
function searchUserByEmail() {
    const email = document.getElementById('search_email').value;

    if (email) {
        const xhr = new XMLHttpRequest();
        xhr.open('POST', 'buscar-usuario.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                const response = JSON.parse(xhr.responseText);
                const userFullNameLabel = document.getElementById('user_full_name');
                const userEmailInput = document.getElementById('user_name');
                const userInfoDiv = document.getElementById('user_info');
                const fkSearchedUserId = document.getElementById('fk_searched_user_id');

                if (response.success) {
                    userFullNameLabel.textContent = response.data.first_names + ' ' + response.data.last_names;
                    userEmailInput.value = response.data.email;
                    fkSearchedUserId.value = response.data.user_id; // Asigna el ID del usuario buscado al campo oculto
                    userInfoDiv.innerHTML = '';
                } else {
                    userFullNameLabel.textContent = 'Usuario no encontrado';
                    userEmailInput.value = '';
                    fkSearchedUserId.value = ''; // Limpia el ID del usuario buscado
                    userInfoDiv.innerHTML = '<div class="alert alert-danger">' + response.message + '</div>';
                }
            }
        };
        xhr.send('email=' + encodeURIComponent(email));
    }
}
</script>
