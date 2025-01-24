<?php

include("connexio.php");

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $result = mysqli_query($conn, "SELECT * FROM Persona");
    $personas = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $personas[] = $row;
    }
    header('Content-Type: application/json');
    echo json_encode($personas);
}

if ($_SERVER['REQUEST_METHOD'] == 'PUT' && isset($_GET['ID'])) {
    $id = $_GET['ID'];
    $data = json_decode(file_get_contents('php://input'), true);
    $nombre = $data['nombre'];
    $apellido1 = $data['apellido1'];
    $telefono = $data['telefono'];
    $email = $data['email'];
    $contraseña = $data['contraseña'];
    $tipo = $data['tipo'];

    $result = mysqli_query($conn, "UPDATE Persona SET nombre='$nombre', apellido1='$apellido1', telefono='$telefono', email='$email', contraseña='$contraseña', tipo='$tipo' WHERE ID=$id");
    if ($result) {
        $response = array('status' => 'success');
    } else {
        $response = array('status' => 'error');
    }
    header('Content-Type: application/json');
    echo json_encode($response);
}

if ($_SERVER['REQUEST_METHOD'] == 'DELETE' && isset($_GET['ID'])) {
    $id = $_GET['ID'];
    
    // Eliminar el usuario de la tabla Usuario
    $result_usuario = mysqli_query($conn, "DELETE FROM Usuario WHERE ID_usuario=$id");
    
    // Si la eliminación en la tabla Usuario fue exitosa, proceder con la eliminación en la tabla Persona
    if ($result_usuario) {
        $result_persona = mysqli_query($conn, "DELETE FROM Persona WHERE ID=$id");
        
        if ($result_persona) {
            $response = array('status' => 'success');
        } else {
            $response = array('status' => 'error', 'message' => 'Error deleting record from Persona table');
        }
    } else {
        $response = array('status' => 'error', 'message' => 'Error deleting record from Usuario table');
    }
    
    header('Content-Type: application/json');
    echo json_encode($response);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    $nombre = $data['nombre'];
    $apellido1 = $data['apellido1'];
    $telefono = $data['telefono'];
    $email = $data['email'];
    $contraseña = $data['contraseña'];
    $tipo = $data['tipo'];

    $result = mysqli_query($conn, "INSERT INTO Persona (nombre, apellido1, telefono, email, contraseña, tipo) VALUES ('$nombre', '$apellido1', '$telefono', '$email', '$contraseña', '$tipo')");
    
    if ($result) {
        $persona_id = mysqli_insert_id($conn);
        if ($tipo == 'entrenador') {
            $result_entrenador = mysqli_query($conn, "INSERT INTO Entrenador (ID_entrenador) VALUES ('$persona_id')");
            if (!$result_entrenador) {
                $response = array('status' => 'error', 'message' => 'Error al insertar en la tabla Entrenador');
                header('Content-Type: application/json');
                echo json_encode($response);
                exit;
            }
        } elseif ($tipo == 'usuario') {
            $result_usuario = mysqli_query($conn, "INSERT INTO Usuario (ID_usuario) VALUES ('$persona_id')");
            if (!$result_usuario) {
                $response = array('status' => 'error', 'message' => 'Error al insertar en la tabla Usuario');
                header('Content-Type: application/json');
                echo json_encode($response);
                exit; 
            }
        }
        
        $response = array('status' => 'success');
    } else {
        $response = array('status' => 'error', 'message' => 'Error al insertar en la tabla Persona');
    }
    header('Content-Type: application/json');
    echo json_encode($response);
}

?>
