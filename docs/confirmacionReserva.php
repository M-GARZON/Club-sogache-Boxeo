<?php
session_start();

if (!isset($_SESSION['tipo']) || $_SESSION['tipo'] !== 'usuario') {
    header('Location:index.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pago Confirmado</title>
    <link rel="stylesheet" href="styles/comun.css">
    <link rel="stylesheet" href="styles/confirmacionPago.css">
    <link rel="icon" href="img/ico_nbg.png" type="image">
</head>
<body>
    <header>
        <div class="logo"> <a href="index.php"><img src="img/title.png"></a></div>
        <?php
    include("includes/nav.php");
?>
    </header>
    <main>
        <section class="confirmation">
            <h1>¡Gracias por tu reserva!</h1>
            <p>Te esperamos en tu proxima clase con mucha ilusion.</p>
            <button onclick="location.href='index.php'">Volver al Inicio</button>
        </section>
    </main>
    <?php
    include("includes/footer.php");
?>
</body>
</html>