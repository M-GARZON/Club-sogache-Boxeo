<?php
session_start();

if (isset($_SESSION['tipo']) && $_SESSION['tipo'] === 'usuario') {
    $contratable = true;
} else {
    $contratable = false;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CLUB BOX SOGACHE - TARIFAS</title>
    <link rel="stylesheet" href="styles/comun.css">
    <link rel="stylesheet" href="styles/tarifa.css">
    <link rel="icon" href="img/ico_nbg.png" type="image">
</head>
<body>
    <header>
        <div class="logo"> <a href="index.php"><img src="img/title.png"></a></div>
        <?php include("includes/nav.php"); ?>
    </header>
    <main>
        <section class="pricing">
            <!-- Soldado -->
            <div class="pricing-table">
                <h2>SOLDADO</h2>
                <p>50€/mes</p>
                <ul>
                    <li>Único pago de 50€</li>
                    <li>Duración de 1 mes</li>
                    <li>Sala de Pesas y Cardio</li>
                    <li>Asesoramiento en Sala</li>
                    <li>Sin Límite Horario</li>
                    <li>SIN PERMANENCIA</li>
                </ul>
                <?php if ($contratable): ?>
                    <form action="formularioConfirmacion.php" method="POST">
                        <input type="hidden" name="plan" value="SOLDADO">
                        <input type="hidden" name="duracion" value="1">
                        <input type="hidden" name="precio" value="50.00">
                        <button type="submit">CONTRATAR</button>
                    </form>
                <?php else: ?>
                    <p>Esta tarifa solo está disponible para usuarios.</p>
                <?php endif; ?>
            </div>
            <!-- Cabo -->
            <div class="pricing-table">
                <h2>CABO</h2>
                <p>45€/mes</p>
                <ul>
                    <li>Único pago de 135€</li>
                    <li>Duración de 3 meses</li>
                    <li>Sala de Pesas y Cardio</li>
                    <li>Asesoramiento en Sala</li>
                    <li>Sin Límite Horario</li>
                    <li>SIN PERMANENCIA</li>
                </ul>
                <?php if ($contratable): ?>
                    <form action="formularioConfirmacion.php" method="POST">
                        <input type="hidden" name="plan" value="CABO">
                        <input type="hidden" name="duracion" value="3">
                        <input type="hidden" name="precio" value="135.00">
                        <button type="submit">CONTRATAR</button>
                    </form>
                <?php else: ?>
                    <p>Esta tarifa solo está disponible para usuarios.</p>
                <?php endif; ?>
            </div>
            <!-- Sargento -->
            <div class="pricing-table">
                <h2>SARGENTO</h2>
                <p>41,67€/mes</p>
                <ul>
                    <li>Único pago de 250€</li>
                    <li>Duración de 6 meses</li>
                    <li>Sala de Pesas y Cardio</li>
                    <li>Asesoramiento en Sala</li>
                    <li>Sin Límite Horario</li>
                    <li>SIN PERMANENCIA</li>
                </ul>
                <?php if ($contratable): ?>
                    <form action="formularioConfirmacion.php" method="POST">
                        <input type="hidden" name="plan" value="SARGENTO">
                        <input type="hidden" name="duracion" value="6">
                        <input type="hidden" name="precio" value="250.00">
                        <button type="submit">CONTRATAR</button>
                    </form>
                <?php else: ?>
                    <p>Esta tarifa solo está disponible para usuarios.</p>
                <?php endif; ?>
            </div>
            <!-- Teniente -->
            <div class="pricing-table">
                <h2>TENIENTE</h2>
                <p>40€/mes</p>
                <ul>
                    <li>Único pago de 480€</li>
                    <li>Duración de 12 meses</li>
                    <li>Sala de Pesas y Cardio</li>
                    <li>Asesoramiento en Sala</li>
                    <li>Sin Límite Horario</li>
                    <li>SIN PERMANENCIA</li>
                </ul>
                <?php if ($contratable): ?>
                    <form action="formularioConfirmacion.php" method="POST">
                        <input type="hidden" name="plan" value="TENIENTE">
                        <input type="hidden" name="duracion" value="12">
                        <input type="hidden" name="precio" value="480.00">
                        <button type="submit">CONTRATAR</button>
                    </form>
                <?php else: ?>
                    <p>Esta tarifa solo está disponible para usuarios.</p>
                <?php endif; ?>
            </div>
        </section>
    </main>
    <?php include("includes/footer.php"); ?>
    <script src="js/scripts.js"></script>
</body>
</html>