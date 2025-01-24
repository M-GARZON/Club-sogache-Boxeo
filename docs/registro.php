<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Club Box Sogache - Crear Cuenta</title>
    <link rel="stylesheet" href="styles/registro.css">
    <link rel="stylesheet" href="styles/comun.css">
    <link rel="icon" href="img/ico_nbg.png" type="image">
</head>
<body>
    <header>
        <div class="logo"> <a href="index.php"><img src="img/title.png"></a></div>
        <?php include("includes/nav.php"); ?>
    </header>
    
    <main>
        <section class="register-section">
            <div class="register-box">
                <h2>Club Boxa Sogache</h2>
                <form id="registerForm" action="../api/signUp.proc.php" method="POST" onsubmit="return validateForm()">
                    <div class="name-fields">
                        <input type="text" id="first_name" name="first_name" placeholder="Nombre">
                        <input type="text" id="last_name" name="last_name" placeholder="Apellido">
                    </div>
                    <input type="email" id="email" name="email" placeholder="Correo Electrónico">
                    <input type="tel" id="phone" name="phone" placeholder="Teléfono">
                    <input type="password" id="password" name="password" placeholder="Contraseña">
                    <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirmar Contraseña">
                    <div class="login-link">
                        <a href="iniciarSesion.php">¿Tienes cuenta? Inicia sesión</a>
                    </div>
                    <button type="submit">Crear Cuenta</button>
                </form>
            </div>
        </section>
    </main>
    <?php include("includes/footer.php"); ?>
   
    <script>
        function validateForm() {
            var firstName = document.getElementById('first_name').value;
            var lastName = document.getElementById('last_name').value;
            var email = document.getElementById('email').value;
            var phone = document.getElementById('phone').value;
            var password = document.getElementById('password').value;
            var confirmPassword = document.getElementById('confirm_password').value;

            if (firstName === "" || lastName === "" || email === "" || phone === "" || password === "" || confirmPassword === "") {
                alert("Por favor, rellena todos los campos.");
                return false;
            }

            if (password !== confirmPassword) {
                alert("Las contraseñas no coinciden.");
                return false;
            }

            return true;
        }
    </script>
</body>
</html>
