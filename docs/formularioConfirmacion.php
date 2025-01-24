<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    session_start();
    $plan = $_POST['plan'];
    $duracion = (int)$_POST['duracion'];
    $precio = (float)$_POST['precio'];
    $id_usuario = $_SESSION['id_usuario']; 
    
    $data = array(
        'duracion' => $duracion,
        'precio' => $precio,
        'id_usuario' => $id_usuario
    );
    
    
    $ch = curl_init('http://localhost/proyectoFinal/club_boxeo/api/procesarPago.php');
    
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
        'Content-Length: ' . strlen(json_encode($data))
    ));
    
    $response = curl_exec($ch);
    
    if ($response === false) {
        $error = curl_error($ch);
        curl_close($ch);
        die('Error en la solicitud: ' . $error);
    }
    
    curl_close($ch);
    
    $responseData = json_decode($response, true);
    
    if ($responseData['status'] === 'success') {
        echo 'Tarifa contratada con éxito';
        header('Location:confirmacionPago.php');
    } else {
        echo 'Hubo un error al contratar la tarifa: ' . $responseData['error'];
        header('location:index.php');
    }
}
?>
