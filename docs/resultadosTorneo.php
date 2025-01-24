<?php
session_start();
?>
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
<main data-role="<?php echo isset($_SESSION['tipo']) ? $_SESSION['tipo'] : ''; ?>">
    <h1>RANKING USUARIOS</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Combates Realizados</th>
                <th>Combates Ganados</th>
                <th>Ultimo Combate</th>
                <th>Porcentaje Ganados</th>
                <th>Modificar</th>
            </tr>
        </thead>
        <tbody id="resultados-table">
        </tbody>
    </table>
</main>
<script>
window.onload = function() {
    const userRole = document.querySelector('main').getAttribute('data-role');
    fetch('../api/verResultadosTorneo.php')
        .then(response => response.json())
        .then(data => {
            console.log(data);
            const resultadosTable = document.getElementById('resultados-table');
            data.forEach(result => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td>${result.id}</td>
                    <td>${result.Nombre}</td>
                    <td>${result.Apellidos}</td>
                    <td>${result.Combates_Realizados}</td>
                    <td>${result.Combates_Ganados}</td>
                    <td>${result.Fecha_Combate}</td>
                    <td>${result.Porcentaje_Ganados}%</td>
                    ${userRole === 'entrenador' ? `<td><a href='modificarResultado.php?ID=${result.id}'>Modificar Resultados</a></td>` : '<td>(No disponible)</td>'}
                `;
                resultadosTable.appendChild(row);
            });
        });
};
</script>
<script src="js/scripts.js"></script>
<?php include("includes/footer.php"); ?>
</body>
</html>
