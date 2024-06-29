<?php
include './includes/connection.php';

header('Content-Type: application/json');

// Función para limpiar datos
function cleanData($data) {
    return htmlspecialchars($data, ENT_QUOTES);
}

if (isset($_POST['email'])) {
    $email = cleanData($_POST['email']);

    $query = "
    SELECT 
        user_id,
        first_names, 
        last_names, 
        email 
    FROM 
        NeoGymnasion.users_data
    WHERE 
        email = '{$email}'
    ";

    $query_result = mysqli_query($conn, $query);

    if ($query_result && mysqli_num_rows($query_result) > 0) {
        $user_data = mysqli_fetch_assoc($query_result);
        echo json_encode(['success' => true, 'data' => $user_data]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Correo no encontrado']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Correo no proporcionado']);
}
?>
