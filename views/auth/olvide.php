
    <?php
    require_once __DIR__ .'/../templates/alertas.php';
    ?>

<main class="auth">
    <div class="contenedor">
        <div class="formulario-contenido">
            <h2 class="auth-heading"><?php echo $titulo; ?></h2>  <!-- en archivo tipografia hay selector que selecciona todos los componentes con class = heading-->
            <p class="auth-texto">Recuperar tu acceso a Menu<span>Digital</span></p>
            <form method="POST" action="/olvide" class="formulario" action="">
                <div class="formulario-campo">
                    <label class="formulario-label" for="email">Email</label>
                    <input class="formulario-input" type="email" placeholder="Tu Email" id="email" name="email">
                </div>
        
                <input class="formulario-submit" type="submit" value="Eviar Instrucciones">
            </form>

            <div class="acciones">
                <a href="/registro" class="acciones-enlace">¿aun no tienes cuenta? Obtener una</a>
                <a href="/login" class="acciones-enlace">Ya tienes ceunta? Iniciar Sesion</a>
            </div>
        </div>
    </div>
</main>