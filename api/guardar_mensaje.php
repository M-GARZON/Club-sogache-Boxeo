<?php
include("connexio.php");

if ($_SERVER['REQUEST_METHOD'] == 'GET' && !isset($_GET['email'])) {
    $result = mysqli_query($conn, "SELECT * FROM Mensaje");
    $mensajes = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $mensajes[] = $row;
    }
    header('Content-Type: application/json');
    echo json_encode($mensajes);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    if (isset($data['nombre'], $data['email'], $data['telefono'], $data['mensaje'])) {
        $nombre = mysqli_real_escape_string($conn, $data['nombre']);
        $email = mysqli_real_escape_string($conn, $data['email']);
        $telefono = mysqli_real_escape_string($conn, $data['telefono']);
        $mensaje = mysqli_real_escape_string($conn, $data['mensaje']);
        
        $query = "INSERT INTO Mensaje (nombre, email, telefono, mensaje) VALUES ('$nombre', '$email', '$telefono', '$mensaje')";
        $result = mysqli_query($conn, $query);

        if ($result) {
            $response = array('status' => 'success');
        } else {
            $response = array('status' => 'error', 'message' => mysqli_error($conn));
        }
    } else {
        $response = array('status' => 'error', 'message' => 'Faltan campos obligatorios');
    }
    header('Content-Type: application/json');
    echo json_encode($response);
    exit;
}

include("connexio.php"); 

if ($_SERVER['REQUEST_METHOD'] === 'DELETE' && isset($_GET['id'])) {
    $id = intval($_GET['id']); 
    $query = "DELETE FROM Mensaje WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $id);
    
    if ($stmt->execute()) {
        $response = array('status' => 'success');
    } else {
        $response = array('status' => 'error', 'message' => 'Error al eliminar el mensaje.');
    }
    
    $stmt->close();
    $conn->close();
} else {
    $response = array('status' => 'error', 'message' => 'Solicitud inválida.');
}

header('Content-Type: application/json');
echo json_encode($response);


?>