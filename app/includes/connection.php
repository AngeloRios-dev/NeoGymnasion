<?php
    // Path to the .env file
    $envFilePath = __DIR__ . '/.env';

    // Check if the .env file exists
    if (file_exists($envFilePath)) {
        // Read the content of the .env file
        $envContent = file_get_contents($envFilePath);

        // Split the content into lines
        $lines = explode(PHP_EOL, $envContent);

        // Iterate over each line
        foreach ($lines as $line) {
            // Split the line into variable name and value
            $parts = explode('=', $line, 2);
            if (count($parts) === 2) {
                // Assign the environment variable if the format is valid
                $_ENV[$parts[0]] = trim($parts[1]);
            }
        }    
    } else {
        // The .env file does not exist, handle the error as needed
        echo "Error: The .env file does not exist";
    }

    // Connection variables
    $dbserver = "localhost";
    $dbuser = "root";
    // Access the DB_PASSWORD environment variable
    $dbpassword = $_ENV['DB_PASSWORD'];
    $dbname = "neogymnasion";

    $conn = mysqli_connect($dbserver, $dbuser, $dbpassword, $dbname);
    if (!$conn){
        echo "No se pudo conectar a la DB: " . mysqli_connect_error();
    } 

?>