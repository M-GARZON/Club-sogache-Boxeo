<?php
session_start();
include("connexio.php");

$first_name = trim($_POST['first_name']);
$last_name = trim($_POST['last_name']);
$email = trim($_POST['email']);
$phone = trim($_POST['phone']);
$password = trim($_POST['password']);
$confirm_password = trim($_POST['confirm_password']);

if (empty($first_name) || empty($last_name) || empty($email) || empty($phone) || empty($password) || empty($confirm_password)) {
    echo 'Por favor, rellena todos los campos.';
    exit();
}

if ($password !== $confirm_password) {
    echo 'Las contraseñas no coinciden.';
    exit();
}

$sql_check_email = "SELECT * FROM Persona WHERE email = '$email'";
$result_check_email = mysqli_query($conn, $sql_check_email);

if (mysqli_num_rows($result_check_email) > 0) {
    echo 'El correo electrónico ya está registrado.';
    exit();
}

$sql_persona = "INSERT INTO Persona (nombre, apellido1, telefono, email, contraseña, tipo) 
                VALUES ('$first_name', '$last_name', '$phone', '$email', '$password', 'usuario')";
$result_persona = mysqli_query($conn, $sql_persona);

if ($result_persona) {
    $persona_id = mysqli_insert_id($conn);
    
    $sql_usuario = "INSERT INTO Usuario (ID_usuario) VALUES ('$persona_id')";
    $result_usuario = mysqli_query($conn, $sql_usuario);
    
    if ($result_usuario) {
        header('Location: ../docs/iniciarSesion.php');
        exit();
    } else {
        echo 'Error al insertar en la tabla Usuario: ' . mysqli_error($conn);
    }
} else {
    echo 'Error al insertar en la tabla Persona: ' . mysqli_error($conn);
}

mysqli_close($conn);
?>
