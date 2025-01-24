<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Modificar Resultado</title>
    <link rel="stylesheet" href="styles/comun.css">
    <link rel="stylesheet" href="styles/modificarUsuario.css">
    <link rel="icon" href="img/ico_nbg.png" type="image">
</head>
<header>
    <div class="logo"> <a href="index.php"><img src="img/title.png"></a></div>
    <?php include("includes/nav.php"); ?>
</header>
<body>
<main>
    <form id="resultados-form">
        <h2>Modificar Resultado</h2>
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required><br>
        
        <label for="apellidos">Apellidos:</label>
        <input type="text" id="apellidos" name="apellidos" required><br>
        
        <label for="combates_realizados">Combates Realizados:</label>
        <input type="number" id="combates_realizados" name="combates_realizados" required><br>
        
        <label for="combates_ganados">Combates Ganados:</label>
        <input type="number" id="combates_ganados" name="combates_ganados" required><br>
        
        <label for="fecha_combate">Ultima Fecha Combate:</label>
        <input type="date" id="fecha_combate" name="fecha_combate" required><br>
        
        <button type="submit">Guardar</button>
    </form>
</main>    

<script>
    const urlParams = new URLSearchParams(window.location.search);
    const resultadoId = urlParams.get('ID');
    fetch(`../api/verResultadosTorneo.php?id=${resultadoId}`, {
        method: 'GET'
    })
    .then(response => response.json())
    .then(data => {
        if (data.length > 0) {
            const resultado = data[0];
            document.getElementById('nombre').value = resultado.Nombre;
            document.getElementById('apellidos').value = resultado.Apellidos;
            document.getElementById('combates_realizados').value = resultado.Combates_Realizados;
            document.getElementById('combates_ganados').value = resultado.Combates_Ganados;
            document.getElementById('fecha_combate').value = resultado.Fecha_Combate;
        }
    })
    .catch(error => console.error('Error al cargar los datos del resultado:', error));
</script>

<script>
    const form = document.getElementById('resultados-form');
    form.addEventListener('submit', (event) => {
        event.preventDefault();
        const nombre = document.getElementById('nombre').value;
        const apellidos = document.getElementById('apellidos').value;
        const combates_realizados = document.getElementById('combates_realizados').value;
        const combates_ganados = document.getElementById('combates_ganados').value;
        const fecha_combate = document.getElementById('fecha_combate').value;
        const porcentaje_ganados = combates_realizados > 0 ? (combates_ganados / combates_realizados) * 100 : 0;

        const data = {
            Nombre: nombre,
            Apellidos: apellidos,
            Combates_Realizados: combates_realizados,
            Combates_Ganados: combates_ganados,
            Fecha_Combate: fecha_combate,
            Porcentaje_Ganados: porcentaje_ganados
        };

        fetch(`../api/verResultadosTorneo.php?id=${resultadoId}`, {
            method: 'PUT',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
        })
        .then(response => response.json())
        .then(data => {
            console.log(data);
            if (data.status == 'success') {
                form.reset();
                alert('Resultado modificado exitosamente');
                window.location.href = 'resultadosTorneo.php';
            } else {
                alert('Se ha producido un error al modificar el resultado');
            }
        })
        .catch(error => {
            alert('Se ha producido un error al modificar el resultado');
            console.error('Error al modificar el resultado:', error);
        });
    });
</script>
<script src="js/scripts.js"></script>
<?php include("includes/footer.php"); ?>
</body>
</html>
