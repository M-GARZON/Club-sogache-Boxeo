<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Club Box Sogache</title>
    <link rel="stylesheet" href="styles/comun.css">
    <link rel="stylesheet" href="styles/noticia.css">
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
        <section class="noticias">
            <h1>NOTICIAS</h1>
            <article class="noticia">
                <h1>El boxeador Antonio Barrul, denunciado por el hombre al que propinó varios puñetazos en un cine de León</h1>
                <img src="img/antonioBarrul.jpg">
                <p>En las últimas hora se han producido importantes novedades en el caso del boxeador leonés Antonio Barrul una semana después de su altercado en una sala de cine de León. Según han confirmado a este periódico fuentes cercanas al deportista, el boxeador ha sido denunciado por el hombre al que propinó varios puñetazos, después de que este agrediese a su mujer y a una niña durante la proyección de una película infantil, tal y como él mismo confirmó en declaraciones a este medio. </p>
            </article>
            <article class="noticia">
                <h1>Manuel Alcántara recibirá a título póstumo el Cinturón de Campeón de España de boxeo</h1>
                <img src="img/manuelAlcantara.jpg">
                <p>Es un reconocimiento a su afición por este deporte y a su ennoblecimiento del mismo a través de crónicas que se han convertido en auténticas leyendas del periodismo", según han informado desde la Fundación</p>
            </article>
            <article class="noticia">
                <h1>Boxeo en las venas: el sobrino de Kiko Martínez, a por París</h1>
                <img src="img/sobrinokiko.png">
                <p>Sergio Martínez busca su pase para los Juegos en el Preolímpico de Tailandia que se disputará del 24 de mayo al 2 de junio. “Él me enseña de la vida”. Con mucho esfuerzo y dedicación, Martínez se unió a la Selección española de boxeo, en la que es el representante de la categoría de -71 kilos.</p>
            </article>
            <article class="noticia">
                <h1>El boxeador Juanito Pastor, 100 años del primer deportista de Alicante en unos Juegos Olímpicos</h1>
                <img src="img/pastor.jpeg">
                <p>El púgil compitió en París en 1924, sirviendo de ejemplo para los alicantinos que vayan a las Olimpiadas de Francia este verano un siglo después.</p>
            </article>
        </section>
    </main>
    <?php
    include("includes/footer.php");
?>
    
    <script src="js/scripts.js"></script>
</body>
</html>
