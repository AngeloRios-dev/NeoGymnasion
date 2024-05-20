<?php
// Function to load environment variables from .env file
function loadEnv($filePath) {
    if (!file_exists($filePath)) {
        die("Error: The .env file does not exist");
    }
    
    $envContent = file_get_contents($filePath);
    $lines = explode(PHP_EOL, $envContent);

    foreach ($lines as $line) {
        $parts = explode('=', $line, 2);
        if (count($parts) === 2) {
            $_ENV[$parts[0]] = trim($parts[1]);
        }
    }
}

// Load environment variables
$envFilePath = __DIR__ . '/.env';
loadEnv($envFilePath);

// Connection variables
$dbserver = "localhost";
$dbuser = "root";
$dbpassword = $_ENV['DB_PASSWORD'] ?? '';

$conn = new mysqli($dbserver, $dbuser, $dbpassword);


function executeQuery($conn, $query, $successMessage) {
    // Ensure the connection is successful
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Execute the query
    if ($conn->query($query) === TRUE) {
        echo $successMessage . "</br>";
    } else {
        echo "An error has occurred: " . $conn->error;
    }
}

// SQL to Create database NeoGymnasion if it does not exist
$createDB = "CREATE DATABASE IF NOT EXISTS NeoGymnasion;";
executeQuery($conn, $createDB, "Database created successfully.");

// Create table user_data to store user information
$create_users_data = "CREATE TABLE NeoGymnasion.users_data (
    user_id INT NOT NULL AUTO_INCREMENT,
    first_names VARCHAR(100) NOT NULL,
    last_names VARCHAR(100) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    phone VARCHAR(20) NOT NULL,
    birth_date DATE NOT NULL,
    u_address TEXT,
    gender ENUM('M', 'F', 'O'),
    PRIMARY KEY (user_id)
);";
executeQuery($conn, $create_users_data, "Table users_data created successfully.");


// Create table users_login to manage logins
$create_users_login = "CREATE TABLE NeoGymnasion.users_login (
    login_id INT NOT NULL AUTO_INCREMENT,
    fk_user_id INT NOT NULL UNIQUE,
    username VARCHAR(255) NOT NULL UNIQUE,
    u_password VARCHAR(255) NOT NULL,
    u_role ENUM('admin', 'user') NOT NULL,
    PRIMARY KEY (login_id),
    CONSTRAINT fk_user_id
    FOREIGN KEY (fk_user_id) REFERENCES users_data (user_id)
);";
executeQuery($conn, $create_users_login, "Table users_login created successfully.");


//  Create table to store information about appointments
$create_appointments_table = "CREATE TABLE NeoGymnasion.appointments (
    appointment_id INT NOT NULL AUTO_INCREMENT,
    fk_user_id INT NOT NULL,
    appointment_date DATE NOT NULL,
    appointment_reason ENUM('Entrenador', 'Yoga', 'Inteligencia Emocional'),
    PRIMARY KEY (appointment_id),
    CONSTRAINT fk_user_id_appointments
    FOREIGN KEY (fk_user_id) REFERENCES users_data (user_id)
);";
executeQuery($conn, $create_appointments_table, "Table appointments created successfully.");


//  Create table to store information about the news
$create_news_table = "CREATE TABLE NeoGymnasion.news (
    news_id INT NOT NULL AUTO_INCREMENT,
    news_title VARCHAR(100) NOT NULL UNIQUE,
    news_img VARCHAR(255) NOT NULL,
    news_text TEXT NOT NULL,
    news_date DATE NOT NULL,
    fk_user_id INT NOT NULL,
    PRIMARY KEY (news_id),
    CONSTRAINT fk_user_id_news
    FOREIGN KEY (fk_user_id) REFERENCES users_data (user_id) 
);";
executeQuery($conn, $create_news_table, "Table news created successfully.");



// Close the connection after all operations are done
$conn->close();
?>
