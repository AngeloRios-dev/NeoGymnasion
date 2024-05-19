<?php
require_once '../app/includes/connection.php';

// Insert data into users_data table
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
        ('Sofía', 'Díaz', 'sofia@example.com', '456789123', '1998-12-22', 'Avenida del Puerto 753, Tenerife', 'F');";
mysqli_query($conn, $insert_users);


// Insert data into users_login table
// $login_data = "INSERT INTO NeoGymnasion.users_login (fk_user_id, username, u_password, u_role)
//     SELECT user_id, email, 'password123', 'user' FROM NeoGymnasion.users_data;";
$login_data = "INSERT INTO NeoGymnasion.users_login (fk_user_id, username, u_password, u_role)
    SELECT user_id, email, '".sha1("password123")."', 'user' FROM NeoGymnasion.users_data;";
mysqli_query($conn, $login_data);

?>