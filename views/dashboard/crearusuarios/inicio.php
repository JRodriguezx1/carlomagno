<main class="auth crear-usuarios style-main">
    <h2 class="heading-inicio">Fundacion Carlo Magno</h2>
    <br>
    <div class="contenedor"> <!-- clases de la carpeta scss/base _globales.scss-->
        <div class="formulario-contenido"> <!-- clases de la carpeta scss/auth -->
            <h2 class="auth-heading"><?php echo $titulo; ?></h2>  <!-- en archivo tipografia hay selector que selecciona todos los componentes con class = heading-->
            <p class="auth-texto">Dar de alta <span>Usuarios Carlo Magno</span></p>
            <?php include_once __DIR__. "/../../templates/alertas.php"; ?>

            <form class="formulario" action="/registro" method="POST">
                <div class="role">
                    <label for="rolecedula">Admin</label>
                    <input id="rolecedula" type="radio" name="admin" value="1" required>
                    <label for="rolenombre">Colaborador</label>
                    <input id="rolenombre" type="radio" name="admin" value="0" required>
                </div>
                <div class="formulario-campo">
                    <label class="formulario-label" for="nombre">Nombre</label>
                    <input class="formulario-input" type="text" placeholder="Tu Nombre" id="nombre" name="nombre" value="<?php echo $usuario->nombre??''; ?>">
                </div>
                 <div class="formulario-campo">
                    <label class="formulario-label" for="apellido">Apellido</label>
                    <input class="formulario-input" type="text" placeholder="Tu Apellido" id="apellido" name="apellido">
                </div>
                <div class="formulario-campo">
                    <label class="formulario-label" for="email">Email</label>
                    <input class="formulario-input" type="email" placeholder="Tu Email" id="email" name="email">
                </div>
                <div class="formulario-campo">
                    <label class="formulario-label" for="password">Password</label>
                    <input class="formulario-input" type="password" placeholder="Tu Password" id="password" name="password">
                </div>
                <div class="formulario-campo">
                    <label class="formulario-label" for="password2">Repetir Password</label>
                    <input class="formulario-input" type="password" placeholder="Repetir Password" id="password2" name="password2">
                </div>
                    <input class="formulario-submit" type="submit" value="Crear Usuario">
            </form>
        </div>
    </div>

</main>
