<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Club Box Sogache - Iniciar Sesión</title>
    <link rel="stylesheet" href="styles/iniciarSesion.css">
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
        <section class="login-section">
            <div class="login-box">
                <h2>Club Boxa Sogache</h2>
                <form action="../api/login.proc.php" method="POST">
                    <input type="text" id="email" name="email" placeholder="mail" required>
                    <input type="password" name="password" placeholder="Contraseña" required>
                    <div class="register-link">
                        <a href="registro.php">No tienes cuenta? Regístrate</a>
                    </div>
                    <button type="submit">Iniciar Sesión</button>
                </form>
                
            </div>
        </section>
    </main>
    <?php
    include("includes/footer.php");
?>
    <script src="js/scripts.js"></script>
</body>
</html>

