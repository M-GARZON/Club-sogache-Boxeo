<?php
session_start();
?>

<nav>
    <button class="menu-toggle" aria-label="Toggle Menu">
        &#9776;
    </button>
    <ul class="nav-links">
        <li><a href="index.php">Inicio</a></li>
        <li><a href="horarios.php">Horarios</a></li>
        <li class="dropdown">
            <a href="javascript:void(0)" class="dropbtn">Precios</a>
            <div class="dropdown-content">
                <a href="tarifa.php">Tarifas</a>
                <a href="entrenoGrupal.php">Entreno Grupal</a>
            </div>
        </li>
        <li><a href="entrenadores.php">Entrenadores</a></li>
        <li class="dropdown">
            <a href="javascript:void(0)" class="dropbtn">Blog</a>
            <div class="dropdown-content">
                <a href="nutricional.php">Información Nutricional</a>
                <a href="noticias.php">Noticias</a>
            </div>
        </li>
        <li><a href="sobreNosotros.php">Sobre Nosotros</a></li>
        <?php if(!isset($_SESSION['tipo']) || $_SESSION['tipo'] != 'entrenador'): ?>
            <li><a href="formulario_contacto.php">Contacto</a></li>
        <?php endif; ?>
        <?php if(isset($_SESSION['email'])): ?>
            <li><a href="../docs/resultadosTorneo.php">Resultados Torneo</a></li>
            <?php if(isset($_SESSION['tipo']) && $_SESSION['tipo'] == 'entrenador'): ?>
                <li><a href="../docs/gestionUsuaris.php">Gestión Usuarios</a></li>
                <li><a href="../docs/visualizarMensaje.php">Comentarios</a></li>
            <?php endif; ?>
            <li><a href="../api/logOut.php">Cerrar Sesión</a></li>
        <?php else: ?>
            <li><a href="iniciarSesion.php">Iniciar Sesión</a></li>
            <li><a href="registro.php">Crear Cuenta</a></li>
        <?php endif; ?>
    </ul>
</nav>
