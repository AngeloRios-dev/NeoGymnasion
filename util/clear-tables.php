<?php 

require_once '../app/includes/connection.php';

// Truncate tables to remove all existing data
mysqli_query($conn, "SET FOREIGN_KEY_CHECKS = 0");
$truncate_users_data = "TRUNCATE TABLE NeoGymnasion.users_data";
$truncate_users_login = "TRUNCATE TABLE NeoGymnasion.users_login";
mysqli_query($conn, $truncate_users_login);
mysqli_query($conn, $truncate_users_data);
mysqli_query($conn, "SET FOREIGN_KEY_CHECKS = 1");


?>