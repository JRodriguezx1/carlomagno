<main class="perfil style-main">
    <h2 class="heading-inicio">Fundacion Carlo Magno</h2>
    <h3>Perfil</h3>
    
    <?php if($session['admin']): ?>
    <div class="btn"><a href="/admin/dashboard/cambiar_password">Cambiar Contraseña</a></div>
    <?php endif; ?>

    <hr>

    <div class="contenedor-perfil form-dashboard"> <!-- clase semiglobal que esta en dashboard.scss y actualizar.scss -->
    <?php include_once __DIR__. "/../../templates/alertas.php"; ?>
    <h4>Cambio de datos</h4>
    <form class="formulario" method="POST"  action="/admin/dashboard/perfil">
        <div class="formulario-campo">
            <label class="formulario-label" for="nombre">Nombre</label>
            <input class="formulario-input" id="nombre" name="nombre" type="text" placeholder="Tu nombre" value="<?php echo $usuario->nombre??''; ?>">
        </div>
        <div class="formulario-campo">
            <label class="formulario-label" for="apellido">Apellido</label>
            <input class="formulario-input" id="apellido" name="apellido" type="text" placeholder="Tu apellido" value="<?php echo $usuario->apellido??''; ?>">
        </div>
        <div class="formulario-campo">
            <label class="formulario-label" for="email">Email</label>
            <input class="formulario-input" id="email" name="email" type="text" placeholder="Tu email" value="<?php echo $usuario->email??''; ?>">
        </div>
        <input class="formulario-submit--secundario"  type="submit" value="Guardar cambios">
    </form>
    </div>

</main>
