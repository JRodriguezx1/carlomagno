
<body>
    <?php //include_once __DIR__ .'/../templates/headerauth.php'; ?>

<main class="auth"> 
    <div class="contenedor">

        <div class="formulario-contenido">
            <h2 class="auth-heading"><?php echo $titulo; ?></h2>
            <?php include __DIR__. "/../templates/alertas.php"; ?>
            <p class="auth-texto">Iniciar Sesion en <span>Fundacion Educativa Carlo Magno</span></p>

            <form class="formulario" method="POST" action="/login">
                <div class="formulario-campo">
                    <label class="formulario-label" for="">Email</label>
                    <input class="formulario-input" type="email" placeholder="Tu Email" id="email" name="email">
                </div>
                <div class="formulario-campo">
                    <label class="formulario-label" for="">Password</label>
                    <input class="formulario-input" type="password" placeholder="Tu Password" id="password" name="password">
                </div>
                <input class="formulario-submit" type="submit" value="iniciar sesion">
            </form>

            <div class="acciones">
                <a href="/" class="acciones-enlace">Regresar a la pagina de inicio</a>
                <a href="/olvide" class="acciones-enlace">Olvidaste tu password</a>
            </div>
        </div>    
    </div>
</main>

    <?php //include_once __DIR__ .'/../templates/footerauth.php'; ?>
</body>
</html>