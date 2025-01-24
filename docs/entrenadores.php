<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Club Box Sogache - Entrenadores</title>
    <link rel="stylesheet" href="styles/entrenadores.css">
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
        <section class="entrenadores">
            <h2>Entrenadores</h2>
            <div class="entrenadores-container">
                <div class="entrenador">
                    <h3>Jero Garcia</h3>
                    <img src="img/Jerito.png" alt="Jero Garcia" >
                    <p>Experto en técnicas defensivas y ganador de múltiples campeonatos nacionales.</p>
                </div>
                <div class="entrenador">
                    <h3>Karla Merida</h3>
                    <img src="img/Karla.png" alt="Karla Merida" >
                    <p>Especialista en entrenamiento de resistencia y preparación física.</p>
                </div>
                <div class="entrenador">
                    <h3>Xavi Moya</h3>
                    <img src="img/Xavi.png" alt="Xavi Moya" >
                    <p>Conocido por su enfoque en estrategias ofensivas y tácticas avanzadas.</p>
                </div>
                <div class="entrenador">
                    <h3>Sandor Martin</h3>
                    <img src="img/Sando.png" alt="Sandor Martin" >
                    <p>Experto en nutrición deportiva y recuperación post-combate.</p>
                </div>
            </div>

            <div>
                <img class="imagen" src="img/ico_nbg_black.png" alt="icono" style="width: 200px; height: 200px; object-fit: cover;">
            </div>
        </section>
        
    </main>
    <?php
    include("includes/footer.php");
?>
    <script src="js/scripts.js"></script>
</body>
</html>
