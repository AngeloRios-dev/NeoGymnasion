<?php 
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    require_once "includes/connection.php";

    if (isset($_POST["login"])) {
        $email = trim($_POST["email"]);
        $passwd = sha1($_POST["password"]);

        $query = "SELECT * FROM users_login WHERE username = ? AND u_password = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ss", $email, $passwd);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result && $result->num_rows >= 1) {
            $_SESSION["logged"] = $result->fetch_assoc();
            if (isset($_SESSION["error_login"])) {
                unset($_SESSION["error_login"]);
            }
            header("Location: ../index.php");
            exit();
        } else {
            $_SESSION["error_login"] = "Error: usuario o contraseña incorrecto.";
            header("Location: ingresar.php");
            exit();
        }
    }
?>
