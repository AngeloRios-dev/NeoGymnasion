<?php
require_once '../app/includes/connection.php';

// Insertar datos en la tabla users_data 
$insert_users = "INSERT INTO NeoGymnasion.users_data (first_names, last_names, email, phone, birth_date, u_address, gender)
    VALUES
        ('Juan', 'García', 'juan@example.com', '123456789', '1990-05-15', 'Calle Mayor 123, Madrid', 'M'),
        ('María', 'Martínez', 'maria@example.com', '987654321', '1985-08-20', 'Avenida Libertad 456, Barcelona', 'F'),
        ('Pedro', 'López', 'pedro@example.com', '654123789', '1993-02-10', 'Plaza España 789, Valencia', 'M'),
        ('Laura', 'Sánchez', 'laura@example.com', '789456123', '1988-11-25', 'Calle Gran Vía 987, Sevilla', 'F'),
        ('Carlos', 'Fernández', 'carlos@example.com', '147258369', '1995-04-03', 'Calle Real 321, Bilbao', 'M'),
        ('Ana', 'Gómez', 'ana@example.com', '369258147', '1992-09-12', 'Avenida Diagonal 654, Málaga', 'F'),
        ('David', 'Rodríguez', 'david@example.com', '258369147', '1980-07-08', 'Paseo de la Castellana 789, Zaragoza', 'M'),
        ('Elena', 'Jiménez', 'elena@example.com', '123789456', '1983-06-30', 'Calle Rambla 456, Palma de Mallorca', 'F'),
        ('Javier', 'Ruiz', 'javier@example.com', '369147258', '1975-03-18', 'Calle Mayor 159, Las Palmas de Gran Canaria', 'M'),
        ('Sofía', 'Díaz', 'sofia@example.com', '456789123', '1998-12-22', 'Avenida del Puerto 753, Tenerife', 'F'),
        ('Miguel', 'Hernández', 'miguel@example.com', '852369741', '1992-01-30', 'Calle Primavera 123, Madrid', 'M'),
        ('Sara', 'Pérez', 'sara@example.com', '963852741', '1987-04-25', 'Avenida Otoño 456, Valencia', 'F'),
        ('Lucía', 'Morales', 'lucia@example.com', '753159852', '1990-09-12', 'Calle Verano 789, Barcelona', 'F'),
        ('Raúl', 'Castro', 'raul@example.com', '951357852', '1982-11-18', 'Calle Invierno 321, Sevilla', 'M'),
        ('Paula', 'Vargas', 'paula@example.com', '852753159', '1994-03-05', 'Avenida Primavera 654, Zaragoza', 'F'),
        ('Adrián', 'Ramírez', 'adrian@example.com', '741963852', '1993-06-28', 'Calle Otoño 987, Málaga', 'M'),
        ('Natalia', 'Soto', 'natalia@example.com', '369741258', '1988-08-13', 'Avenida Verano 159, Bilbao', 'F'),
        ('Iván', 'Ortiz', 'ivan@example.com', '258147369', '1995-12-31', 'Calle Invierno 753, Palma de Mallorca', 'M'),
        ('Andrea', 'Flores', 'andrea@example.com', '147852369', '1984-07-19', 'Avenida Primavera 159, Las Palmas', 'O'),
        ('Alex', 'González', 'alex@example.com', '963258741', '1991-05-07', 'Calle Otoño 753, Tenerife', 'O'),
        ('First', 'Admin', 'first_admin@neo.com', '111111111', '1986-10-24', 'Calle Ciberespacio 101, Madrid', 'O'),
        ('Second', 'Admin', 'second_admin@neo.com', '222222222', '1986-10-24', 'Calle Ciberespacio 102, Madrid', 'O'),
        ('Third', 'Admin', 'third_admin@neo.com', '333333333', '1986-10-24', 'Calle Ciberespacio 103, Madrid', 'O');";
if (mysqli_query($conn, $insert_users)) {
    echo "Datos insertados correctamente.<br>";
} else {
    echo "Error: " . mysqli_error($conn);
}


// Preparar la consulta SQL para insertar logins
$insert_logins = "INSERT INTO NeoGymnasion.users_login (fk_user_id, username, u_password, u_role)
    SELECT user_id, email, ?, 'user' FROM NeoGymnasion.users_data";

// Preparar la sentencia
$stmt = mysqli_prepare($conn, $insert_logins);

if ($stmt) {
    // Definir la contraseña a insertar
    $password = sha1("password123");
    
    // Vincular el parámetro de la contraseña
    mysqli_stmt_bind_param($stmt, "s", $password);

    // Ejecutar la sentencia
    mysqli_stmt_execute($stmt);

    // Verificar si se insertaron filas
    if (mysqli_stmt_affected_rows($stmt) > 0) {
        echo "Datos insertados correctamente.<br>";
    } else {
        echo "Error: No se insertaron filas.";
    }

    // Cerrar la sentencia
    mysqli_stmt_close($stmt);
} else {
    echo "Error: " . mysqli_error($conn);
}

// Define los usuarios que deben ser actualizados a 'admin'
$admin_emails = ['first_admin@neo.com', 'second_admin@neo.com', 'third_admin@neo.com'];

// Prepara la consulta SQL para actualizar roles
$placeholders = implode(',', array_fill(0, count($admin_emails), '?'));
$sql = "UPDATE NeoGymnasion.users_login SET u_role = 'admin' WHERE username IN ($placeholders)";

// Inicia la conexión y prepara la sentencia
if ($stmt = mysqli_prepare($conn, $sql)) {
    // Vincula los parámetros de la consulta con los valores de los correos electrónicos
    mysqli_stmt_bind_param($stmt, str_repeat('s', count($admin_emails)), ...$admin_emails);

    // Ejecuta la consulta
    mysqli_stmt_execute($stmt);

    // Verifica si se actualizaron las filas
    if (mysqli_stmt_affected_rows($stmt) > 0) {
        echo "Roles actualizados correctamente.";
    } else {
        echo "No se actualizó ningún rol. Verifica que los correos electrónicos existan en la base de datos.";
    }

    // Cierra la sentencia
    mysqli_stmt_close($stmt);
} else {
    echo "Error preparando la consulta: " . mysqli_error($conn);
}

// Cierra la conexión
mysqli_close($conn);


?>