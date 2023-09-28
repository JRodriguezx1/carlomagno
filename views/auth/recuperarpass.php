
    <?php
    require_once __DIR__ .'/../templates/alertas.php';
    ?>
    
<main class="auth">
    <h2 class="auth-heading"><?php echo $titulo; ?></h2>  <!-- en archivo tipografia hay selector que selecciona todos los componentes con class = heading-->
    <p class="auth-texto">Coloca tu nuevo password</p>
    
    <?php if($error){ ?>
    <form method="POST" class="formulario">
        <div class="formulario-campo">
            <label class="formulario-label" for="password">Nuevo password</label>
            <input class="formulario-input" type="password" placeholder="Tu nuevo password" id="password" name="password">
        </div>
        
        <input class="formulario-submit" type="submit" value="Guardar Password">
    </form>
    <?php } ?>

    <div class="acciones">
        <a href="/registro" class="acciones-enlace">¿aun no tienes cuenta? Obtener una</a>
        <a href="/login" class="acciones-enlace">Ya tienes ceunta? Iniciar Sesion</a>
    </div>
</main>