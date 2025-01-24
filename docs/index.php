<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CLUB BOX SOGACHE</title>
    <link rel="stylesheet" href="styles/comun.css">
    <link rel="stylesheet" href="styles/index.css">
    <link rel="icon" href="img/ico_nbg.png" type="image">
</head>

<body>
    <header>
        <div class="logo">
            <a href="index.php"><img src="img/title.png" alt="Club Box Sogache Logo"></a>
        </div>
        <?php
    include("includes/nav.php");
?>
    </header>

    <main class="mainindex">
        <div class="fondo1">
            <div class="texto-encima">
                <img src="img/Boxeo-en-Barcelona.png" alt="Boxeo en Barcelona">
            </div>
            <a href="tarifa.php"><button class="boton-encima">Ver tarifas</button></a>
        </div>

        <div class="fondo-gris">
            <section class="container">
                <div class="text-section">
                    <h1>Clases de <span class="highlight">Boxeo en Barcelona</span></h1>
                    <p>Somos un <strong>gimnasio en Barcelona</strong>, que ofrece la oportunidad de practicar diferentes deportes de contacto.</p>
                    <p>En <strong>Sogache</strong>, buscamos la mejor manera de cuidar tu salud, para que así puedas lograr todos los resultados deseados.</p>
                    <p>En nuestro tatami de deportes de contacto, que incluye <strong>Boxeo para adultos (tanto clases privadas grupales)</strong>, además de cuidarte físicamente, podrás divertirte a lo grande, superando todos tus límites.</p>
                    <hr>
                    <p>Entrena como todo un profesional, en nuestro <strong>club de boxeo Barcelona</strong>. A continuación, te indicamos más información de interés.</p>
                    <a href="sobreNosotros.php"><button>Sobre nosotros</button></a>
                </div>
                <div class="image-section">
                    <img src="img/box.png" alt="Boxeo en Barcelona">
                </div>
            </section>
        </div>

        <a class="entrenadores" href="entrenadores.php">
            <h1>Nuestros Mejores <span class="highlight">Entrenadores</span></h1>
        </a>
        <section class="container2">
            <div class="box">
                <img src="img/jerojerito.png" alt="Jero García">
                <div class="content">
                    <h2>Jero García</h2>
                    <p>Exboxeador profesional, campeón de España de boxeo, kick boxing y full contact. Entrenador con más de veinte años de experiencia y entrenador del formato televisivo Hermano Mayor.</p>
                </div>
            </div>
            <div>
                <img class="marca-agua" src="img/ico_nbg_black.png" alt="Marca de agua">
            </div>
            <div class="box">
                <img src="img/xavi_moya.png" alt="Xavi Moya">
                <div class="content">
                    <h2>Xavi Moya</h2>
                    <p>Moya, apodado El guerrero catalán, tuvo una larga y exitosa carrera tanto en el boxeo como en otros deportes de contacto, siendo tres veces campeón de España de peso medio de boxeo.</p>
                </div>
            </div>
        </section>

        <div class="div-final">
            <h1>¿Cómo son las clases de boxeo en Sogache?</h1>
            <section class="container">
                <div class="image-section">
                    <img src="img/boxboxnegro.png" alt="Boxeo en Barcelona">
                </div>
                <div class="text-section">
                    <p>Las <strong>clases boxeo</strong> en nuestro club en Barcelona, están a cargo de profesores con mucha experiencia en este deporte.</p>
                    <p>Ellos te enseñarán los fundamentos de este arte y te ayudarán a perfeccionar tu nivel de boxeo. Son unos entrenadores personales hechos a tu medida.</p>
                    <p>Aquí cuentas con un área específica para la práctica o entrenamiento de este deporte, la cual dispone de un ring profesional, zona de sacos para golpeo y todo lo necesario para entrenar como los mejores.</p>
                    <p><strong>Aprender boxeo cerca de Barcelona</strong>, ahora es muy sencillo. En nuestro gimnasio aprenderás todas las técnicas del boxeo, combinaciones y golpes.</p>
                    <p>¿Sabes que es un recto o directo, upper o gancho, jab, crochet o un golpe curvo? Aquí te lo enseñaremos.</p>
                    <p>Las clases de boxeo en Barcelona que ofrecemos, son muy efectivas y beneficiosas. Y es que el entrenamiento físico que significa boxear, te ayudará enormemente y podrás mejorar tu cuerpo y mente, mientras prácticas uno de los deportes más completos del mundo.</p>
                    <a href="formulario_contacto.php"><button>Contáctanos</button></a>
                </div>
            </section>
        </div>
    </main>
    <?php
    include("includes/footer.php");
?>
   
    <script src="js/scripts.js"></script>
</body>
</html>
