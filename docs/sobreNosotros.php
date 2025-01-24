<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Club Box Sogache</title>
    <link rel="stylesheet" href="styles/sobreNosotros.css">
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
    
    <main class="noticias">
        <section class="noticia noticia-derecha">
            <div class="texto">
                <h2>¿Quién somos?</h2>
                <br>
                <p>Somos un gimnasio de boxeo con más de 10 años de experiencia dedicados a mejorar la salud y el bienestar de nuestros miembros a través del boxeo.</p>
                <br>
                <p>En SOGACHE, creemos que el boxeo no es solo un deporte, sino una forma de vida que enseña disciplina, respeto y resiliencia. Nuestros entrenadores son profesionales con años de experiencia, comprometidos a ayudarte a alcanzar tus metas, ya sea que desees competir a nivel profesional o simplemente mejorar tu estado físico.</p>
                <br>
                <h3>Valores</h3>
                <ul>
                    <li><strong>Disciplina:</strong> Fomentamos una ética de trabajo fuerte y dedicación en cada entrenamiento.</li>
                    <li><strong>Respeto:</strong> Tratamos a todos nuestros miembros con dignidad y respeto, promoviendo un ambiente inclusivo y acogedor.</li>
                    <li><strong>Resiliencia:</strong> Ayudamos a nuestros miembros a superar desafíos y a mantenerse enfocados en sus objetivos.</li>
                </ul>
                <br>
                <h3>Nuestros Logros</h3>
                <p>A lo largo de la última década, hemos formado a numerosos campeones regionales y nacionales. Nos enorgullece ver cómo nuestros miembros no solo mejoran en el boxeo, sino que también desarrollan habilidades valiosas que les ayudan en todos los aspectos de su vida.</p>
            </div>
            <div class="imagen">
                <img src="img/ico_nbg_black.png" alt="Logo" class="imagen-Logo">
            </div>
        </section>
        
        
        <section class="noticia noticia-izquierda">
            <div class="texto">
                <img src="img/gimnasio.jpeg" alt="Gimnasio" class="imagen-gimnasio">
                <h2>¿Por qué entrenar con nosotros?</h2><br>
                <p>En SOGACHE nos preocupamos por las aspiraciones de nuestros clientes y nos esforzamos por brindarles un ambiente de entrenamiento seguro, motivador y profesional.</p>
                <br>
                <p>El boxeo no solo es un deporte, es una disciplina que fomenta valores fundamentales como la disciplina, la perseverancia, la autoconfianza y el respeto. En nuestro club, no solo te enseñamos las habilidades técnicas del boxeo, sino que también te ayudamos a desarrollar estas cualidades que te serán útiles en todas las áreas de tu vida.</p>
                <br>
                <p>Además, nuestra comunidad de boxeadores es cálida y acogedora. Aquí encontrarás un equipo de entrenadores dedicados y compañeros de entrenamiento que te apoyarán en tu viaje hacia el éxito.</p>
            </div>
        </section>
    </main>
    <?php
    include("includes/footer.php");
?>
    <script src="js/scripts.js"></script>
</body>
</html>
