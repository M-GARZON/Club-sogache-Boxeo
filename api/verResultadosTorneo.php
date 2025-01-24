<?php

include("connexio.php");

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $result = mysqli_query($conn, "SELECT * FROM Resultados ORDER BY Porcentaje_Ganados DESC");
    $personas = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $personas[] = $row;
    }
    header('Content-Type: application/json');
    echo json_encode($personas);
}

if ($_SERVER['REQUEST_METHOD'] == 'PUT' && isset($_GET['id'])) {
    $id = $_GET['id'];
    $data = json_decode(file_get_contents('php://input'), true);
    $nombre = mysqli_real_escape_string($conn, $data['Nombre']);
    $apellido = mysqli_real_escape_string($conn, $data['Apellidos']);
    $realizados = intval($data['Combates_Realizados']);
    $ganados = intval($data['Combates_Ganados']);
    $fecha = mysqli_real_escape_string($conn, $data['Fecha_Combate']);
    $porcentaje = floatval($data['Porcentaje_Ganados']);

    $stmt = $conn->prepare("UPDATE Resultados SET Nombre=?, Apellidos=?, Combates_Realizados=?, Combates_Ganados=?, Fecha_Combate=?, Porcentaje_Ganados=? WHERE id=?");
    $stmt->bind_param("ssiisdi", $nombre, $apellido, $realizados, $ganados, $fecha, $porcentaje, $id);
    $result = $stmt->execute();

    if ($result) {
        $response = array('status' => 'success');
    } else {
        $response = array('status' => 'error');
    }
    header('Content-Type: application/json');
    echo json_encode($response);
}


include('connexio.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    $idEntrenador = $data['ID_entrenador'];
    $diaSemana = $data['dia_semana'];
    $horaInicio = $data['hora_inicio'];
    $horaFinal = $data['hora_final'];
    $id_usuario = $data['id_usuario'];

    $query = "INSERT INTO Grupal (ID_entrenador, dia_semana, hora_inicio, hora_final, ID_usuario) VALUES ('$idEntrenador', '$diaSemana', '$horaInicio', '$horaFinal', '$id_usuario')";
    
    if (mysqli_query($conn, $query)) {
        $response = array('status' => 'success');
        header('Content-Type: application/json');
        echo json_encode($response);
    } else {
        $response = array('status' => 'error', 'error' => mysqli_error($conn));
        header('Content-Type: application/json');
        echo json_encode($response);
    }

    mysqli_close($conn);
}
?>



