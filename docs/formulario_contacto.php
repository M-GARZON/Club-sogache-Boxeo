<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Club Box Sogache</title>
    <link rel="stylesheet" href="styles/contacto.css">
    <link rel="stylesheet" href="styles/comun.css">
    <link rel="icon" href="img/ico_nbg.png" type="image">
</head>
<body>
    <header>
        <div class="logo"> <a href="index.php"><img src="img/title.png"></a></div>
        <?php include("includes/nav.php"); ?>
    </header>
    
    <h1>FORMULARIO DE CONTACTO</h1>
    <main>
        <section class="form-section">
            <div class="map-container">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2991.6040342440974!2d2.1471940292695937!3d41.426113420573465!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12a4bd2ab067e4a3%3A0xa18e3e2dfcc9aa8a!2sPlaza%20de%20la%20Clota!5e0!3m2!1ses!2ses!4v1716452595481!5m2!1ses!2ses"  style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <div class="form-container">
                <form id="contact-form">
                    <input type="text" id="nom" name="nom" placeholder="Nombre" required>
                    <input type="email" id="email" name="email" placeholder="Correo Electrónico" required> 
                    <input type="tel" id="telefono" name="telefono" placeholder="Teléfono" required>
                    <textarea name="message" id="mensaje" placeholder="Mensaje" required></textarea>
                    <button type="submit">Enviar</button>
                </form>
                <div id="error-messages" style="color: red;"></div>
                <p class="contact-info">Responderemos a tus dudas de inmediato por número de teléfono o email.</p>
            </div>
        </section>
    </main>
    <?php include("includes/footer.php"); ?>
    <script>
        const form = document.getElementById('contact-form');
        form.addEventListener('submit', (event) => {
            event.preventDefault();
            
            const errorMessages = document.getElementById('error-messages');
            errorMessages.innerHTML = '';
            
            const nombre = document.getElementById('nom').value.trim();
            const email = document.getElementById('email').value.trim();
            const telefono = document.getElementById('telefono').value.trim();
            const mensaje = document.getElementById('mensaje').value.trim();
            
            let errors = [];

            if (nombre === '') {
                errors.push('El nombre es obligatorio.');
            }

            const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (email === '' || !emailPattern.test(email)) {
                errors.push('Por favor, introduce un correo electrónico válido.');
            }

            const telefonoPattern = /^\d{9}$/; 
            if (telefono === '' || !telefonoPattern.test(telefono)) {
                errors.push('Por favor, introduce un número de teléfono válido de 9 dígitos.');
            }


            if (mensaje === '') {
                errors.push('El mensaje es obligatorio.');
            }

            if (errors.length > 0) {
                errorMessages.innerHTML = errors.join('<br>');
                return;
            }

            const data = {
                nombre: nombre,
                email: email,
                telefono: telefono,
                mensaje: mensaje,
            };

            fetch('../api/guardar_mensaje.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(data)
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === 'success') {
                    form.reset();
                    alert('Mensaje enviado exitosamente');
                } else {
                    console.error('Error:', data);
                    alert('Hubo un problema al enviar el mensaje.');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Hubo un problema al enviar el mensaje.');
            });
        });
    </script>
    <script src="js/scripts.js"></script>
</body>
</html>