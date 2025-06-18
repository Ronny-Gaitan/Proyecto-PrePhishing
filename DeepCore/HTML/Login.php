<?php
// filepath: z:\Nueva carpeta\HTML\login.php

$host = "localhost";
$user = "TU_USUARIO";
$pass = "TU_CONTRASEÑA";
$db = "TU_BASE_DE_DATOS";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$usuario = $_POST['usuario'];
$password = $_POST['password'];

// Consulta segura usando prepared statements
$stmt = $conn->prepare("SELECT * FROM usuarios WHERE usuario = ? AND password = ?");
$stmt->bind_param("ss", $usuario, $password);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
    echo "success";
} else {
    echo "error";
}

$stmt->close();
$conn->close();
?>