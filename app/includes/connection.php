<?php
    // Ruta al archivo .env
    $envFilePath = __DIR__ . '/.env';

    // verificar si el archivo .env existe
    if (file_exists($envFilePath)) {
        // Leer el contenido del archivo .env
        $envContent = file_get_contents($envFilePath);

        // Separar el contenido por lineas
        $lines = explode(PHP_EOL, $envContent);

        // Iterar cada linea en el archivo
        foreach ($lines as $line) {
            // Separar el contenido en nombre y valor
            $parts = explode('=', $line, 2);
            if (count($parts) === 2) {
                $_ENV[$parts[0]] = trim($parts[1]);
            }
        }    
    } else {
        // Manejar errores
        echo "Error: El archivo .env no existe en la ruta espesificada";
    }

    // Variables de coneccion
    $dbserver = "localhost";
    $dbuser = "root";
    // Asignar la contraseña desde el archivo .env
    $dbpassword = $_ENV['DB_PASSWORD'];
    $dbname = "neogymnasion";

    $conn = mysqli_connect($dbserver, $dbuser, $dbpassword, $dbname);
    if (!$conn){
        echo "No se pudo conectar a la DB: " . mysqli_connect_error();
    } 

?>