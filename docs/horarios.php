<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Club Box Sogache</title>
    <link rel="stylesheet" href="styles/horarios.css">
    <link rel="stylesheet" href="styles/comun.css">
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
        <img src="img/horario.png" alt="horario" class="clasimage">
        <a href="entrenoGrupal.php"><button class="boton-encima">Reservar Entreno</button></a>
    </main>
    <?php
    include("includes/footer.php");
?>
    <script src="js/scripts.js"></script>
</body>
</html>