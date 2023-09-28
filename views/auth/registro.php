<main class="auth">
    <div class="contenedor">
        <div class="formulario-contenido">
            <h2 class="auth-heading"><?php echo $titulo; ?></h2>  <!-- en archivo tipografia hay selector que selecciona todos los componentes con class = heading-->
            <p class="auth-texto">Registrate en <span>Fundacion Carlo Magno</span></p>
            <?php require_once __DIR__ .'/../templates/alertas.php'; ?>

            <form class="formulario" action="/registro" method="POST">
                <div class="formulario-campo">
                    <label class="formulario-label" for="nombre">Nombre</label>
                    <input class="formulario-input" type="text" placeholder="Tu Nombre" id="nombre" name="nombre" value="<?php echo $usuario->nombre; ?>">
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
                    <input class="formulario-submit" type="submit" value="Crear Cuenta">
            </form>

            <div class="acciones">
               <a href="/login" class="acciones-enlace">¿Ya tienes cuenta? Iniciar Sesion</a>
                <a href="/olvide" class="acciones-enlace">Olvidaste tu password</a>
            </div>
        </div>
    </div>
</main>