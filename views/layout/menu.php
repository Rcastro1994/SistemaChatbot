<nav id="menu" class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="<?= base_url ?>">Inicio</a>
                </li>
                <?php if (!isset($_SESSION['estudiante']) && !isset($_SESSION['admin']) && !isset($_SESSION['psiquiatra'])): ?>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="<?= base_url ?>usuario/registroLogin">Ingresar</a>
                    </li>
                <?php endif; ?>
                <?php if (isset($_SESSION['estudiante'])): ?>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Iniciar Conversación</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="<?= base_url ?>usuario/perfilEstudiante">Mi Perfil</a>
                    </li>
                <?php endif; ?>
                <?php if (isset($_SESSION['psiquiatra'])): ?>  
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="<?= base_url ?>usuario/perfilPsiquiatra">Mi Perfil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="<?= base_url ?>usuario/estudiantesAsignados">Lista de estudiantes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="<?= base_url ?>acta/gestion">Lista de Citas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Notificaciones</a>
                    </li>
                <?php endif; ?>
                <?php if (isset($_SESSION['admin'])): ?>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="<?= base_url ?>usuario/gestion">Lista de Usuarios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="<?= base_url ?>test/gestion">Lista de Tests Psicológicos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="<?= base_url ?>acta/gestion">Lista de Actas de Reunión</a>
                    </li>
                <?php endif; ?>
                <?php if (isset($_SESSION['estudiante']) || isset($_SESSION['psiquiatra']) || isset($_SESSION['admin'])): ?>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="<?= base_url ?>usuario/logout">Cerrar Sesión</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>
<aside id="lateral-right">
    <img src="<?= base_url ?>assets/images/bot.png" alt="BOT"/>
</aside>
<section id="container-fluid principal" class="container-fluid">
