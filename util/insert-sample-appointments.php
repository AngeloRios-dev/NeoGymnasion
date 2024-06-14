<?php
require_once '../app/includes/connection.php';

// Verificar la conexión
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Obtener todos los user_id de la tabla users_data
$user_ids = [];
$result = $conn->query("SELECT user_id FROM users_data");

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $user_ids[] = $row['user_id'];
    }
} else {
    die("No se encontraron usuarios en la tabla users_data");
}

// Razones de la cita
$reasons = ['Entrenador', 'Yoga', 'Inteligencia Emocional'];

// Función para generar una fecha aleatoria en el año actual
function randomDateCurrentYear() {
    $year = date("Y");
    $month = mt_rand(1, 12);
    $day = mt_rand(1, cal_days_in_month(CAL_GREGORIAN, $month, $year));
    return sprintf("%04d-%02d-%02d", $year, $month, $day);
}

// Inserción de datos ficticios en la tabla appointments
for ($i = 0; $i < 40; $i++) {
    // Selecciona un user_id aleatorio
    $user_id = $user_ids[array_rand($user_ids)];
    // Genera una fecha aleatoria en el año actual
    $appointment_date = randomDateCurrentYear();
    // Selecciona una razón aleatoria
    $appointment_reason = $reasons[array_rand($reasons)];

    // Preparar la declaración SQL para insertar datos
    $stmt = $conn->prepare("INSERT INTO appointments (fk_user_id, appointment_date, appointment_reason) VALUES (?, ?, ?)");
    $stmt->bind_param("iss", $user_id, $appointment_date, $appointment_reason);

    // Ejecutar la declaración SQL
    $stmt->execute();
}

// Cerrar la conexión
$conn->close();

echo "Datos ficticios insertados correctamente.";
?>
