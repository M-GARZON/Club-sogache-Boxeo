<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Modificar Usuario</title>
    <link rel="stylesheet" href="styles/comun.css">
    <link rel="stylesheet" href="styles/modificarUsuario.css">
    <link rel="icon" href="img/ico_nbg.png" type="image">


</head>
<header>
    <div class="logo"> <a href="index.php"><img src="img/title.png"></a></div>
    <?php
    include("includes/nav.php");
?>
</header>
<body>

<main>

    <form id="usuario-form">
    <h2>Modificar Usuario</h2>
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required><br>
        
        <label for="apellido1">Apellido:</label>
        <input type="text" id="apellido1" name="apellido1" required><br>
        
        <label for="telefono">Teléfono:</label>
        <input type="text" id="telefono" name="telefono" required><br>
        
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br>
        
        <label for="contrasena">Contraseña:</label>
        <input type="password" id="contrasena" name="contrasena" required><br>
        
        <label for="tipo">Tipo de Usuario:</label>
        <select id="tipo" name="tipo">
            <option value="entrenador">Entrenador</option>
            <option value="usuario">Usuario</option>
        </select><br>
        
        <button type="submit">Guardar</button>
    </form>
</main>    

    <script>
        const urlParams = new URLSearchParams(window.location.search);
        const userId = urlParams.get('ID');
        fetch(`../api/gestioUsuaris.php?ID=${userId}`, {
            method: 'GET'
        })
        .then(response => response.json())
        .then(data => {
            if (data.length > 0) {
                const usuario = data[0];
                document.getElementById('nombre').value = usuario.nombre;
                document.getElementById('apellido1').value = usuario.apellido1;
                document.getElementById('telefono').value = usuario.telefono;
                document.getElementById('email').value = usuario.email;
                document.getElementById('contrasena').value = usuario.contraseña;
                document.getElementById('tipo').value = usuario.tipo;
            }
        })
        .catch(error => console.error('Error al cargar los datos del usuario:', error));
    </script>

    <script>
        const form = document.getElementById('usuario-form');
        form.addEventListener('submit', (event) => {
            event.preventDefault();
            const nombre = document.getElementById('nombre').value;
            const apellido1 = document.getElementById('apellido1').value;
            const telefono = document.getElementById('telefono').value;
            const email = document.getElementById('email').value;
            const contrasena = document.getElementById('contrasena').value;
            const tipo = document.getElementById('tipo').value;
            const data = {
                nombre: nombre,
                apellido1: apellido1,
                telefono: telefono,
                email: email,
                contraseña: contrasena,
                tipo: tipo,
            };
            fetch(`../api/gestioUsuaris.php?ID=${userId}`, {
                method: 'PUT',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(data)
            })
            .then(response => response.json())
            .then(data => {
                if (data.status == 'success') {
                    form.reset();
                    alert('Usuario modificado exitosamente');
                    window.location.href = 'gestionUsuaris.php';
                } else {
                    alert('Se ha producido un error al modificar el usuario');
                }
            })
            .catch(error => {
                alert('Se ha producido un error al modificar el usuario');
                console.error('Error al modificar el usuario:', error);
            });
        });
    </script>
    <script src="js/scripts.js"></script>
       <?php
    include("includes/footer.php");
?>
</body>
</html>
