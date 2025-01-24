<?php
session_start();
include("connexio.php");

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM Persona WHERE email='$email' AND contraseña='$password'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $fila = mysqli_fetch_array($result);
    $_SESSION['id_usuario'] = $fila['ID'];
    $_SESSION['email'] = $fila['email'];
    $_SESSION['tipo'] = $fila['tipo'];

    if ($_SESSION['tipo'] == 'entrenador') {
        header('Location: ../docs/gestionUsuaris.php');
    } else {
        header('Location: ../docs/index.php');
    }
    exit();
} else {
    echo 'Usuario o Contraseña incorrectas';
}

mysqli_close($conn);
?>
