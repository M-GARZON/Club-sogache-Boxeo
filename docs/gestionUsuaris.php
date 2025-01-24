<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Veure categories</title>
    <link rel="stylesheet" href="styles/comun.css">
    <link rel="stylesheet" href="styles/gestionUsuaris.css">
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
    <h1>Personas</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Teléfono</th>
                <th>Email</th>
                <th>Contraseña</th>
                <th>Tipo</th>
                <th colspan="2">Operaciones</th>
            </tr>
        </thead>
        <tbody id="personas-table">
        </tbody>
        <tfoot>
            <tr>
                <th colspan="10"><a href="altaUsuario.php">Nueva Persona</a></th>
            </tr>
        </tfoot>
    </table>
</main>
    <script>
        fetch('../api/gestioUsuaris.php')
            .then(response => response.json())
            .then(data => {
                const personasTable = document.getElementById('personas-table');
                data.forEach(persona => {
                    const row = document.createElement('tr');
                    row.innerHTML = `
                        <td>${persona.ID}</td>
                        <td>${persona.nombre}</td>
                        <td>${persona.apellido1}</td>
                        <td>${persona.telefono}</td>
                        <td>${persona.email}</td>
                        <td>${persona.contraseña}</td>
                        <td>${persona.tipo}</td>
                        <td><a href='modificarUsuario.php?ID=${persona.ID}'>Modificar</a></td>
                        <td><a href='bajaUsuario.php?ID=${persona.ID}'>Eliminar</a></td>
                    `;
                    personasTable.appendChild(row);
                });
            });
    </script>
    <script src="js/scripts.js"></script>
       <?php
    include("includes/footer.php");
?>
</body>
</html>