<?php
include('connexio.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    session_start();
    $data = json_decode(file_get_contents('php://input'), true);
    $idEntrenador = $data['ID_entrenador'];
    $dia = $data['dia_semana'];
    $horaInicio = $data['hora_inicio'];
    $horaFinal = $data['hora_final'];
    $id_usuario = $data['id_usuario'];
    
    $query_check_tarifa = "SELECT COUNT(*) as count FROM Tarifa WHERE ID_usuario = '$id_usuario'";
    $result_check_tarifa = mysqli_query($conn, $query_check_tarifa);
    $row_tarifa = mysqli_fetch_assoc($result_check_tarifa);
    
    if ($row_tarifa['count'] == 0) {
        $response = array('status' => 'error', 'error' => 'Debes contratar una tarifa antes de reservar un entreno.');
        header('Content-Type: application/json');
        echo json_encode($response);
        mysqli_close($conn);
        exit();
    }
    
    $query_check_entreno = "SELECT COUNT(*) as count FROM Entreno WHERE ID_usuario = '$id_usuario' AND ID_entrenador = '$idEntrenador' AND dia_semana = '$dia' AND hora_inicio = '$horaInicio' AND hora_final = '$horaFinal'";
    $result_check_entreno = mysqli_query($conn, $query_check_entreno);
    $row_entreno = mysqli_fetch_assoc($result_check_entreno);
    
    if ($row_entreno['count'] > 0) {
        $response = array('status' => 'error', 'error' => 'Ya has reservado este entrenamiento previamente.');
        header('Content-Type: application/json');
        echo json_encode($response);
        mysqli_close($conn);
        exit();
    }
    
    $query_insert_entreno = "INSERT INTO Entreno (ID_entrenador, dia_semana, hora_inicio, hora_final, ID_usuario) VALUES ('$idEntrenador', '$dia', '$horaInicio', '$horaFinal', '$id_usuario')";
    
    if (mysqli_query($conn, $query_insert_entreno)) {
        $response = array('status' => 'success');
        header('Content-Type: application/json');
        echo json_encode($response);
    } else {
        $error_message = mysqli_error($conn);
        $response = array('status' => 'error', 'error' => $error_message);
        header('Content-Type: application/json');
        echo json_encode($response);
    }

    mysqli_close($conn);
}
?>
