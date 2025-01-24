<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Mensajes</title>
    <link rel="stylesheet" href="styles/comun.css">
    <link rel="stylesheet" href="styles/gestionUsuaris.css">
</head>
<body>
<header>
    <div class="logo"> <a href="index.php"><img src="img/title.png"></a></div>
    <?php include("includes/nav.php"); ?>
</header>
<main>
    <h1>Mensajes</h1>
    <table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Email</th>
            <th>Teléfono</th>
            <th>Mensaje</th>
            <th>Eliminar</th>
        </tr>
    </thead>
        <tbody id="mensaje-table">
        </tbody>
    </table>
</main>
<script>
    window.onload = function() {
        fetch('../api/guardar_mensaje.php')
            .then(response => response.json())
            .then(data => {
                const mensajeTable = document.getElementById('mensaje-table');
                data.forEach(mensaje => {
                    const row = document.createElement('tr');
                    row.innerHTML = `
                        <td>${mensaje.id}</td>
                        <td>${mensaje.nombre}</td>
                        <td>${mensaje.email}</td>
                        <td>${mensaje.telefono}</td>
                        <td>${mensaje.mensaje}</td>
                        <td><a href='eliminarComentario.php?id=${mensaje.id}'>Eliminar</a></td>
                    `;
                    mensajeTable.appendChild(row);
                });
            })
            .catch(error => console.error('Error al obtener mensajes:', error));
    };
</script>
<script src="js/scripts.js"></script>

<?php include("includes/footer.php"); ?>
</body>
</html>
