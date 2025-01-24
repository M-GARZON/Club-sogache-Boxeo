<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    session_start();
    // Verificar si la sesión tiene un ID de usuario
    if (isset($_SESSION['id_usuario'])) {
        // Asignar el ID de usuario desde la sesión a $id_usuario
        $id_usuario = $_SESSION['id_usuario'];
        
        // Resto del código para manejar la reserva del entrenamiento
        $idEntrenador = $_POST['ID_entrenador'];
        $diaSemana = $_POST['dia_semana']; 
        $horaInicio = $_POST['hora_inicio'];
        $horaFinal = $_POST['hora_final'];

        // Crear un arreglo con los datos del entrenamiento
        $data = array(
            'ID_entrenador' => $idEntrenador,
            'dia_semana' => $diaSemana, 
            'hora_inicio' => $horaInicio,
            'hora_final' => $horaFinal,
            'id_usuario' => $id_usuario 
        );
        
        // Iniciar una solicitud cURL para enviar los datos al archivo que maneja la reserva del entrenamiento
        $ch = curl_init('http://localhost/proyectoFinal/club_boxeo/api/ClaseGrupal.php');
        
        // Configurar las opciones de la solicitud cURL
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen(json_encode($data))
        ));
        
        // Ejecutar la solicitud cURL
        $response = curl_exec($ch);
        
        // Verificar si hubo un error en la solicitud cURL
        if ($response === false) {
            $error = curl_error($ch);
            curl_close($ch);
            die('Error en la solicitud: ' . $error);
        }
        
        // Cerrar la solicitud cURL
        curl_close($ch);
        
        // Decodificar la respuesta JSON recibida
        $responseData = json_decode($response, true);
        
        // Verificar si la reserva del entrenamiento fue exitosa
        if ($responseData['status'] === 'success') {
            echo 'Reserva concertada con éxito';
            header('Location:confirmacionReserva.php');
            exit; 
        } else {
            echo 'Hubo un error al reservar la clase: ' . $responseData['error'];
        }
    } else {
        echo 'No se pudo obtener el ID del usuario de la sesión.';
    }
}

?>
